<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganTransportasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tunjangan',
        'id_jabatan',
        'id_absensi',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}
