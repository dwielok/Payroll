<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class KaryawanTetapController extends Controller
{
    public function index()
    {
        $approvals = Approval::where('tipe_karyawan', 'tetap')->get();

        return view('karyawan_tetap', compact('approvals'));
    }

    public function deleteTetap(Request $request)
    {
        $id = $request->id;
        $approval = GajiTemp::where('id', $id)->first();
        $approval->delete();
        return redirect()->back();
    }
}
