<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiPkwt;
use Illuminate\Http\Request;

class viewPkwtController extends Controller
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

    private function levelPendidikan($pendidikan)
    {
        $umk = 2190216;
        if ($pendidikan == 'SMK') {
            return $umk;
        } else if ($pendidikan == 'D3') {
            return $umk + ($umk * 0.1);
        } else if ($pendidikan == 'S1' || $pendidikan == 'D4') {
            return $umk + ($umk * 0.2);
        } else if ($pendidikan == 'S2') {
            return $umk + ($umk * 0.3);
        }
    }


    private function hitungKehadiran($kehadiran)
    {
        return $kehadiran * 10000;
    }

    public function index(Request $request)
    {
        $id = $request->get('id');
        $gajis = GajiPkwt::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_pkwt.id_karyawan')
            ->select('gaji_pkwt.*', 'karyawans.*', 'karyawans.pendidikan')
            ->where('gaji_pkwt.id_approval', '=', $id)
            ->get();
        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->tahun = Approval::where('id', $item->id_approval)->value('year');
            $item->gaji_pokok = $this->levelPendidikan($item->pendidikan);
            $item->penghasilan_tetap = $item->gaji_pokok;

            $item->tunjangan_transportasi = $this->hitungKehadiran($item->kehadiran);
            $item->tunjangan_profesional = ($item->persentase_profesional / 100) * $item->gaji_pokok;
            $item->tunjangan_karya =  $item->dana_ikk * ($item->kehadiran / $item->hari_kerja) * $item->nilai_ikk;
            $item->bpjs_kesehatan = 0.04 * ($item->gaji_pokok);
            $item->bpjs_ketenagakerjaan = 0.0727 * ($item->gaji_pokok);
            $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
            $item->penghasilan_tidak_tetap = $item->tunjangan_transportasi + $item->tunjangan_profesional + $item->tunjangan_karya + $item->benefit;

            $item->penghasilan_bruto = $item->penghasilan_tetap + $item->penghasilan_tidak_tetap;

            $item->bpjs_kesehatan_premi = 0.01 * ($item->gaji_pokok);
            $item->bpjs_ketenagakerjaan_premi = 0.03 * ($item->gaji_pokok);
            $item->premi = $item->bpjs_kesehatan_premi + $item->bpjs_ketenagakerjaan_premi;
            $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
            $item->potongan_jam_hilang = ($item->jam_hilang / 173) * $item->gaji_pokok;
            $item->potongan = $item->premi + $item->benefit + $item->potongan_jam_hilang;

            $item->penghasilan_netto = ($item->penghasilan_bruto) - $item->potongan;
            return $item;
        });
        return view('view_pkwt', compact('gajis'));
    }
}
