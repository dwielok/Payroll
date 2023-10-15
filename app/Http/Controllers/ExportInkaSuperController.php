<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ExportInkaSuperController extends Controller
{

    public function index()
    {
        $slips = Approval::where('status', 0)->where('tipe_karyawan', 'inka')->get();
        return view('superuser.export_inka', compact('slips'));
    }
}
