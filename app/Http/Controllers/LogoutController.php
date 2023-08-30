<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

<<<<<<< HEAD
class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function render()
    {
        return view('livewire.admin.logout');
    }
}
=======
class LogoutController extends Controller{
    public function index(){
        return view('logout');
    }
}
>>>>>>> cb267501b7656306de14749bf70cd1a47fc2f896
