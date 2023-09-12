<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Approval;

class ApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Approval::insert([
            [
                'bulan' => 'januari',
                'year' => '2020',
                'tipe_karyawan' => 'pkwt',
                'status' => 0,
                'keterangan' => '-',
            ],
            [
                'bulan' => 'januari',
                'year' => '2020',
                'tipe_karyawan' => 'pkwt',
                'status' => 1,
                'keterangan' => '-',
            ]
        ]);
    }
}
