<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use Illuminate\Http\Request;

class GajiLemburTetapController extends Controller
{
    public function index()
    {
        $approvals = ApprovalLembur::where('tipe_karyawan', 'tetap')->get();
        return view('gaji_lembur_tetap', compact('approvals'));
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        $gajis = GajiLembur::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_lembur.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_lembur.*', 'pegawai.*', 'jabatan.*')
            ->where('gaji_lembur.id_approval', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) {
            $item->bulan = ApprovalLembur::where('id', $item->id_approval)->value('bulan');
            $item->tahun = ApprovalLembur::where('id', $item->id_approval)->value('year');
            $item->nominal_lembur_weekend = $item->lembur_weekend * 15000;
            $item->nominal_lembur_weekday = $item->lembur_weekday * 11000;
            return $item;
        });

        return view('view_lembur_tetap', compact('gajis'));
    }
}
