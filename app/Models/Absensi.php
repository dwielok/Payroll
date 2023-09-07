<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_absensi',
        'id_Karyawan',
        'id_hariKerja',
        'kehadiran'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function hariKerja()
    {
        return $this->belongsTo(HariKerja::class);
    }

    public function tunjanganTransportasi()
    {
        return $this->hasMany(TunjanganTransportasi::class);
    }
}

