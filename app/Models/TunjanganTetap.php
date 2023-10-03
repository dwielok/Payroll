<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganTetap extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tunjanganTetap',
        'id_gajiPokok'
    ];

    public function gajiPokok()
    {
        return $this->belongsTo(GajiPokok::class);
    }
}
