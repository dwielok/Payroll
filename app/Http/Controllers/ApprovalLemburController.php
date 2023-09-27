<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use Illuminate\Http\Request;

class ApprovalLemburController extends Controller
{
    public function index()
    {
        $approvals = ApprovalLembur::all();
        return view('superuser.approval_lembur', compact('approvals'));
    }

    public function decline(Request $request)
    {
        $approval = ApprovalLembur::where('id', $request->id)->update([
            'status' => 1,
            'keterangan' => $request->keterangan //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ApprovalLemburSuper');
    }

    public function approve(Request $request)
    {
        $approval = ApprovalLembur::where('id', $request->id)->update([
            'status' => 0,
            'keterangan' => '-' //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ApprovalLemburSuper');
    }
}
