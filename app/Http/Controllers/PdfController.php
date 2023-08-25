<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;

class PdfController extends Controller
{
    public function test_pdf()
    {
        $data =  [
            'nama' => 'Suell',
            'asal' => 'Bumi',
        ];

        $pdf = PDF::loadView('test_pdf', compact('data'));
        return $pdf->stream('Contoh random.pdf');
    }
}
