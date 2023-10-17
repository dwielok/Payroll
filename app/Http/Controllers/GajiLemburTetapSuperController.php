<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use Illuminate\Http\Request;

class GajiLemburTetapSuperController extends Controller
{
    public function index()
    {
        $approvals = ApprovalLembur::where('tipe_karyawan', 'tetap')->get();
        return view('superuser.gaji_lembur_tetap', compact('approvals'));
    }

    public function detail(Request $request)
    {
        //get url
        $url = $request->url();
        $url = explode('/', $url);
        $url = end($url);
        //lowercase url
        $url = strtolower($url);

        //if url includes tetap
        if (str_contains($url, 'tetap')) {
            $urlBreadcumb = 'GajiLemburTetapSuper';
            $urlBreadcumb2 = 'EditLemburTetapSuper';
            $textBreadcumb = 'Tetap';
        } elseif (str_contains($url, 'inka')) {
            $urlBreadcumb = 'GajiLemburInkaSuper';
            $urlBreadcumb2 = 'EditLemburInkaSuper';
            $textBreadcumb = 'Perbantuan INKA';
        } elseif (str_contains($url, 'pkwt')) {
            $urlBreadcumb = 'GajiLemburPkwtSuper';
            $urlBreadcumb2 = 'EditLemburPkwtSuper';
            $textBreadcumb = 'PKWT';
        }

        $id = $request->get('id');
        $gajis = GajiLembur::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_lembur.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_lembur.*', 'pegawai.*', 'jabatan.*', 'gaji_lembur.id as id_gaji')
            ->where('gaji_lembur.id_approval', '=', $id)
            ->get();

        $gajis = $gajis->map(function ($item) {
            $item->bulan = ApprovalLembur::where('id', $item->id_approval)->value('bulan');
            $item->tahun = ApprovalLembur::where('id', $item->id_approval)->value('year');
            $item->nominal_lembur_weekend = $item->lembur_weekend * 15000;
            $item->nominal_lembur_weekday = $item->lembur_weekday * 11000;
            return $item;
        });

        return view('superuser.view_lembur_tetap', compact(
            'gajis',
            'urlBreadcumb',
            'textBreadcumb',
            'urlBreadcumb2'
        ));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $approval = GajiLembur::where('id', $id)->first();
        $approval->delete();
        return redirect()->back();
    }
}
