<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiTemp;
use Illuminate\Http\Request;

class EditInkaSuperController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('id');

        $gajis = GajiTemp::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_temp.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_temp.*', 'pegawai.*', 'jabatan.*', 'gaji_temp.id as id_gaji')
            ->where('gaji_temp.id', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) {
            $item->bulan = Approval::where('id', $item->id_approval)->value('bulan');
            $item->year = Approval::where('id', $item->id_approval)->value('year');
            return $item;
        });

        $gajis = PdfController::rumusTetap($gajis);

        $gaji = $gajis[0];

        return view('superuser.edit_inka', compact('gaji'));
    }
}
