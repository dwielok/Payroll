<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use Illuminate\Http\Request;

class GajiLemburTetapSuperController extends Controller
{
    public function index()
    {
        $approvals = ApprovalLembur::where('tipe_karyawan', 'tetap')->get();
        return view('superuser.gaji_lembur_tetap', compact('approvals'));
    }
}
