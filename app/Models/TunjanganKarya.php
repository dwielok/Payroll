<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganKarya extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tunjanganKarya',
        'id_ikk',
        'id_hariKerja'
    ];

    public function IKK()
    {
        return $this->belongsTo(Ikk::class);
    }

    public function hariKerja()
    {
        return $this->belongsTo(HariKerja::class);
    }
}
