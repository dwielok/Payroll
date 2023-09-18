<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiPkwt;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class SlipController extends Controller
{
    public function index()
    {
        $results = [];
        $slip_tetap = Approval::where('approvals.status', 0)
            ->leftJoin('gaji_temp', 'gaji_temp.id_approval', '=', 'approvals.id')
            ->leftJoin('karyawans', 'karyawans.id', '=', 'gaji_temp.id_karyawan')
            ->select('approvals.bulan', 'approvals.year', 'gaji_temp.id', 'approvals.tipe_karyawan', 'karyawans.nip', 'karyawans.nama_karyawan')
            ->where('approvals.tipe_karyawan', 'tetap')
            ->orWhere('approvals.tipe_karyawan', 'inka')
            ->get();

        $slip_pkwt = Approval::where('approvals.status', 0)
            ->leftJoin('gaji_pkwt', 'gaji_pkwt.id_approval', '=', 'approvals.id')
            ->leftJoin('karyawans', 'karyawans.id', '=', 'gaji_pkwt.id_karyawan')
            ->select('approvals.bulan', 'approvals.year', 'gaji_pkwt.id', 'approvals.tipe_karyawan', 'karyawans.nip', 'karyawans.nama_karyawan')
            ->where('approvals.tipe_karyawan', 'pkwt')
            ->get();

        //merge 2 collection
        $results = [];
        foreach ($slip_tetap as $slip) {
            $results[] = $slip;
        }
        foreach ($slip_pkwt as $slip) {
            $results[] = $slip;
        }
        return view('slip', compact('results'));
    }
}
