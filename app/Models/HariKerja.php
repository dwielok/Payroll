<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HariKerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_hariKerja',
        'bulan',
        'tahun'
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function tunjanganKarya()
    {
        return $this->hasMany(TunjanganKarya::class);
    }
}
