<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nip',
        'nama',
        'status_karyawan',
        'masa_kerja',
        'asal_kepegawaian',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'pendidikan_tnt',
        'jurusan_pendidikan',
        'sekolah_universitas',
        'pendidikan_diakui'
    ];
}
