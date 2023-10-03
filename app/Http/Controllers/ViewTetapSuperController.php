<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class ViewTetapSuperController extends Controller
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
        $id = $request->get('id');
        $gajis = GajiTemp::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_temp.id_karyawan')
            ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')
            ->leftJoin('golongans', 'golongans.id', '=', 'karyawans.id_golongan')
            ->select('gaji_temp.*', 'karyawans.*', 'jabatans.*', 'golongans.*', 'gaji_temp.id as id_gaji')
            ->where('gaji_temp.id_approval', '=', $id)
            ->get();
        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->tahun = Approval::where('id', $item->id_approval)->value('year');
            $item->kenaikan = $this->getKenaikan($item->masa_kerja);
            $item->gaji_pokok = $item->kenaikan[$item->masa_kerja - 1]['gaji'];
            $item->golongan = $item->kenaikan[$item->masa_kerja - 1]['abjad'];
            $item->tunjangan_tetap = 0.05 * $item->gaji_pokok;
            $item->penghasilan_tetap = $item->gaji_pokok + $item->tunjangan_tetap;

            $item->tunjangan_transportasi = $this->hitungJabatan($item->jabatan, $item->gaji_pokok) + $this->hitungKehadiran($item->kehadiran);
            $item->tunjangan_jabatan = $this->hitungJabatan($item->jabatan, $item->gaji_pokok);
            $item->tunjangan_karya = $item->dana_ikk * ($item->kehadiran / $item->hari_kerja) * $item->nilai_ikk;
            $item->bpjs_kesehatan = 0.04 * ($item->gaji_pokok + $item->tunjangan_tetap);
            $item->bpjs_ketenagakerjaan = 0.0727 * ($item->gaji_pokok + $item->tunjangan_tetap);
            $item->ppip = $item->gaji_pokok / 12;
            $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
            $item->penghasilan_tunjangan_tidak_tetap = $item->tunjangan_transportasi + $item->tunjangan_jabatan + $item->tunjangan_karya + $item->benefit;
            $item->penghasilan_bruto = $item->gaji_pokok + $item->tunjangan_tetap + $item->penghasilan_tunjangan_tidak_tetap;

            $item->premi_bpjs_kesehatan = 0.01 * ($item->gaji_pokok + $item->tunjangan_tetap);
            $item->premi_bpjs_ketenagakerjaan = 0.03 * ($item->gaji_pokok + $item->tunjangan_tetap);
            $item->premi_ppip = $item->ppip_mandiri;
            $item->potongan_premi = $item->premi_bpjs_kesehatan + $item->premi_bpjs_ketenagakerjaan + $item->premi_ppip;
            $item->potongan_benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
            $item->potongan_jam_hilang = ($item->jam_hilang / 173) * $item->gaji_pokok;
            $item->potongan_kopinka = $item->kopinka;
            $item->potongan_keuangan = $item->keuangan;
            $item->potongan = $item->potongan_premi + $item->potongan_benefit + $item->potongan_jam_hilang + $item->potongan_kopinka + $item->potongan_keuangan;
            $item->penghasilan_netto = ($item->penghasilan_bruto) - $item->potongan;
            return $item;
        });
        // dd($gajis);
        return view('superuser.view_tetap', compact('gajis'));
    }
}
