<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanPkwtImport;
use App\Models\Approval;
use App\Models\GajiPkwt;
use App\Models\GajiTemp;
use App\Models\GajiTemps;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportPkwtController extends Controller
{
    public function index()
    {
        return view('import_pkwt');
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
                GajiPkwt::insert([
                    'id_karyawan' => $karyawan->id,
                    'id_approval' => $id_approval,
                    'kehadiran' => $item[3],
                    'hari_kerja' => $item[4],
                    'nilai_ikk' => $item[5],
                    'dana_ikk' => $item[6],
                    'jam_lembur_weekdays' => $item[7],
                    'jam_lembur_weekend' => $item[8],
                    'penyesuaian_penambahan' => $item[9],
                    'penyesuaian_pengurangan' => $item[10],
                    'jam_hilang' => $item[11],
                    'persentase_profesional' => $item[12],
                ]);
            }
        });

        return redirect('/karyawanPKWT');
    }
}
