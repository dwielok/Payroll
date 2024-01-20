<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanPkwtImport;
use App\Models\Approval;
use App\Models\ApprovalLembur;
use App\Models\GajiLembur;
use App\Models\GajiPkwt;
use App\Models\GajiTemp;
use App\Models\GajiTemps;
use App\Models\Karyawan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportPkwtController extends Controller
{
    public function index()
    {
        return view('import_pkwt');
    }

    public function index_lembur()
    {
        return view('import_lembur_pkwt');
        //     $importTetap = ImportTetap::all();
        //     return view('ImportTetap', compact('importTetap'));
        //     return view('ImportTetap',['importTetap'=>$importTetap]);
        //
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('importPkwtDoc', $nama_file);

        $collection = Excel::toCollection(new KaryawanPkwtImport, public_path('/importPkwtDoc/' . $nama_file));

        $collection = $collection[0];

        $date = $collection[0][1];
        //split by space
        $explode = explode(" ", $date);
        $bulan = $explode[0];
        $tahun = $explode[1];
        $type = $collection[1][1];
        //lowercase type
        $type = strtolower($type);

        $datas = $collection->splice(3);

        $msgArr = [];

        $datas->map(function ($item, $key) use ($type, &$msgArr) { // Pass $msgArr by reference
            $nip = $item[0];

            if ($nip != null) {
                $error_in_row = $key + 1;

                $mapping = [
                    3 => 'Kehadiran',
                    4 => 'Hari Kerja',
                    5 => 'Nilai IKK',
                    6 => 'Dana IKK',
                    7 => 'Penyesuaian Penambahan',
                    8 => 'Penyesuaian Pengurangan',
                    10 => 'Tunjangan Profesional',
                ];

                //must be zero or more than zero,
                // nilai ikk can decimal

                foreach ($mapping as $index => $value) {
                    if ($item[$index] == '') {
                        array_push($msgArr, $value . ' tidak boleh kosong pada baris ' . $error_in_row);
                    } else if (!is_numeric($item[$index])) {
                        array_push($msgArr, $value . ' harus berupa angka pada baris ' . $error_in_row);
                    } else if ($item[$index] < 0) {
                        array_push($msgArr, $value . ' tidak boleh kurang dari nol pada baris ' . $error_in_row);
                    }
                }
            }
        });

        if (count($msgArr) > 0) {
            return redirect('/ImportPkwt')->with('error', $msgArr);
        }

        $approval = Approval::create([
            'bulan' => $bulan,
            'year' => $tahun,
            'tipe_karyawan' => $type,
            'status' => '',
            'keterangan' => '',
        ]);

        //remove the 3 index top
        // $datas = $collection->splice(3);
        $id_approval = $approval->id;

        //search NIP in karyawan by looping $datas
        $datas->map(function ($item) use ($id_approval) {
            $nip = $item[0];
            if ($nip != null) {
                $karyawan = Pegawai::where('nip', $nip)->first();
                GajiPkwt::insert([
                    'id_karyawan' => $karyawan->id,
                    'id_approval' => $id_approval,
                    'kehadiran' => $item[2],
                    'hari_kerja' => $item[3],
                    'nilai_ikk' => $item[4],
                    'dana_ikk' => $item[5],
                    'penyesuaian_penambahan' => $item[6],
                    'penyesuaian_pengurangan' => $item[7],
                    'jam_hilang' => $item[8],
                    'tunjangan_profesional' => $item[9],
                ]);
            }
        });

        return redirect('/karyawanPKWT');
    }

    public function import_lembur(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('importPkwtDoc', $nama_file);

        // Excel::import(new KaryawanTetapImport, public_path('/importTetap/' . $nama_file));
        $collection = Excel::toCollection(new KaryawanPkwtImport, public_path('/importPkwtDoc/' . $nama_file));
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
        return redirect('/GajiLemburPkwt');
    }
}
