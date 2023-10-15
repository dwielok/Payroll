<?php

namespace App\Http\Controllers;

use App\Exports\GajiLemburExport;
use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportLemburSuperController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type;
        $slips = ApprovalLembur::where('tipe_karyawan', $type)->get();
        return view('superuser.export_lembur', compact('slips'));
    }

    public function export(Request $request)
    {
        $ids = $request->selected;

        $approvals = ApprovalLembur::whereIn('id', $ids)->get();

        $approvals = $approvals->map(function ($approval) {
            $approval->gajis = GajiLembur::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_lembur.id_karyawan')
                ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
                ->select('gaji_lembur.*', 'pegawai.*', 'jabatan.*')
                ->where('gaji_lembur.id_approval', '=', $approval->id)
                ->get();

            $approval->gajis = $approval->gajis->map(function ($item) {
                $item->bulan = ApprovalLembur::where('id', $item->id_approval)->value('bulan');
                $item->tahun = ApprovalLembur::where('id', $item->id_approval)->value('year');
                $item->nominal_lembur_weekend = $item->lembur_weekend * 15000;
                $item->nominal_lembur_weekday = $item->lembur_weekday * 11000;
                return $item;
            });

            return $approval;
        });

        $random_name = rand(1000, 9999);

        Excel::store(new GajiLemburExport($approvals), 'public/excel/' . $random_name . '.xlsx');

        $data = [
            'file' => url('storage/excel/' . $random_name . '.xlsx'),
            'success' => TRUE,
        ];

        return response()->json($data);
    }
}
