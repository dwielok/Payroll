<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
// class LogoutController extends Controller{
//     public function index(){
//         return view('logout');
//     }
// }
