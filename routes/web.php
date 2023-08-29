<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\TemplateController;
=======
use App\Http\Controllers\listTetap;
>>>>>>> 7ee869c4a2c4b77cc264ba90297c6309fc498f93

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/test_pdf', [App\Http\Controllers\PdfController::class, 'test_pdf']);

//ROUTING UNTUK LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
<<<<<<< HEAD
Route::get('template', [TemplateController::class, 'index'])->name('template');
=======


Route::get('listtetap', [listTetapController::class,'index'])->name('listTetap');
>>>>>>> 7ee869c4a2c4b77cc264ba90297c6309fc498f93
