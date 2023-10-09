<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use Illuminate\Http\Request;

class ApprovalLemburController extends Controller
{
    public function index()
    {
        $approvals = ApprovalLembur::all();
        return view('superuser.approval_lembur', compact('approvals'));
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        $tipe = $request->get('tipe');

        switch ($tipe) {
            case 'tetap':
                $tipe = 'Tetap';
                break;
            case 'inka':
                $tipe = 'Perbantuan INKA';
                break;
            case 'pkwt':
                $tipe = 'PKWT';
                break;

            default:
                # code...
                break;
        }
        $gajis = GajiLembur::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_lembur.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_lembur.*', 'pegawai.*', 'jabatan.*')
            ->where('gaji_lembur.id_approval', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) {
            $item->bulan = ApprovalLembur::where('id', $item->id_approval)->value('bulan');
            $item->tahun = ApprovalLembur::where('id', $item->id_approval)->value('year');
            $item->nominal_lembur_weekend = $item->lembur_weekend * 20000;
            $item->nominal_lembur_weekday = $item->lembur_weekday * 30000;
            return $item;
        });

        $approval = ApprovalLembur::where('id', $id)->first();

        return view('superuser.view_approval_lembur', compact('gajis', 'approval', 'tipe'));
    }

    public function decline(Request $request)
    {
        $approval = ApprovalLembur::where('id', $request->id)->update([
            'status' => 1,
            'keterangan' => $request->keterangan //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ViewApprovalLemburSuper?id=' . $request->id);
    }

    public function approve(Request $request)
    {
        $approval = ApprovalLembur::where('id', $request->id)->update([
            'status' => 0,
            'keterangan' => '-' //ini berdasarkan "name" ng blade mau
        ]);

        return redirect('/ViewApprovalLemburSuper?id=' . $request->id);
    }
}
