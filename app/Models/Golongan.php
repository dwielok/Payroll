<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_golongan',
        'tingkatan'
    ];

    public function gajiPokok()
    {
        return $this->hasMany(GajiPokok::class);
    }
}
