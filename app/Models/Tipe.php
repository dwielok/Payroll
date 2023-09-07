<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tipe',
        'nama_tipe',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

}
