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
        $gajis = GajiPkwt::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_pkwt.id_karyawan')
            ->select('gaji_pkwt.*', 'pegawai.*', 'pegawai.pendidikan_terakhir as pendidikan')
            ->where('gaji_pkwt.id_approval', '=', $id)
            ->get();
        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->year = Approval::where('id', $item->id_approval)->value('year');

            return $item;
        });

        $gajis = PdfController::rumusPkwt($gajis);

        return view('view_pkwt', compact('gajis'));
    }
}
