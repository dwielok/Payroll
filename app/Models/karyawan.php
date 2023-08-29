<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_karyawan',
        'id_tipeKaryawan',
        'NIP',
        'nama',
        'masa_kerja',
        'pendidikan',
        'no_rek',
        'nama_bank',
        'no_kitap',
        'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan',
    ];

    public function tipe_karyawan()
    {
        return $this->hasMany(TipeKaryawan::class, 'id_tipeKaryawan', 'id');
    }
}
