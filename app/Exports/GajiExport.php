<?php

namespace App\Exports;

use App\Exports\Sheets\GajiPerBulanSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;

class GajiExport implements WithMultipleSheets
{
    use Exportable;

    protected $approvals;
    public function __construct($approvals)
    {
        $this->approvals = $approvals;
    }

    public function sheets(): array
    {
        $sheets = [];

        for ($i = 0; $i < count($this->approvals); $i++) {
            $last_index = count($this->approvals[$i]->gajis) + 1;
            $sheets[] = new GajiPerBulanSheet($this->approvals[$i]->gajis, $this->approvals[$i], $last_index);
        }

        return $sheets;
    }
}
