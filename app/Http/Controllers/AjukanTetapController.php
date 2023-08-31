<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjukanTetapController extends Controller
{
    public function index()
    {
        return view('ajukan_tetap');
    }
}
