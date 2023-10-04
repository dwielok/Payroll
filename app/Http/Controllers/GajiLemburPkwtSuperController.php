<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use Illuminate\Http\Request;

class GajiLemburPkwtSuperController extends Controller
{
    public function index()
    {
        $approvals = ApprovalLembur::where('tipe_karyawan', 'pkwt')->get();
        return view('superuser.gaji_lembur_pkwt', compact('approvals'));
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        $gajis = GajiLembur::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_lembur.id_karyawan')
            ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')
            ->select('gaji_lembur.*', 'karyawans.*', 'jabatans.*')
            ->where('gaji_lembur.id_approval', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) {
            $item->bulan = ApprovalLembur::where('id', $item->id_approval)->value('bulan');
            $item->tahun = ApprovalLembur::where('id', $item->id_approval)->value('year');
            $item->nominal_lembur_weekend = $item->lembur_weekend * 20000;
            $item->nominal_lembur_weekday = $item->lembur_weekday * 30000;
            return $item;
        });

        return view('superuser.view_lembur_pkwt', compact('gajis'));
    }
}
