<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ExportTetapSuperController extends Controller
{

    public function index()
    {
        $slips = Approval::where('status', 0)->where('tipe_karyawan', 'tetap')->get();
        return view('superuser.export_tetap', compact('slips'));
    }
}
