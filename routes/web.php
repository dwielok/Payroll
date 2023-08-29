<?php

use App\Http\Controllers\KaryawanPerbantuanInkaController;
use App\Http\Controllers\KaryawanTetapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanPKWTController;
use App\Http\Controllers\listTetap;


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


Route::get('listtetap', [listTetapController::class,'index'])->name('listTetap');

//Routing Halaman Karyawan Tetap
Route::get('KaryawanTetap',[KaryawanTetapController::class, 'index'])->name('karyawantetap');


//Routing Halaman Perbantuan Inka
Route::get('karyawanperbantuaninka',[KaryawanPerbantuanInkaController::class, 'index'])->name('karyawanperbantuaninka');

//Routing Halaman PKWT
Route::get('karyawanPKWT',[KaryawanPKWTController::class, 'index'])->name('karyawanPKWT');

