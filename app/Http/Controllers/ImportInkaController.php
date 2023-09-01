<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportInkaController extends Controller
{
    public function index()
    {
        return view('import_inka');
    }

    public function proses_import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // nama file
        echo 'File Name: ' . $file->getClientOriginalName();
        echo '<br>';

        // ekstensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension();
        echo '<br>';

        // real path
        echo 'File Real Path: ' . $file->getRealPath();
        echo '<br>';

        // ukuran file
        echo 'File Size: ' . $file->getSize();
        echo '<br>';

        // tipe mime
        echo 'File Mime Type: ' . $file->getMimeType();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';

        // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());
    }
}
