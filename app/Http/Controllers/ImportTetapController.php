<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\KaryawanTetapImport;
use App\Models\Approval;
use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use App\Models\GajiTemp;
use App\Models\ImportTetap;
use App\Models\Karyawan;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ImportTetapController extends Controller
{
    public function index()
    {
        $url = url()->current();
        //lowercase
        $url = strtolower($url);
        //if $url contain inka
        if (str_contains($url, 'tetap')) {
            $type = 'Tetap';
        } else {
            $type = 'Perbantuan Inka';
        }
        return view('import_tetap', compact('type'));
        //     $importTetap = ImportTetap::all();
        //     return view('ImportTetap', compact('importTetap'));
        //     return view('ImportTetap',['importTetap'=>$importTetap]);
        //
    }

    public function index_lembur()
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

        $file->move('importTetapDoc', $nama_file);

        // Excel::import(new KaryawanTetapImport, public_path('/importTetap/' . $nama_file));
        $collection = Excel::toCollection(new KaryawanTetapImport, public_path('/importTetapDoc/' . $nama_file));
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
            $nip = $item[0];
            if ($nip != null) {
                $karyawan = Pegawai::where('nip', $nip)->first();

                GajiTemp::insert([
                    'id_karyawan' => $karyawan->id,
                    'id_approval' => $id_approval,
                    'golongan' => $item[2],
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
                    'kredit_poin' => $item[13],
                ]);
            }
        });

        // dd($datas);
        if ($type == 'tetap') {
            return redirect('/KaryawanTetap');
        } else {
            return redirect('/karyawanperbantuaninka');
        }
    }

    public function import_lembur(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('importTetapDoc', $nama_file);

        // Excel::import(new KaryawanTetapImport, public_path('/importTetap/' . $nama_file));
        $collection = Excel::toCollection(new KaryawanTetapImport, public_path('/importTetapDoc/' . $nama_file));
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
                $karyawan = Pegawai::where('nip', $nip)->first();
                GajiLembur::insert([
                    'id_karyawan' => $karyawan->id,
                    'id_approval' => $id_approval,
                    'lembur_weekend' => $item[2],
                    'lembur_weekday' => $item[3],
                ]);
            }
        });

        // dd($datas);
        $auth = Auth::user()->tipe_user;
        if ($auth == 'admin') {
            if ($type == 'tetap') {
                return redirect('/GajiLemburTetap');
            } else if ($type == 'inka') {
                return redirect('/GajiLemburInka');
            } else {
                return redirect('/GajiLemburPkwt');
            }
        } else {
            if ($type == 'tetap') {
                return redirect('/GajiLemburTetapSuper');
            } else if ($type == 'inka') {
                return redirect('/GajiLemburInkaSuper');
            } else {
                return redirect('/GajiLemburPkwtSuper');
            }
        }
    }
}
