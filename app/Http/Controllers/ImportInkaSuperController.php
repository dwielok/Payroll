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

        $datas = $collection->splice(3);

        $msgArr = [];

        $datas->map(function ($item, $key) use ($type, &$msgArr) { // Pass $msgArr by reference
            $nip = $item[0];

            if ($nip != null) {
                $pattern = '/^[IVXLCDM]+-\d+-\d+/';
                $golongan = $item[2];
                $error_in_row = $key + 1;

                if (!preg_match($pattern, $golongan)) {
                    array_push($msgArr, 'Golongan tidak sesuai format pada baris ' . $error_in_row);
                }

                $mapping = [
                    3 => 'Kehadiran',
                    4 => 'Hari Kerja',
                    5 => 'Nilai IKK',
                    6 => 'Dana IKK',
                    7 => 'Penyesuaian Penambahan',
                    8 => 'Penyesuaian Pengurangan',
                    9 => 'PPIP Mandiri',
                    10 => 'Jam Hilang',
                    11 => 'Kopinka',
                    12 => 'Keuangan',
                    13 => 'Kredit Poin',
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
            if ($type == 'tetap') {
                $url = '/ImportTetap';
            } else {
                $url = '/ImportInkaSuper';
            }
            return redirect($url)->with('error', $msgArr);
        }

        $approval = Approval::create([
            'bulan' => $bulan,
            'year' => $tahun,
            'tipe_karyawan' => $type,
            'status' => '',
            'keterangan' => '',
        ]);

        //remove the 3 index top
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
