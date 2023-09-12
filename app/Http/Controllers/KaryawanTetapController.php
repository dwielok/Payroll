<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class KaryawanTetapController extends Controller
{
    public function index()
    {
        $approvals = Approval::where('tipe_karyawan', 'tetap')->get();

        return view('karyawan_tetap', compact('approvals'));
    }
}
