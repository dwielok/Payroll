<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganProfesional extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tunjanganProfesional',
        'id_karyawan',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
