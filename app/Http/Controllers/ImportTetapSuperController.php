<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanTetapImport;
use App\Models\Approval;
use App\Models\GajiTemp;
use App\Models\Karyawan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportTetapSuperController extends Controller
{

    public function index()
    {
        return view('superuser.import_tetap');
    }
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        // $file->move('importTetapDoc', $nama_file);
        $file->move(public_path('/importTetapDoc'), $nama_file);

        $collection = Excel::toCollection(new KaryawanTetapImport, public_path('/importTetapDoc/' . $nama_file));

        $collection = $collection[0];

        $date = $collection[0][1];

        $explode = explode(" ", $date);
        $bulan = $explode[0];
        $tahun = $explode[1];
        $type = $collection[1][1];

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

        // dd($msgArr);

        if (count($msgArr) > 0) {
            if ($type == 'tetap') {
                $url = '/ImportTetapSuper';
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

        $id_approval = $approval->id;

        //loop item and index
        $datas->map(function ($item, $key) use ($id_approval) {
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

        return redirect('/KaryawanTetapSuper');
    }
}
