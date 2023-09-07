<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalSuperController extends Controller
{
    public function index()
    {
        $approvals = Approval::all();
        return view('superuser.approval', compact('approvals'));
    }

    public function decline(Request $request)
    {
        $approval = Approval::where('id', $request->id)->update([
            'status' => 1,
            'keterangan' => $request->keterangan //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ApprovalSuper');
    }

    public function approve(Request $request)
    {
        $approval = Approval::where('id', $request->id)->update([
            'status' => 0,
            'keterangan' => '-' //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ApprovalSuper');
    }
}
