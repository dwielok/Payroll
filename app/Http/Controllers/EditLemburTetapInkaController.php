<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use Illuminate\Http\Request;

class EditLemburTetapInkaController extends Controller
{
    public function index(Request $request)
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
            $urlBreadcumb2 = 'viewLemburTetap';
            $textBreadcumb = 'Tetap';
        } elseif (str_contains($url, 'inka')) {
            $urlBreadcumb = 'GajiLemburInkaSuper';
            $urlBreadcumb2 = 'viewLemburInka';
            $textBreadcumb = 'Perbantuan Inka';
        } elseif (str_contains($url, 'pkwt')) {
            $urlBreadcumb = 'GajiLemburPkwtSuper';
            $urlBreadcumb2 = 'viewLemburPkwt';
            $textBreadcumb = 'PKWT';
        }

        $id = $request->get('id');
        $gaji = GajiLembur::leftJoin('pegawai', 'pegawai.id', '=', 'gaji_lembur.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id', '=', 'pegawai.kode_jabatan')
            ->select('gaji_lembur.*', 'pegawai.*', 'jabatan.*')
            ->where('gaji_lembur.id', '=', $id)
            ->first();

        // dd($gaji);e

        $gaji->bulan = ApprovalLembur::where('id', $gaji->id)->value('bulan');
        $gaji->tahun = ApprovalLembur::where('id', $gaji->id)->value('year');
        $gaji->tipe_karyawan = ApprovalLembur::where('id', $gaji->id_approval)->value('tipe_karyawan');
        $gaji->nominal_lembur_weekend = $gaji->lembur_weekend * 15000;
        $gaji->nominal_lembur_weekday = $gaji->lembur_weekday * 11000;

        // dd($gaji);

        return view('superuser.edit_lembur_tetap', compact('gaji', 'urlBreadcumb', 'textBreadcumb', 'urlBreadcumb2'));
    }
}
