<?php

namespace App\Exports\Sheets;

use App\Models\Approval;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class GajiPerBulanSheet implements FromView, WithTitle, WithStyles, ShouldAutoSize
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
        if ($this->approval->tipe_karyawan != 'pkwt') {
            $sheet->getStyle('A1:AI' . $this->last_index)->getBorders()->getAllBorders()->setBorderStyle('thin');
            $sheet->getStyle('A1:AI1')->getFill()->setFillType('solid')->getStartColor()->setARGB('FFA0A0A0');
        } else {
            $sheet->getStyle('A1:AC' . $this->last_index)->getBorders()->getAllBorders()->setBorderStyle('thin');
            $sheet->getStyle('A1:AC1')->getFill()->setFillType('solid')->getStartColor()->setARGB('FFA0A0A0');
        }
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }

    public function view(): View
    {
        if ($this->approval->tipe_karyawan != 'pkwt') {
            return view('gaji', [
                'bulan' => $this->approval,
                'gajis' => $this->gajis
            ]);
        } else {
            return view('gaji_pkwt', [
                'bulan' => $this->approval,
                'gajis' => $this->gajis
            ]);
        }
    }

    public function title(): string
    {
        return $this->approval->bulan . ' ' . $this->approval->year . ' (' . $this->approval->tipe_karyawan . ')';
    }
}
