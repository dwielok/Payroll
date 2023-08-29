<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanTetapController extends Controller
{
    public function index()
    {
        return view('karyawan_tetap');
    }
}
