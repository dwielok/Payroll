<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GajiLemburTetapController extends Controller
{
    public function index()
    {
        return view('gaji_lembur_tetap');
    }
}
