<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditTetapSuperController extends Controller
{
    public function index()
    {
        return view('superuser.edit_tetap');
    }
}
