<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table='approvals';

    protected $fillable = [
        'bulan',
        'year',
        'tipe_karyawan',
        'status',
        'keterangan',
    ];
}
