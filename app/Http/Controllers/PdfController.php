<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\GajiLembur;
use App\Models\GajiPkwt;
use App\Models\GajiTemp;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use stdClass;

class PdfController extends Controller
{
    public function test_pdf()
    {
        $data =  [
            'nama' => 'Suell',
            'asal' => 'Bumi',
        ];

        $pdf = PDF::loadView('test_pdf', compact('data'));
        return $pdf->stream('Contoh random.pdf');
    }

    public function test_rar()
    {
        $masters = [
            [
                'id' => '1',
                'bulan' => 'Januari',
                'tahun' => '2021',
                'gaji' => [
                    [
                        'nama' => 'Suell',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Adi',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Rusdi',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Elox',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Ncip',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Uwes',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Cahyo',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Putroo',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ]
                ]
            ],
            [
                'id' => '2',
                'bulan' => 'Februari',
                'tahun' => '2021',
                'gaji' => [
                    [
                        'nama' => 'Putroo Utomo',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ]
                ]
            ],
            [
                'id' => '3',
                'bulan' => 'Maret',
                'tahun' => '2021',
                'gaji' => [
                    [
                        'nama' => 'Hadi Koruptor',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ]
                ]
            ],
        ];

        $pdfs = [];

        foreach ($masters[0]['gaji'] as $master) {
            $data = [
                'nama' => $master['nama'],
                'nip' => $master['nip'],
                'jabatan' => $master['jabatan'],
                'golongan' => $master['golongan'],
                'gaji_pokok' => $master['gaji_pokok'],
                'tunjangan_tetap' => $master['tunjangan_tetap'],
            ];

            $pdf = PDF::loadView('test_rar2', compact('data'));
            $content = $pdf->download()->getOriginalContent();
            $random_name = rand(0, 9999999999);
            $random_name = 'Gaji ' . $master['nama'] . '-' . $masters[0]['bulan'] . '-' . $masters[0]['tahun'] . '-' . $random_name;
            Storage::put('public/pdf/' . $random_name . '.pdf', $content);

            //push to array pdfs random_name
            array_push($pdfs, $random_name);
        }

        try {
            //code...
            //create zip 
            $zip = new \ZipArchive();
            $random_name = rand(0, 9999999999);
            $zip_name = 'gaji-' . $random_name . '.zip';
            //save to storages/app/public/zip
            if ($zip->open(storage_path('app/public/zip/' . $zip_name), \ZipArchive::CREATE) === TRUE) {
                foreach ($pdfs as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $relativeNameInZipFile = $value . '.pdf';
                    $zip->addFile(storage_path('app/public/pdf/' . $value . '.pdf'), $relativeNameInZipFile);
                }
                $zip->close();
                //unlink the pdf
                foreach ($pdfs as $key => $value) {
                    Storage::delete('public/pdf/' . $value . '.pdf');
                }
            } else {
                dd('gagal');
            }
            dd(storage_path('app/public/zip/' . $zip_name));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    function incrementAlpha($input, $count)
    {
        $letter = substr($input, 0, 1);
        $number = intval(substr($input, 1));

        if ($number >= $count) {
            $letter = chr(ord($letter) + 1);
            $number = 1;
        } else {
            $number++;
        }

        return $letter . $number;
    }

    private function getKenaikan($masa_kerja)
    {
        $tahun = 10;
        $awal = 3000000;
        $abjadAwal = 'A1';
        $kenaikan_per_tahun = 0.05;
        $kenaikan = $awal;
        $gajis = [];
        $awal = ['A1'];
        for ($i = 0; $i < $masa_kerja; $i++) {
            $abjadAwal = $this->incrementAlpha($abjadAwal, $tahun);
            array_push($awal, $abjadAwal);
            $kenaikan = $kenaikan + ($kenaikan * $kenaikan_per_tahun);
            $kenaikan = round($kenaikan);
            $gajis[$i] = [
                'gaji' => $kenaikan,
                'abjad' => $awal[$i],
            ];
        }
        return $gajis;
    }

    private function hitungJabatan($jabatan, $gaji_pokok)
    {
        //jabatan ada 2 Staff dan Manager
        if ($jabatan == 'Staff') {
            return 0.1 * $gaji_pokok;
        } else {
            return 0.2 * $gaji_pokok;
        }
    }

    private function hitungKehadiran($kehadiran)
    {
        return $kehadiran * 10000;
    }

    private function levelPendidikan($pendidikan)
    {
        $umk = 2190216;
        if ($pendidikan == 'SMK') {
            return $umk;
        } else if ($pendidikan == 'D3') {
            return $umk + ($umk * 0.1);
        } else if ($pendidikan == 'S1' || $pendidikan == 'D4') {
            return $umk + ($umk * 0.2);
        } else if ($pendidikan == 'S2') {
            return $umk + ($umk * 0.3);
        }
    }

    public function generate_zip(Request $request)
    {
        $input = $request->all();
        $data = $input['data'];

        $result = [];
        foreach ($data as $key => $value) {
            $approvals = Approval::where('bulan', $value['bulan'])
                ->where('year', $value['tahun'])->where('status', '0')->get();
            // $result[] = [
            //     'nama' => $value['nama'],
            //     'nip' => $value['nip'],
            //     'jabatan' => $value['jabatan'],
            //     'golongan' => $value['golongan'],
            //     'gaji_pokok' => $value['gaji_pokok'],
            //     'tunjangan_tetap' => $value['tunjangan_tetap'],
            // ];
            //push to $result
            foreach ($approvals as $key => $value) {
                if ($value->tipe_karyawan != 'pkwt') {
                    $gajis = GajiTemp::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_temp.id_karyawan')->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')->where('gaji_temp.id_approval', $value->id)->get();
                    $gajis = $gajis->map(function ($item) use ($value) {
                        $item->kenaikan = $this->getKenaikan($item->masa_kerja);
                        $item->gaji_pokok = $item->kenaikan[$item->masa_kerja - 1]['gaji'];
                        $item->golongan = $item->kenaikan[$item->masa_kerja - 1]['abjad'];
                        $item->tunjangan_tetap = 0.05 * $item->gaji_pokok;
                        $item->penghasilan_tetap = $item->gaji_pokok + $item->tunjangan_tetap;

                        $item->tunjangan_transportasi = $this->hitungJabatan($item->jabatan, $item->gaji_pokok) + $this->hitungKehadiran($item->kehadiran);
                        $item->tunjangan_jabatan = $this->hitungJabatan($item->jabatan, $item->gaji_pokok);
                        $item->tunjangan_karya = $item->dana_ikk * ($item->kehadiran / $item->hari_kerja) * $item->nilai_ikk;
                        $item->bpjs_kesehatan = 0.04 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $item->bpjs_ketenagakerjaan = 0.0727 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        //detail
                        $bpjstk = new \stdClass();
                        $bpjstk->jht = 0.037 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $bpjstk->jkk = 0.0127 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $bpjstk->jkm = 0.003 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $bpjstk->jp = 0.02 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $item->detail_bpjs_tk = $bpjstk;

                        $item->ppip = $item->gaji_pokok / 12;
                        $item->jumlah_premi = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
                        $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
                        $item->penghasilan_tunjangan_tidak_tetap = $item->tunjangan_transportasi + $item->tunjangan_jabatan + $item->tunjangan_karya + $item->benefit;
                        $item->penghasilan_bruto = $item->gaji_pokok + $item->tunjangan_tetap + $item->penghasilan_tunjangan_tidak_tetap;

                        $item->premi_bpjs_kesehatan = 0.01 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $item->premi_bpjs_ketenagakerjaan = 0.03 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        //detail
                        $premi_bpjstk = new \stdClass();
                        $premi_bpjstk->jht = 0.02 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $premi_bpjstk->jp = 0.01 * ($item->gaji_pokok + $item->tunjangan_tetap);
                        $item->detail_premi_bpjs_tk = $premi_bpjstk;

                        $item->premi_ppip = $item->ppip_mandiri;
                        $item->potongan_premi = $item->premi_bpjs_kesehatan + $item->premi_bpjs_ketenagakerjaan + $item->premi_ppip;
                        $item->potongan_benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
                        $item->potongan_jam_hilang = ($item->jam_hilang / 173) * $item->gaji_pokok;
                        $item->potongan_kopinka = $item->kopinka;
                        $item->potongan_keuangan = $item->keuangan;
                        $item->potongan = $item->potongan_premi + $item->potongan_benefit + $item->potongan_jam_hilang + $item->potongan_kopinka + $item->potongan_keuangan;
                        $item->penghasilan_netto = ($item->penghasilan_bruto) - $item->potongan;
                        $item->tunjangan_profesional = 0;

                        //cari lembur berdasarkan bulan kemarin dan tahun yang sama dengan $gaji->bulan dan $gaji->tahun
                        //cari bulan kemarin

                        $bulan = [
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];

                        $tahun = $value->year;
                        //cari di index mana bulan sekarang pada $item->bulan
                        $bulan_gaji = array_search($value->bulan, $bulan);
                        //jika sudah ketemu indexnya maka kurangi 1 untuk mendapatkan bulan kemarin
                        $index_bulan_kemarin = $bulan_gaji - 1;
                        //jika index bulan kemarin -1 maka bulan kemarin adalah desember
                        if ($index_bulan_kemarin == -1) {
                            $index_bulan_kemarin = 11;
                            $tahun_kemarin = $tahun - 1;
                        } else {
                            $tahun_kemarin = $tahun;
                        }
                        //cari bulan kemarin
                        $bulan_kemarin = $bulan[$index_bulan_kemarin];

                        $lembur_weekend = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                            ->where('id_karyawan', $item->id_karyawan)
                            ->where('bulan', $bulan_kemarin)
                            ->where('year', $tahun_kemarin)
                            ->sum('lembur_weekend');
                        $lembur_weekday = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                            ->where('id_karyawan', $item->id_karyawan)
                            ->where('bulan', $bulan_kemarin)
                            ->where('year', $tahun_kemarin)
                            ->sum('lembur_weekday');

                        //ganti disini
                        $lembur_weekend = $lembur_weekend * 30000;
                        $lembur_weekday = $lembur_weekday * 20000;

                        $item->lembur_kemarin = $lembur_weekend + $lembur_weekday;


                        return $item;
                    });
                    foreach ($gajis as $key => $gaji) {
                        $obj = new stdClass();
                        $obj->id_aproval = $value->id;
                        $obj->tunjangan_profesional = $gaji->tunjangan_profesional ?? 0;
                        $obj->type = $value->tipe_karyawan;
                        $obj->nama = $gaji->nama_karyawan ?? '';
                        $obj->nip = $gaji->nip ?? '';
                        $obj->status = $value->status;
                        $obj->golongan = $gaji->golongan ?? '';
                        $obj->jabatan = $gaji->tipe_jabatan ?? '';
                        $obj->bulan = $value->bulan;
                        $obj->tahun = $value->year;
                        $obj->gaji_pokok = $gaji->gaji_pokok ?? 0;
                        $obj->tunjangan_tetap = $gaji->tunjangan_tetap ?? 0;
                        $obj->penghasilan_tetap = $gaji->penghasilan_tetap ?? 0;
                        $obj->tunjangan_transportasi = $gaji->tunjangan_transportasi ?? 0;
                        $obj->tunjangan_jabatan = $gaji->tunjangan_jabatan ?? 0;
                        $obj->tunjangan_karya = $gaji->tunjangan_karya ?? 0;
                        $obj->bpjs_kesehatan = $gaji->bpjs_kesehatan ?? 0;
                        $obj->bpjs_ketenagakerjaan = $gaji->bpjs_ketenagakerjaan ?? 0;
                        $obj->detail_bpjs_tk = $gaji->detail_bpjs_tk;
                        $obj->ppip = $gaji->ppip ?? 0;
                        $obj->jumlah_premi = $gaji->jumlah_premi ?? 0;
                        $obj->benefit = $gaji->benefit ?? 0;
                        $obj->penghasilan_tunjangan_tidak_tetap = $gaji->penghasilan_tunjangan_tidak_tetap ?? 0;
                        $obj->penghasilan_bruto = $gaji->penghasilan_bruto ?? 0;
                        $obj->premi_bpjs_kesehatan = $gaji->premi_bpjs_kesehatan ?? 0;
                        $obj->premi_bpjs_ketenagakerjaan = $gaji->premi_bpjs_ketenagakerjaan ?? 0;
                        $obj->detail_premi_bpjs_tk = $gaji->detail_premi_bpjs_tk;
                        $obj->premi_ppip = $gaji->premi_ppip ?? 0;
                        $obj->potongan_premi = $gaji->potongan_premi ?? 0;
                        $obj->potongan_benefit = $gaji->potongan_benefit ?? 0;
                        $obj->potongan_jam_hilang = $gaji->potongan_jam_hilang ?? 0;
                        $obj->potongan_kopinka = $gaji->potongan_kopinka ?? 0;
                        $obj->potongan_keuangan = $gaji->potongan_keuangan ?? 0;
                        $obj->potongan = $gaji->potongan ?? 0;
                        $obj->penghasilan_netto = $gaji->penghasilan_netto ?? 0;
                        $obj->nilai_ikk = $gaji->nilai_ikk ?? 0;

                        $obj->lembur_kemarin = $gaji->lembur_kemarin ?? 0;

                        $result[] = $obj;
                    }
                } else {
                    $gajis = GajiPkwt::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_pkwt.id_karyawan')->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')->where('gaji_pkwt.id_approval', $value->id)->get();
                    $gajis = $gajis->map(function ($item) use ($value) {
                        $item->gaji_pokok = $this->levelPendidikan($item->pendidikan);
                        $item->penghasilan_tetap = $item->gaji_pokok;
                        $item->golongan = '-';
                        $item->tunjangan_transportasi = $this->hitungKehadiran($item->kehadiran);
                        $item->tunjangan_profesional = $item->tunjangan_profesional;
                        $item->tunjangan_karya =  $item->dana_ikk * ($item->kehadiran / $item->hari_kerja) * $item->nilai_ikk;
                        $item->bpjs_kesehatan = 0.04 * ($item->gaji_pokok);
                        $item->bpjs_ketenagakerjaan = 0.0727 * ($item->gaji_pokok);
                        //detail
                        $bpjstk = new \stdClass();
                        $bpjstk->jht = 0.037 * ($item->gaji_pokok);
                        $bpjstk->jkk = 0.0127 * ($item->gaji_pokok);
                        $bpjstk->jkm = 0.003 * ($item->gaji_pokok);
                        $bpjstk->jp = 0.02 * ($item->gaji_pokok);
                        $item->detail_bpjs_tk = $bpjstk;

                        $item->jumlah_premi = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
                        $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
                        $item->penghasilan_tidak_tetap = $item->tunjangan_transportasi + $item->tunjangan_profesional + $item->tunjangan_karya + $item->benefit;

                        $item->penghasilan_bruto = $item->penghasilan_tetap + $item->penghasilan_tidak_tetap;

                        $item->bpjs_kesehatan_premi = 0.01 * ($item->gaji_pokok);
                        $item->bpjs_ketenagakerjaan_premi = 0.03 * ($item->gaji_pokok);
                        //detail
                        $premi_bpjstk = new \stdClass();
                        $premi_bpjstk->jht = 0.02 * ($item->gaji_pokok);
                        $premi_bpjstk->jp = 0.01 * ($item->gaji_pokok);
                        $item->detail_premi_bpjs_tk = $premi_bpjstk;

                        $item->premi = $item->bpjs_kesehatan_premi + $item->bpjs_ketenagakerjaan_premi;
                        $item->potongan_premi = $item->bpjs_kesehatan_premi + $item->bpjs_ketenagakerjaan_premi;
                        $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
                        $item->potongan_jam_hilang = ($item->jam_hilang / 173) * $item->gaji_pokok;
                        $item->potongan = $item->premi + $item->benefit + $item->potongan_jam_hilang;

                        $item->penghasilan_netto = ($item->penghasilan_bruto) - $item->potongan;

                        //cari lembur berdasarkan bulan kemarin dan tahun yang sama dengan $gaji->bulan dan $gaji->tahun
                        //cari bulan kemarin

                        $bulan = [
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];

                        $tahun = $value->year;
                        //cari di index mana bulan sekarang pada $item->bulan
                        $bulan_gaji = array_search($value->bulan, $bulan);
                        //jika sudah ketemu indexnya maka kurangi 1 untuk mendapatkan bulan kemarin
                        $index_bulan_kemarin = $bulan_gaji - 1;
                        //jika index bulan kemarin -1 maka bulan kemarin adalah desember
                        if ($index_bulan_kemarin == -1) {
                            $index_bulan_kemarin = 11;
                            $tahun_kemarin = $tahun - 1;
                        } else {
                            $tahun_kemarin = $tahun;
                        }
                        //cari bulan kemarin
                        $bulan_kemarin = $bulan[$index_bulan_kemarin];

                        $lembur_weekend = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                            ->where('id_karyawan', $item->id_karyawan)
                            ->where('bulan', $bulan_kemarin)
                            ->where('year', $tahun_kemarin)
                            ->sum('lembur_weekend');
                        $lembur_weekday = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                            ->where('id_karyawan', $item->id_karyawan)
                            ->where('bulan', $bulan_kemarin)
                            ->where('year', $tahun_kemarin)
                            ->sum('lembur_weekday');

                        //ganti disini
                        $lembur_weekend = $lembur_weekend * 30000;
                        $lembur_weekday = $lembur_weekday * 20000;

                        $item->lembur_kemarin = $lembur_weekend + $lembur_weekday;


                        return $item;
                    });
                    foreach ($gajis as $key => $gaji) {
                        $obj = new stdClass();
                        $obj->id_aproval = $value->id;
                        $obj->type = $value->tipe_karyawan;
                        $obj->nama = $gaji->nama_karyawan ?? '';
                        $obj->nip = $gaji->nip ?? '';
                        $obj->status = $value->status;
                        $obj->jabatan = $gaji->jabatan ?? '';
                        $obj->bulan = $value->bulan;
                        $obj->tahun = $value->year;
                        $obj->gaji_pokok = $gaji->gaji_pokok ?? 0;
                        $obj->penghasilan_tetap = $gaji->penghasilan_tetap ?? 0;
                        $obj->tunjangan_transportasi = $gaji->tunjangan_transportasi ?? 0;
                        $obj->tunjangan_profesional = $gaji->tunjangan_profesional ?? 0;
                        $obj->tunjangan_karya = $gaji->tunjangan_karya ?? 0;
                        $obj->bpjs_kesehatan = $gaji->bpjs_kesehatan ?? 0;
                        $obj->bpjs_ketenagakerjaan = $gaji->bpjs_ketenagakerjaan ?? 0;
                        $obj->detail_bpjs_tk = $gaji->detail_bpjs_tk;
                        $obj->benefit = $gaji->benefit ?? 0;
                        $obj->penghasilan_tunjangan_tidak_tetap = $gaji->penghasilan_tidak_tetap ?? 0;
                        $obj->penghasilan_bruto = $gaji->penghasilan_bruto ?? 0;
                        $obj->premi_bpjs_kesehatan = $gaji->bpjs_kesehatan_premi ?? 0;
                        $obj->premi_bpjs_ketenagakerjaan = $gaji->bpjs_ketenagakerjaan_premi ?? 0;
                        $obj->detail_premi_bpjs_tk = $gaji->detail_premi_bpjs_tk;
                        $obj->premi = $gaji->premi ?? 0;
                        $obj->potongan_jam_hilang = $gaji->potongan_jam_hilang ?? 0;
                        $obj->potongan = $gaji->potongan ?? 0;
                        $obj->penghasilan_netto = $gaji->penghasilan_netto ?? 0;
                        $obj->golongan = $gaji->golongan ?? '-';
                        $obj->tunjangan_tetap = 0;
                        $obj->premi_ppip = 0;
                        $obj->potongan_keuangan = 0;
                        $obj->potongan_kopinka = 0;
                        $obj->nilai_ikk = $gaji->nilai_ikk ?? 0;
                        $obj->jumlah_premi = $gaji->jumlah_premi ?? 0;
                        $obj->ppip = $gaji->ppip ?? 0;
                        $obj->potongan_premi = $gaji->potongan_premi ?? 0;

                        $obj->lembur_kemarin = $gaji->lembur_kemarin ?? 0;

                        $result[] = $obj;
                    }
                }
            }
        }

        //for testing
        // $res0 = $result[0];

        // $gaji = $res0;

        // return view('pdf_tetap', compact('gaji'));
        //endfor testing

        $pdfs = [];

        foreach ($result as $master) {
            $gaji = $master;
            // if ($master->type == 'tetap' || $master->type == 'inka') {
            $pdf = PDF::loadView('view_slip', compact('gaji'));
            // }
            $content = $pdf->download()->getOriginalContent();
            $random_name = rand(0, 9999999999);
            $random_name = $master->type . '_' . $master->bulan . '-' . $master->tahun . '-' . $master->nama . '-' . $random_name;
            Storage::put('public/pdf/' . $random_name . '.pdf', $content);

            //push to array pdfs random_name
            array_push($pdfs, $random_name);
        }

        try {
            //code...
            //create zip
            $zip = new \ZipArchive();
            $random_name = rand(0, 9999999999);
            $zip_name = 'gaji-' . $random_name . '.zip';
            //save to storages/app/public/zip
            if ($zip->open(storage_path('app/public/zip/' . $zip_name), \ZipArchive::CREATE) === TRUE) {
                foreach ($pdfs as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $relativeNameInZipFile = $value . '.pdf';
                    $zip->addFile(storage_path('app/public/pdf/' . $value . '.pdf'), $relativeNameInZipFile);
                }
                $zip->close();
                //unlink the pdf
                foreach ($pdfs as $key => $value) {
                    Storage::delete('public/pdf/' . $value . '.pdf');
                }
            } else {
                //create folder zip
                Storage::makeDirectory('public/zip');
                $zip->open(storage_path('app/public/zip/' . $zip_name), \ZipArchive::CREATE);
                foreach ($pdfs as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $relativeNameInZipFile = $value . '.pdf';
                    $zip->addFile(storage_path('app/public/pdf/' . $value . '.pdf'), $relativeNameInZipFile);
                }
                $zip->close();
                //unlink the pdf
                foreach ($pdfs as $key => $value) {
                    Storage::delete('public/pdf/' . $value . '.pdf');
                }
            }
            //create a download link
            $link = url('storage/zip/' . $zip_name);
            return response()->json([
                'success' => true,
                'link' => $link,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function generate_slip(Request $request)
    {
        $input = $request->all();
        $data = $input['data'];

        $result = [];
        foreach ($data as $key => $value) {

            if ($value['tipe'] != 'pkwt') {
                $gajis = GajiTemp::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_temp.id_karyawan')
                    ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')
                    ->leftJoin('approvals', 'approvals.id', '=', 'gaji_temp.id_approval')
                    ->where('gaji_temp.id', $value['id'])->get();
                $gajis = $gajis->map(function ($item) {
                    $item->kenaikan = $this->getKenaikan($item->masa_kerja);
                    $item->gaji_pokok = $item->kenaikan[$item->masa_kerja - 1]['gaji'];
                    $item->golongan = $item->kenaikan[$item->masa_kerja - 1]['abjad'];
                    $item->tunjangan_tetap = 0.05 * $item->gaji_pokok;
                    $item->penghasilan_tetap = $item->gaji_pokok + $item->tunjangan_tetap;

                    $item->tunjangan_transportasi = $this->hitungJabatan($item->jabatan, $item->gaji_pokok) + $this->hitungKehadiran($item->kehadiran);
                    $item->tunjangan_jabatan = $this->hitungJabatan($item->jabatan, $item->gaji_pokok);
                    $item->tunjangan_karya = $item->dana_ikk * ($item->kehadiran / $item->hari_kerja) * $item->nilai_ikk;
                    $item->bpjs_kesehatan = 0.04 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $item->bpjs_ketenagakerjaan = 0.0727 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    //detail
                    $bpjstk = new \stdClass();
                    $bpjstk->jht = 0.037 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $bpjstk->jkk = 0.0127 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $bpjstk->jkm = 0.003 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $bpjstk->jp = 0.02 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $item->detail_bpjs_tk = $bpjstk;

                    $item->ppip = $item->gaji_pokok / 12;
                    $item->jumlah_premi = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
                    $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
                    $item->penghasilan_tunjangan_tidak_tetap = $item->tunjangan_transportasi + $item->tunjangan_jabatan + $item->tunjangan_karya + $item->benefit;
                    $item->penghasilan_bruto = $item->gaji_pokok + $item->tunjangan_tetap + $item->penghasilan_tunjangan_tidak_tetap;

                    $item->premi_bpjs_kesehatan = 0.01 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $item->premi_bpjs_ketenagakerjaan = 0.03 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    //detail
                    $premi_bpjstk = new \stdClass();
                    $premi_bpjstk->jht = 0.02 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $premi_bpjstk->jp = 0.01 * ($item->gaji_pokok + $item->tunjangan_tetap);
                    $item->detail_premi_bpjs_tk = $premi_bpjstk;


                    $item->premi_ppip = $item->ppip_mandiri;
                    $item->potongan_premi = $item->premi_bpjs_kesehatan + $item->premi_bpjs_ketenagakerjaan + $item->premi_ppip;
                    $item->potongan_benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan + $item->ppip;
                    $item->potongan_jam_hilang = ($item->jam_hilang / 173) * $item->gaji_pokok;
                    $item->potongan_kopinka = $item->kopinka;
                    $item->potongan_keuangan = $item->keuangan;
                    $item->potongan = $item->potongan_premi + $item->potongan_benefit + $item->potongan_jam_hilang + $item->potongan_kopinka + $item->potongan_keuangan;
                    $item->penghasilan_netto = ($item->penghasilan_bruto) - $item->potongan;
                    $item->tunjangan_profesional = 0;

                    //cari lembur berdasarkan bulan kemarin dan tahun yang sama dengan $gaji->bulan dan $gaji->tahun
                    //cari bulan kemarin

                    $bulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];

                    $tahun = $item->year;
                    //cari di index mana bulan sekarang pada $item->bulan
                    $bulan_gaji = array_search($item->bulan, $bulan);
                    //jika sudah ketemu indexnya maka kurangi 1 untuk mendapatkan bulan kemarin
                    $index_bulan_kemarin = $bulan_gaji - 1;
                    //jika index bulan kemarin -1 maka bulan kemarin adalah desember
                    if ($index_bulan_kemarin == -1) {
                        $index_bulan_kemarin = 11;
                        $tahun_kemarin = $tahun - 1;
                    } else {
                        $tahun_kemarin = $tahun;
                    }
                    //cari bulan kemarin
                    $bulan_kemarin = $bulan[$index_bulan_kemarin];

                    $lembur_weekend = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                        ->where('id_karyawan', $item->id_karyawan)
                        ->where('bulan', $bulan_kemarin)
                        ->where('year', $tahun_kemarin)
                        ->sum('lembur_weekend');
                    $lembur_weekday = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                        ->where('id_karyawan', $item->id_karyawan)
                        ->where('bulan', $bulan_kemarin)
                        ->where('year', $tahun_kemarin)
                        ->sum('lembur_weekday');

                    //ganti disini
                    $lembur_weekend = $lembur_weekend * 30000;
                    $lembur_weekday = $lembur_weekday * 20000;

                    $item->lembur_kemarin = $lembur_weekend + $lembur_weekday;

                    return $item;
                });
                foreach ($gajis as $key => $gaji) {
                    $obj = new stdClass();
                    $obj->id_aproval = $gaji->id;
                    $obj->tunjangan_profesional = $gaji->tunjangan_profesional ?? 0;
                    $obj->type = $gaji->tipe_karyawan;
                    $obj->nama = $gaji->nama_karyawan ?? '';
                    $obj->nip = $gaji->nip ?? '';
                    $obj->status = $gaji->status;
                    $obj->golongan = $gaji->golongan ?? '';
                    $obj->jabatan = $gaji->tipe_jabatan ?? '';
                    $obj->bulan = $gaji->bulan;
                    $obj->tahun = $gaji->year;
                    $obj->gaji_pokok = $gaji->gaji_pokok ?? 0;
                    $obj->tunjangan_tetap = $gaji->tunjangan_tetap ?? 0;
                    $obj->penghasilan_tetap = $gaji->penghasilan_tetap ?? 0;
                    $obj->tunjangan_transportasi = $gaji->tunjangan_transportasi ?? 0;
                    $obj->tunjangan_jabatan = $gaji->tunjangan_jabatan ?? 0;
                    $obj->tunjangan_karya = $gaji->tunjangan_karya ?? 0;
                    $obj->bpjs_kesehatan = $gaji->bpjs_kesehatan ?? 0;
                    $obj->bpjs_ketenagakerjaan = $gaji->bpjs_ketenagakerjaan ?? 0;
                    $obj->detail_bpjs_tk = $gaji->detail_bpjs_tk;
                    $obj->ppip = $gaji->ppip ?? 0;
                    $obj->jumlah_premi = $gaji->jumlah_premi ?? 0;
                    $obj->benefit = $gaji->benefit ?? 0;
                    $obj->penghasilan_tunjangan_tidak_tetap = $gaji->penghasilan_tunjangan_tidak_tetap ?? 0;
                    $obj->penghasilan_bruto = $gaji->penghasilan_bruto ?? 0;
                    $obj->premi_bpjs_kesehatan = $gaji->premi_bpjs_kesehatan ?? 0;
                    $obj->premi_bpjs_ketenagakerjaan = $gaji->premi_bpjs_ketenagakerjaan ?? 0;
                    $obj->detail_premi_bpjs_tk = $gaji->detail_premi_bpjs_tk;
                    $obj->premi_ppip = $gaji->premi_ppip ?? 0;
                    $obj->potongan_premi = $gaji->potongan_premi ?? 0;
                    $obj->potongan_benefit = $gaji->potongan_benefit ?? 0;
                    $obj->potongan_jam_hilang = $gaji->potongan_jam_hilang ?? 0;
                    $obj->potongan_kopinka = $gaji->potongan_kopinka ?? 0;
                    $obj->potongan_keuangan = $gaji->potongan_keuangan ?? 0;
                    $obj->potongan = $gaji->potongan ?? 0;
                    $obj->penghasilan_netto = $gaji->penghasilan_netto ?? 0;
                    $obj->nilai_ikk = $gaji->nilai_ikk ?? 0;

                    $obj->lembur_kemarin = $gaji->lembur_kemarin ?? 0;

                    $result[] = $obj;
                }
            } else {
                $gajis = GajiPkwt::leftJoin('karyawans', 'karyawans.id', '=', 'gaji_pkwt.id_karyawan')
                    ->leftJoin('jabatans', 'jabatans.id', '=', 'karyawans.id_jabatan')
                    ->where('gaji_pkwt.id', $value['id'])->get();
                $gajis = $gajis->map(function ($item) {
                    $item->gaji_pokok = $this->levelPendidikan($item->pendidikan);
                    $item->penghasilan_tetap = $item->gaji_pokok;
                    $item->golongan = '-';
                    $item->tunjangan_transportasi = $this->hitungKehadiran($item->kehadiran);
                    $item->tunjangan_profesional = $item->tunjangan_profesional;
                    $item->tunjangan_karya =  $item->dana_ikk * ($item->kehadiran / $item->hari_kerja) * $item->nilai_ikk;
                    $item->bpjs_kesehatan = 0.04 * ($item->gaji_pokok);
                    $item->bpjs_ketenagakerjaan = 0.0727 * ($item->gaji_pokok);
                    //detail
                    $bpjstk = new \stdClass();
                    $bpjstk->jht = 0.037 * ($item->gaji_pokok);
                    $bpjstk->jkk = 0.0127 * ($item->gaji_pokok);
                    $bpjstk->jkm = 0.003 * ($item->gaji_pokok);
                    $bpjstk->jp = 0.02 * ($item->gaji_pokok);
                    $item->detail_bpjs_tk = $bpjstk;

                    $item->jumlah_premi = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
                    $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
                    $item->penghasilan_tidak_tetap = $item->tunjangan_transportasi + $item->tunjangan_profesional + $item->tunjangan_karya + $item->benefit;

                    $item->penghasilan_bruto = $item->penghasilan_tetap + $item->penghasilan_tidak_tetap;

                    $item->bpjs_kesehatan_premi = 0.01 * ($item->gaji_pokok);
                    $item->bpjs_ketenagakerjaan_premi = 0.03 * ($item->gaji_pokok);
                    //detail
                    $premi_bpjstk = new \stdClass();
                    $premi_bpjstk->jht = 0.02 * ($item->gaji_pokok);
                    $premi_bpjstk->jp = 0.01 * ($item->gaji_pokok);
                    $item->detail_premi_bpjs_tk = $premi_bpjstk;

                    $item->premi = $item->bpjs_kesehatan_premi + $item->bpjs_ketenagakerjaan_premi;
                    $item->potongan_premi = $item->bpjs_kesehatan_premi + $item->bpjs_ketenagakerjaan_premi;

                    $item->benefit = $item->bpjs_kesehatan + $item->bpjs_ketenagakerjaan;
                    $item->potongan_jam_hilang = ($item->jam_hilang / 173) * $item->gaji_pokok;
                    $item->potongan = $item->premi + $item->benefit + $item->potongan_jam_hilang;

                    $item->penghasilan_netto = ($item->penghasilan_bruto) - $item->potongan;

                    //cari lembur berdasarkan bulan kemarin dan tahun yang sama dengan $gaji->bulan dan $gaji->tahun
                    //cari bulan kemarin

                    $bulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];

                    $tahun = $item->year;
                    //cari di index mana bulan sekarang pada $item->bulan
                    $bulan_gaji = array_search($item->bulan, $bulan);
                    //jika sudah ketemu indexnya maka kurangi 1 untuk mendapatkan bulan kemarin
                    $index_bulan_kemarin = $bulan_gaji - 1;
                    //jika index bulan kemarin -1 maka bulan kemarin adalah desember
                    if ($index_bulan_kemarin == -1) {
                        $index_bulan_kemarin = 11;
                        $tahun_kemarin = $tahun - 1;
                    } else {
                        $tahun_kemarin = $tahun;
                    }
                    //cari bulan kemarin
                    $bulan_kemarin = $bulan[$index_bulan_kemarin];

                    $lembur_weekend = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                        ->where('id_karyawan', $item->id_karyawan)
                        ->where('bulan', $bulan_kemarin)
                        ->where('year', $tahun_kemarin)
                        ->sum('lembur_weekend');
                    $lembur_weekday = GajiLembur::leftJoin('approval_lembur', 'gaji_lembur.id_approval', '=', 'approval_lembur.id')
                        ->where('id_karyawan', $item->id_karyawan)
                        ->where('bulan', $bulan_kemarin)
                        ->where('year', $tahun_kemarin)
                        ->sum('lembur_weekday');

                    //ganti disini
                    $lembur_weekend = $lembur_weekend * 30000;
                    $lembur_weekday = $lembur_weekday * 20000;

                    $item->lembur_kemarin = $lembur_weekend + $lembur_weekday;

                    return $item;
                });
                foreach ($gajis as $key => $gaji) {
                    $obj = new stdClass();
                    $obj->id_aproval = $gaji->id;
                    $obj->type = $gaji->tipe_karyawan;
                    $obj->nama = $gaji->nama_karyawan ?? '';
                    $obj->nip = $gaji->nip ?? '';
                    $obj->status = $gaji->status;
                    $obj->jabatan = $gaji->jabatan ?? '';
                    $obj->bulan = $gaji->bulan;
                    $obj->tahun = $gaji->year;
                    $obj->gaji_pokok = $gaji->gaji_pokok ?? 0;
                    $obj->penghasilan_tetap = $gaji->penghasilan_tetap ?? 0;
                    $obj->tunjangan_transportasi = $gaji->tunjangan_transportasi ?? 0;
                    $obj->tunjangan_profesional = $gaji->tunjangan_profesional ?? 0;
                    $obj->tunjangan_karya = $gaji->tunjangan_karya ?? 0;
                    $obj->bpjs_kesehatan = $gaji->bpjs_kesehatan ?? 0;
                    $obj->bpjs_ketenagakerjaan = $gaji->bpjs_ketenagakerjaan ?? 0;
                    $obj->detail_bpjs_tk = $gaji->detail_bpjs_tk;
                    $obj->benefit = $gaji->benefit ?? 0;
                    $obj->penghasilan_tunjangan_tidak_tetap = $gaji->penghasilan_tidak_tetap ?? 0;
                    $obj->penghasilan_bruto = $gaji->penghasilan_bruto ?? 0;
                    $obj->premi_bpjs_kesehatan = $gaji->bpjs_kesehatan_premi ?? 0;
                    $obj->premi_bpjs_ketenagakerjaan = $gaji->bpjs_ketenagakerjaan_premi ?? 0;
                    $obj->detail_premi_bpjs_tk = $gaji->detail_premi_bpjs_tk;
                    $obj->premi = $gaji->premi ?? 0;
                    $obj->potongan_jam_hilang = $gaji->potongan_jam_hilang ?? 0;
                    $obj->potongan = $gaji->potongan ?? 0;
                    $obj->penghasilan_netto = $gaji->penghasilan_netto ?? 0;
                    $obj->golongan = $gaji->golongan ?? '-';
                    $obj->tunjangan_tetap = 0;
                    $obj->premi_ppip = 0;
                    $obj->potongan_keuangan = 0;
                    $obj->potongan_kopinka = 0;
                    $obj->nilai_ikk = $gaji->nilai_ikk ?? 0;
                    $obj->jumlah_premi = $gaji->jumlah_premi ?? 0;
                    $obj->ppip = $gaji->ppip ?? 0;
                    $obj->potongan_premi = $gaji->potongan_premi ?? 0;

                    $obj->lembur_kemarin = $gaji->lembur_kemarin ?? 0;

                    $result[] = $obj;
                }
            }
        }

        //for testing
        $res0 = $result[0];

        $gaji = $res0;

        return view('view_slip', compact('gaji'));
        //endfor testing

        $pdfs = [];

        foreach ($result as $master) {
            $gaji = $master;
            // if ($master->type == 'tetap' || $master->type == 'inka') {
            $pdf = PDF::loadView('view_slip', compact('gaji'));
            // }
            $content = $pdf->download()->getOriginalContent();
            $random_name = rand(0, 9999999999);
            $random_name = $master->type . '_' . $master->bulan . '-' . $master->tahun . '-' . $master->nama . '-' . $random_name;
            Storage::put('public/pdf/' . $random_name . '.pdf', $content);

            //push to array pdfs random_name
            array_push($pdfs, $random_name);
        }
        //length $data
        if (count($data) < 2) {
            $link = url('storage/pdf/' . $pdfs[0] . '.pdf');
            return response()->json([
                'success' => true,
                'link' => $link,
            ]);
        } else {
            try {
                //code...
                //create zip
                $zip = new \ZipArchive();
                $random_name = rand(0, 9999999999);
                $zip_name = 'gaji-' . $random_name . '.zip';
                //save to storages/app/public/zip
                if ($zip->open(storage_path('app/public/zip/' . $zip_name), \ZipArchive::CREATE) === TRUE) {
                    foreach ($pdfs as $key => $value) {
                        $relativeNameInZipFile = basename($value);
                        $relativeNameInZipFile = $value . '.pdf';
                        $zip->addFile(storage_path('app/public/pdf/' . $value . '.pdf'), $relativeNameInZipFile);
                    }
                    $zip->close();
                    //unlink the pdf
                    foreach ($pdfs as $key => $value) {
                        Storage::delete('public/pdf/' . $value . '.pdf');
                    }
                } else {
                    //create folder zip
                    Storage::makeDirectory('public/zip');
                    $zip->open(storage_path('app/public/zip/' . $zip_name), \ZipArchive::CREATE);
                    foreach ($pdfs as $key => $value) {
                        $relativeNameInZipFile = basename($value);
                        $relativeNameInZipFile = $value . '.pdf';
                        $zip->addFile(storage_path('app/public/pdf/' . $value . '.pdf'), $relativeNameInZipFile);
                    }
                    $zip->close();
                    //unlink the pdf
                    foreach ($pdfs as $key => $value) {
                        Storage::delete('public/pdf/' . $value . '.pdf');
                    }
                }
                //create a download link
                $link = url('storage/zip/' . $zip_name);
                return response()->json([
                    'success' => true,
                    'link' => $link,
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                dd($th);
            }
        }
    }

    public function test_rar2()
    {
        $masters = [
            [
                'id' => '1',
                'bulan' => 'Januari',
                'tahun' => '2021',
                'gaji' => [
                    [
                        'nama' => 'Suell',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Adi',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Rusdi',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Elox',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Ncip',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Uwes',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Cahyo',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ], [
                        'nama' => 'Putroo',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ]
                ]
            ],
            [
                'id' => '2',
                'bulan' => 'Februari',
                'tahun' => '2021',
                'gaji' => [
                    [
                        'nama' => 'Putroo Utomo',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ]
                ]
            ],
            [
                'id' => '3',
                'bulan' => 'Maret',
                'tahun' => '2021',
                'gaji' => [
                    [
                        'nama' => 'Hadi Koruptor',
                        'nip' => '123123',
                        'jabatan' => 'Manager',
                        'golongan' => '1',
                        'gaji_pokok' => '10000000',
                        'tunjangan_tetap' => '1000000',
                    ]
                ]
            ],
        ];

        $pdfs = [];

        foreach ($masters as $master) {
            $data = [
                'id' => $master['id'],
                'bulan' => $master['bulan'],
                'tahun' => $master['tahun'],
                'gaji' => $master['gaji'],
            ];

            $pdf = PDF::loadView('test_rar', compact('data'));
            $content = $pdf->download()->getOriginalContent();
            $random_name = rand(0, 9999999999);
            $random_name = $master['bulan'] . '-' . $master['tahun'] . '-' . $random_name;
            Storage::put('public/pdf/' . $random_name . '.pdf', $content);

            //push to array pdfs random_name
            array_push($pdfs, $random_name);
        }

        try {
            //code...
            //create zip 
            $zip = new \ZipArchive();
            $random_name = rand(0, 9999999999);
            $zip_name = 'gaji-' . $random_name . '.zip';
            //save to storages/app/public/zip
            if ($zip->open(storage_path('app/public/zip/' . $zip_name), \ZipArchive::CREATE) === TRUE) {
                foreach ($pdfs as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $relativeNameInZipFile = $value . '.pdf';
                    $zip->addFile(storage_path('app/public/pdf/' . $value . '.pdf'), $relativeNameInZipFile);
                }
                $zip->close();
                //unlink the pdf
                foreach ($pdfs as $key => $value) {
                    Storage::delete('public/pdf/' . $value . '.pdf');
                }
            } else {
                dd('gagal');
            }
            dd(storage_path('app/public/zip/' . $zip_name));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
