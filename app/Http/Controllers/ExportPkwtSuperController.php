<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportPkwtSuperController extends Controller
{
    public function index()
    {
        return view('superuser.export_tetap');
    }
}
