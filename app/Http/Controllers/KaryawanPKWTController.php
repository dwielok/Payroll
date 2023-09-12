<?php


namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class KaryawanPKWTController extends Controller {
    public function index()
    {
        $approvals = Approval::where('tipe_karyawan', 'pkwt')->get();
        
        return view('karyawan_pkwt', compact('approvals'));
    }
}