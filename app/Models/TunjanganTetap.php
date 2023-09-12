<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Reader\Csv;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


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
