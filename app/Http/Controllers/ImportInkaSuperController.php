<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanInkaImport;
use App\Models\Approval;
use App\Models\GajiTemp;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportInkaSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.import_inka');
    }

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
                    'golongan' => $item[3],
                    'kehadiran' => $item[4],
                    'hari_kerja' => $item[5],
                    'nilai_ikk' => $item[6],
                    'dana_ikk' => $item[7],
                    'penyesuaian_penambahan' => $item[8],
                    'penyesuaian_pengurangan' => $item[9],
                    'ppip_mandiri' => $item[10],
                    'jam_hilang' => $item[11],
                    'kopinka' => $item[12],
                    'keuangan' => $item[13],
                    'kredit_poin' => $item[14], 
                ]);
            }
        });

        return redirect('/KaryawanInkaSuper');
    }
}