<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ExportPkwtController extends Controller
{
    public function index()
    {
        $slips = Approval::where('status', '0')->where('tipe_karyawan', 'pkwt')->get();
        return view('export_pkwt', compact('slips'));
    }
}
