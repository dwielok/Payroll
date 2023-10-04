<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class EditTetapSuperController extends Controller
{
    function incrementAlpha($input, $count)
    {
        $letter = substr($input, 0, 1);
        $number = intval(substr($input, 1));

        if ($number >= $count) {
            $letter = chr(ord($letter) + 1);
            $number = 1;
        } else {
            $number++;
        }

        return $letter . $number;
    }

    private function getKenaikan($masa_kerja)
    {
        $tahun = 10;
        $awal = 3000000;
        $abjadAwal = 'A1';
        $kenaikan_per_tahun = 0.05;
        $kenaikan = $awal;
        $gajis = [];
        $awal = ['A1'];
        for ($i = 0; $i < $masa_kerja; $i++) {
            $abjadAwal = $this->incrementAlpha($abjadAwal, $tahun);
            array_push($awal, $abjadAwal);
            $kenaikan = $kenaikan + ($kenaikan * $kenaikan_per_tahun);
            $kenaikan = round($kenaikan);
            $gajis[$i] = [
                'gaji' => $kenaikan,
                'abjad' => $awal[$i],
            ];
        }
        return $gajis;
    }

    private function hitungJabatan($jabatan, $gaji_pokok)
    {
        //jabatan ada 2 Staff dan Manager
        if ($jabatan == 'Staff') {
            return 0.1 * $gaji_pokok;
        } else {
            return 0.2 * $gaji_pokok;
        }
    }

    private function hitungKehadiran($kehadiran)
    {
        return $kehadiran * 10000;
    }

    public function index(Request $request)
    {
        $id = $request->id;

        $gaji = GajiTemp::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_temp.id_karyawan')
            ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')
            ->leftJoin('golongans', 'golongans.id', '=', 'karyawans.id_golongan')
            ->select('gaji_temp.*', 'karyawans.*', 'jabatans.*', 'golongans.*', 'gaji_temp.id as id_gaji')
            ->where('gaji_temp.id', '=', $id)
            ->first();

        $gaji->bulan = Approval::where('id', $gaji->id_approval)->value('bulan');
        $gaji->tahun = Approval::where('id', $gaji->id_approval)->value('year');
        $gaji->kenaikan = $this->getKenaikan($gaji->masa_kerja);
        $gaji->gaji_pokok = $gaji->kenaikan[$gaji->masa_kerja - 1]['gaji'];
        $gaji->golongan = $gaji->kenaikan[$gaji->masa_kerja - 1]['abjad'];
        $gaji->tunjangan_tetap = 0.05 * $gaji->gaji_pokok;
        $gaji->penghasilan_tetap = $gaji->gaji_pokok + $gaji->tunjangan_tetap;

        $gaji->tunjangan_transportasi = $this->hitungJabatan($gaji->jabatan, $gaji->gaji_pokok) + $this->hitungKehadiran($gaji->kehadiran);
        $gaji->tunjangan_jabatan = $this->hitungJabatan($gaji->jabatan, $gaji->gaji_pokok);
        $gaji->tunjangan_karya = $gaji->dana_ikk * ($gaji->kehadiran / $gaji->hari_kerja) * $gaji->nilai_ikk;
        $gaji->bpjs_kesehatan = 0.04 * ($gaji->gaji_pokok + $gaji->tunjangan_tetap);
        $gaji->bpjs_ketenagakerjaan = 0.0727 * ($gaji->gaji_pokok + $gaji->tunjangan_tetap);
        $gaji->ppip = $gaji->gaji_pokok / 12;
        $gaji->benefit = $gaji->bpjs_kesehatan + $gaji->bpjs_ketenagakerjaan + $gaji->ppip;
        $gaji->penghasilan_tunjangan_tidak_tetap = $gaji->tunjangan_transportasi + $gaji->tunjangan_jabatan + $gaji->tunjangan_karya + $gaji->benefit;
        $gaji->penghasilan_bruto = $gaji->gaji_pokok + $gaji->tunjangan_tetap + $gaji->penghasilan_tunjangan_tidak_tetap;

        $gaji->premi_bpjs_kesehatan = 0.01 * ($gaji->gaji_pokok + $gaji->tunjangan_tetap);
        $gaji->premi_bpjs_ketenagakerjaan = 0.03 * ($gaji->gaji_pokok + $gaji->tunjangan_tetap);
        $gaji->premi_ppip = $gaji->ppip_mandiri;
        $gaji->potongan_premi = $gaji->premi_bpjs_kesehatan + $gaji->premi_bpjs_ketenagakerjaan + $gaji->premi_ppip;
        $gaji->potongan_benefit = $gaji->bpjs_kesehatan + $gaji->bpjs_ketenagakerjaan + $gaji->ppip;
        $gaji->potongan_jam_hilang = ($gaji->jam_hilang / 173) * $gaji->gaji_pokok;
        $gaji->potongan_kopinka = $gaji->kopinka;
        $gaji->potongan_keuangan = $gaji->keuangan;
        $gaji->potongan = $gaji->potongan_premi + $gaji->potongan_benefit + $gaji->potongan_jam_hilang + $gaji->potongan_kopinka + $gaji->potongan_keuangan;
        $gaji->penghasilan_netto = ($gaji->penghasilan_bruto) - $gaji->potongan;

        return view('superuser.edit_tetap', compact('gaji'));
    }
}
