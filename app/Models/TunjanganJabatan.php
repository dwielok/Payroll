<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganJabatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tunjanganJabatan',
        'id_jabatan',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
