<?php

namespace App\Http\Controllers;

use App\Exports\GajiExport;
use App\Models\Approval;
use App\Models\GajiPkwt;
use App\Models\GajiTemp;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportTetapController extends Controller
{
    public function index()
    {
        $slips = Approval::where('status', '0')->where('tipe_karyawan', 'tetap')->get();

        return view('export_tetap', compact('slips'));
    }

    public function export(Request $request)
    {
        $ids = $request->selected;
        //where id in array with input [1,2,3]
        $approvals = Approval::whereIn('id', $ids)->get();

        $approvals = $approvals->map(function ($approval) {
            if ($approval->tipe_karyawan != 'pkwt') {
                $approval->gajis = GajiTemp::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_temp.id_karyawan')
                    ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
                    ->select('gaji_temp.*', 'pegawai.*', 'jabatan.*')
                    ->where('gaji_temp.id_approval', '=', $approval->id)
                    ->get();
                $approval->gajis = $approval->gajis->map(function ($item) {
                    $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
                    $item->year = Approval::where('id', $item->id_approval)->value('year');
                    return $item;
                });
                $approval->gajis = PdfController::rumusTetap($approval->gajis);
            } else {
                $approval->gajis = GajiPkwt::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_pkwt.id_karyawan')
                    ->select('gaji_pkwt.*', 'pegawai.*', 'pegawai.pendidikan_terakhir as pendidikan')
                    ->where('gaji_pkwt.id_approval', '=', $approval->id)
                    ->get();
                $approval->gajis = $approval->gajis->map(function ($item) {
                    $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
                    $item->year = Approval::where('id', $item->id_approval)->value('year');

                    return $item;
                });

                $approval->gajis = PdfController::rumusPkwt($approval->gajis);
            }

            return $approval;
        });

        // dd($approvals);
        $random_name = rand(1000, 9999);
        //save to public/excel
        Excel::store(new GajiExport($approvals), 'public/excel/' . $random_name . '.xlsx');

        //redirect to excel file
        $data = [
            'file' => url('storage/excel/' . $random_name . '.xlsx'),
            'success' => TRUE,
        ];

        return response()->json($data);
    }
}
