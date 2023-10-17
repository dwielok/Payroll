<?php

namespace App\Exports;

use App\Exports\Sheets\GajiLemburPerBulanSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GajiLemburExport implements WithMultipleSheets
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
            $sheets[] = new GajiLemburPerBulanSheet($this->approvals[$i]->gajis, $this->approvals[$i], $last_index);
        }

        return $sheets;
    }
}
