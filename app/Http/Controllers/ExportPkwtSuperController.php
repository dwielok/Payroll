<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ExportPkwtSuperController extends Controller
{
    public function index()
    {
        $slips = Approval::where('status', 0)->where('tipe_karyawan', 'pkwt')->get();
        return view('superuser.export_pkwt', compact('slips'));
    }
}
