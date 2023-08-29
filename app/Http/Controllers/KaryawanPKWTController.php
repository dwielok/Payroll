<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanPKWTController extends Controller {
    public function index()
    {
        return view('karyawan_pkwt');
    }
}