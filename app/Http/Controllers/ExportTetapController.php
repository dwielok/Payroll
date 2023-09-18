<?php

namespace App\Http\Controllers;

use App\Exports\GajiExport;
use App\Models\Approval;
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
        return Excel::download(new GajiExport('2020'), 'gaji_cuy.xlsx');
    }
}
