<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\KaryawanTetapImport;
use App\Models\Approval;
use App\Models\GajiLembur;
use App\Models\GajiTemp;
use App\Models\ImportTetap;
use App\Models\Karyawan;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Session;

class ImportLemburTetapController extends Controller
{
    public function index()
    {
        return view('import_lembur_tetap');
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

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('importLemburTetapDoc', $nama_file);

        // Excel::import(new KaryawanTetapImport, public_path('/importTetap/' . $nama_file));
        $collection = Excel::toCollection(new KaryawanTetapImport, public_path('/importLemburTetapDoc/' . $nama_file));
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
                $karyawan = Pegawai::where('nip', $nip)->first();
                GajiLembur::insert([
                    'id_karyawan' => $karyawan->id,
                    'id_approval' => $id_approval,
                    'lembur_weekend' => $item[3],
                    'lembur_weekday' => $item[4],
                ]);
            }
        });

        // dd($datas);
        return redirect('/GajiLemburTetap');
    }
}
