<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval;

class KaryawanTetapSuperController extends Controller
{
    
    public function index()
    {
        $approvals = Approval::where('tipe_karyawan', 'tetap')->get();

        return view('superuser.karyawan_tetap', compact('approvals'));
    }
}
