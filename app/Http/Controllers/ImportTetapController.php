<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\ImportTetap;
use Illuminate\Support\Facades\Session;

class ImportTetapController extends Controller
{
    public function index()
    {
        return view('import_tetap');
        //     $importTetap = ImportTetap::all();
        //     return view('ImportTetap', compact('importTetap'));
        //     return view('ImportTetap',['importTetap'=>$importTetap]);
        //
    }

    // public function import_excel(Request $request)
    // {
    //     // validasi
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);

    //     // menangkap file excel
    //     $file = $request->file('file');

    //     // membuat nama file unik
    //     $nama_file = rand() . $file->getClientOriginalName();

    //     // upload ke folder file di dalam folder public
    //     $file->move('importTetap', $nama_file);

    //     // import data
    //     Excel::import(new ImportTetapController, public_path('/file_import_tetap/' . $nama_file));

    //     // notifikasi dengan session
    //     Session::flash('sukses', 'Data Gaji Karyawan Berhasil Diimport!');

    //     // alihkan halaman kembali
    //     return redirect('/importTetap');
    // }
}
