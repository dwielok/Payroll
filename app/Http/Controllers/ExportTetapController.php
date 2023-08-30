<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportTetapController extends Controller
{
    public function index()
    {
        return view('export_tetap');
    }
}
