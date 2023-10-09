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
        $slips = Approval::where('status', 0)->where('tipe_karyawan', 'tetap')->get();
        //kelompokkan berdasarkan tahun dan bulan pada kolom bulan dan year lalu return {bulan, tahun} pada array baru
        $arr = [];
        foreach ($slips as $slip) {
            $arr[] = [
                'bulan' => $slip->bulan,
                'tahun' => $slip->year
            ];
        }
        //hapus duplikat pada array
        $arr = array_unique($arr, SORT_REGULAR);
        //push data ke newStd
        foreach ($arr as $key => $value) {
            $newStd = new \stdClass();
            $newStd->bulan = $value['bulan'];
            $newStd->tahun = $value['tahun'];
            $arr[$key] = $newStd;
        }
        $slips = $arr;
        return view('export_tetap', compact('slips'));
    }

    public function export()
    {
        $approvals = Approval::all();

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

        return Excel::download(new GajiExport($approvals), 'gaji_cuy.xlsx');
    }
}
