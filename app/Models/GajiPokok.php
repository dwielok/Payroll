<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiPokok extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_gajiPokok',
        'id_golongan',
        'id_karyawan'
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
