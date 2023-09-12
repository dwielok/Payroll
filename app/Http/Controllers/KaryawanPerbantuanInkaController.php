<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class KaryawanPerbantuanInkaController extends Controller
{
    public function index()
    {
        $approvals = Approval::where('tipe_karyawan', 'inka')->get();
        
        return view('karyawan_inka', compact('approvals'));
    }
}
