<?php


namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiPkwt;
use Illuminate\Http\Request;

class KaryawanPKWTController extends Controller
{
    public function index()
    {
        $approvals = Approval::where('tipe_karyawan', 'pkwt')->get();

        return view('karyawan_pkwt', compact('approvals'));
    }

    public function deleteTetap(Request $request)
    {
        $id = $request->id;
        $approval = GajiPkwt::where('id', $id)->first();
        $approval->delete();
        return redirect()->back();
    }
}
