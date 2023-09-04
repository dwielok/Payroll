<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjukanInkaController extends Controller
{
    public function index()
    {
        return view('ajukan_inka');
    }
}
