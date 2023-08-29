<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanPerbantuanInkaController extends Controller
{
    public function index()
    {
        return view('karyawan_inka');
    }
}
