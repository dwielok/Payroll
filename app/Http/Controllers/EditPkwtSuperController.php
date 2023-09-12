<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditPkwtSuperController extends Controller
{
    public function index()
    {
        return view('superuser.edit_pkwt');
    }
}
