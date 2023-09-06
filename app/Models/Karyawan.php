<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_karyawan',
        'id_tipe',
        'nip',
        'nama_karyawan',
        'masa_kerja',
        'email',
        'pendidikan',
        'no_rek',
        'nama_bank',
        'no_kitap',
        'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan'
    ];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function tunjanganProfesional()
    {
        return $this->hasMany(TunjanganProfesional::class);
    }

    public function gajiPokok()
    {
        return $this->hasMany(GajiPokok::class);
    }
}
