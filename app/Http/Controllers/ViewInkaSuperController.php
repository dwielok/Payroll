<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class ViewInkaSuperController extends Controller
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
        $gajis = GajiTemp::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_temp.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_temp.*', 'pegawai.*', 'jabatan.*','gaji_temp.id as id_gaji')
            ->where('gaji_temp.id_approval', '=', $id)
            ->get();
        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->year = Approval::where('id', $item->id_approval)->value('year');
            return $item;
        });

        $gajis=PdfController::rumusTetap($gajis);
        // dd($gajis);
        return view('superuser.view_inka', compact('gajis'));
    }
}
