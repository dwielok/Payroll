<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeKaryawan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tipekaryawan',
        'nama_tipe',
    ];

    public function karyawan()
    {
        return $this->hasMany(karyawan::class, 'id_tipeKaryawan', 'id');
    }
}
