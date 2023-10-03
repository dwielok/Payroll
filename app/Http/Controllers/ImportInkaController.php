<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanInkaImport;
use App\Models\Approval;
use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use App\Models\GajiTemp;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportInkaController extends Controller
{
    public function index()
    {
        return view('import_inka');
    }

    public function index_lembur()
    {
        return view('import_lembur_inka');
        //     $importTetap = ImportTetap::all();
        //     return view('ImportTetap', compact('importTetap'));
        //     return view('ImportTetap',['importTetap'=>$importTetap]);
        //
    }

    // public function proses_import(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required',
    //     ]);

    //     // menyimpan data file yang diupload ke variabel $file
    //     $file = $request->file('file');

    //     // nama file
    //     echo 'File Name: ' . $file->getClientOriginalName();
    //     echo '<br>';

    //     // ekstensi file
    //     echo 'File Extension: ' . $file->getClientOriginalExtension();
    //     echo '<br>';

    //     // real path
    //     echo 'File Real Path: ' . $file->getRealPath();
    //     echo '<br>';

    //     // ukuran file
    //     echo 'File Size: ' . $file->getSize();
    //     echo '<br>';

    //     // tipe mime
    //     echo 'File Mime Type: ' . $file->getMimeType();

    //     // isi dengan nama folder tempat kemana file diupload
    //     $tujuan_upload = 'data_file';

    //     // upload file
    //     $file->move($tujuan_upload, $file->getClientOriginalName());
    // }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('importInkaDoc', $nama_file);

        $collection = Excel::toCollection(new KaryawanInkaImport, public_path('/importInkaDoc/' . $nama_file));

        $collection = $collection[0];

        $date = $collection[0][1];
        //split by space
        $explode = explode(" ", $date);
        $bulan = $explode[0];
        $tahun = $explode[1];
        $type = $collection[1][1];
        //lowercase type
        $type = strtolower($type);

        $approval = Approval::create([
            'bulan' => $bulan,
            'year' => $tahun,
            'tipe_karyawan' => $type,
            'status' => '',
            'keterangan' => '',
        ]);

        //remove the 3 index top
        $datas = $collection->splice(3);
        $id_approval = $approval->id;

        //search NIP in karyawan by looping $datas
        $datas->map(function ($item) use ($id_approval) {
            $nip = $item[1];
            if ($nip != null) {
                $karyawan = Karyawan::where('nip', $nip)->first();
                GajiTemp::insert([
                    'id_karyawan' => $karyawan->id,
                    'id_approval' => $id_approval,
                    'kehadiran' => $item[3],
                    'hari_kerja' => $item[4],
                    'nilai_ikk' => $item[5],
                    'dana_ikk' => $item[6],
                    'penyesuaian_penambahan' => $item[7],
                    'penyesuaian_pengurangan' => $item[8],
                    'ppip_mandiri' => $item[9],
                    'jam_hilang' => $item[10],
                    'kopinka' => $item[11],
                    'keuangan' => $item[12],
                ]);
            }
        });

        return redirect('/karyawanperbantuaninka');
    }

    public function import_lembur(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('importInkaDoc', $nama_file);

        // Excel::import(new KaryawanTetapImport, public_path('/importTetap/' . $nama_file));
        $collection = Excel::toCollection(new KaryawanInkaImport, public_path('/importInkaDoc/' . $nama_file));
        // $collection = (new KaryawanTetapImport)->toCollection($file);

        $collection = $collection[0];

        $date = $collection[0][1];
        //split by space
        $explode = explode(" ", $date);
        $bulan = $explode[0];
        $tahun = $explode[1];
        $type = $collection[1][1];
        //lowercase type
        $type = strtolower($type);

        $approval = ApprovalLembur::create([
            'bulan' => $bulan,
            'year' => $tahun,
            'tipe_karyawan' => $type,
            'status' => '',
            'keterangan' => '',
        ]);

        //remove the 3 index top
        $datas = $collection->splice(3);
        $id_approval = $approval->id;

        //search NIP in karyawan by looping $datas
        $datas->map(function ($item) use ($id_approval) {
            $nip = $item[0];
            if ($nip != null) {
                $karyawan = Karyawan::where('nip', $nip)->first();
                GajiLembur::insert([
                    'id_karyawan' => $karyawan->id,
                    'id_approval' => $id_approval,
                    'lembur_weekend' => $item[2],
                    'lembur_weekday' => $item[3],
                ]);
            }
        });

        // dd($datas);
        return redirect('/GajiLemburInka');
    }
}
