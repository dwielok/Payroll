<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

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
