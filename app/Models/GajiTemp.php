<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiTemp extends Model
{
    use HasFactory;

    protected $table = 'gaji_temp';

    protected $fillable = [
        'id_karyawan',
        'id_approval',
        'kehadiran',
        'hari_kerja',
        'nilai_ikk',
        'dana_ikk',
        'jam_lembur_weekdays',
        'jam_lembur_weekend',
        'penyesuaian_penambahan',
        'penyesuaian_pengurangan',
        'ppip_mandiri',
        'jam_hilang',
        'kopinka',
        'keuangan',
        'golongan',
        'kredit_poin'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function approval()
    {
        return $this->belongsTo(Approval::class);
    }
}
