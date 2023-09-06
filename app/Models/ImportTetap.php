<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportTetap extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_importTetap',
        'nip',
        'nama_karyawan'
    ];
}
