<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class viewInkaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('id');
        $gajis = GajiTemp::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_temp.id_karyawan')
            ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')
            ->leftJoin('golongans', 'golongans.id', '=', 'karyawans.id_golongan')
            ->select('gaji_temp.*', 'karyawans.*', 'jabatans.*', 'golongans.*')
            ->where('gaji_temp.id_approval', '=', $id)
            ->get();
        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->tahun = Approval::where('id', $item->id_approval)->value('year');
            return $item;
        });
        return view('view_tetap', compact('gajis'));
    }
}