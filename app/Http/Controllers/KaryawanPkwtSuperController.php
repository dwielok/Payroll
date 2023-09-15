<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class KaryawanPkwtSuperController extends Controller
{
    
    public function index()
    {
        $approvals = Approval::where('tipe_karyawan', 'pkwt')->get();
        
        return view('superuser.karyawan_pkwt', compact('approvals'));
    }
}