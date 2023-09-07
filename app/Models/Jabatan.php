<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jabatan',
        'tipe_jabatan',
    ];

    public function tunjanganTransportasi()
    {
        return $this->hasMany(TunjanganTransportasi::class);
    }

    public function tunjanganJabatan()
    {
        return $this->hasMany(TunjanganJabatan::class);
    }
}
