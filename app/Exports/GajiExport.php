<?php

namespace App\Exports;

use App\Models\Approval;
use App\Models\GajiTemp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class GajiExport implements FromView
{
    //retrieve params
    public $year;
    public function __construct($year)
    {
        $this->year = $year;
    }

    public function view(): View
    {
        return view('gaji', [
            'tahun' => $this->year,
            'gajis' => Approval::all()
        ]);
    }
}
