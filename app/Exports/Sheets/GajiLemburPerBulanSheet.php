<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class GajiLemburPerBulanSheet implements FromView, WithTitle, WithStyles, ShouldAutoSize
{
    //retrieve params
    public $approval;
    public $gajis;
    public $last_index;

    public function __construct($gajis, $approval, $last_index)
    {
        $this->approval = $approval;
        $this->gajis = $gajis;
        $this->last_index = $last_index;
    }


    public function styles($sheet)
    {

        $sheet->getStyle('A1:I' . $this->last_index)->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A1:I1')->getFill()->setFillType('solid')->getStartColor()->setARGB('FFA0A0A0');

        return [
            1 => ['font' => ['bold' => true]]
        ];
    }

    public function view(): View
    {

        return view('gaji_lembur', [
            'bulan' => $this->approval,
            'gajis' => $this->gajis
        ]);
    }

    public function title(): string
    {
        return $this->approval->bulan . ' ' . $this->approval->year . ' (' . $this->approval->tipe_karyawan . ')';
    }
}
