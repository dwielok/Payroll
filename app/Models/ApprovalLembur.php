<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalLembur extends Model
{
    use HasFactory;

    protected $table = 'approval_lembur';

    protected $fillable = [
        'bulan',
        'year',
        'tipe_karyawan',
        'status',
        'keterangan',
    ];
}
