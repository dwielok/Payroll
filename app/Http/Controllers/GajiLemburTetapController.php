<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use Illuminate\Http\Request;

class GajiLemburTetapController extends Controller
{
    public function index()
    {
        $approvals = ApprovalLembur::where('tipe_karyawan', 'tetap')->get();
        return view('gaji_lembur_tetap', compact('approvals'));
    }
}
