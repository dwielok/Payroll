<?php

use App\Http\Controllers\AjukanInkaController;
use App\Http\Controllers\AjukanPkwtController;
use App\Http\Controllers\AjukanTetapController;
use App\Http\Controllers\KaryawanPerbantuanInkaController;
use App\Http\Controllers\KaryawanTetapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportInkaController;
use App\Http\Controllers\ExportPkwtController;
use App\Http\Controllers\ExportTetapController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ImportFileController;
use App\Http\Controllers\ImportInkaController;
use App\Http\Controllers\ImportPkwtController;
use App\Http\Controllers\ImportTetapController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\listTetap;
use App\Http\Controllers\KaryawanPKWTController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SlipController;
use App\Http\Controllers\SuccessLogoutController;
use App\Http\Controllers\viewInkaController;
use App\Http\Controllers\viewPkwtController;
use App\Http\Controllers\viewTetapController;

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
Route::get('successlogout', [SuccessLogoutController::class, 'index'])->name('successlogout');
//route group middleware auth
Route::group(['middleware' => 'auth'], function () {

    // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');



    Route::get('template', [TemplateController::class, 'index'])->name('template');
    Route::get('listtetap', [listTetapController::class, 'index'])->name('listTetap');


    Route::get('listtetap', [listTetapController::class, 'index'])->name('listTetap');

    //Routing Halaman Karyawan Tetap
    Route::get('KaryawanTetap', [KaryawanTetapController::class, 'index'])->name('karyawantetap');


    //Routing Halaman Perbantuan Inka
    Route::get('karyawanperbantuaninka', [KaryawanPerbantuanInkaController::class, 'index'])->name('karyawanperbantuaninka');

    //Routing Halaman PKWT
    Route::get('karyawanPKWT', [KaryawanPKWTController::class, 'index'])->name('karyawanPKWT');

    //Routing Halaman Rekap Gaji
    Route::get('rekap', [RekapController::class, 'index'])->name('rekap');

    //Routing Halaman Slip
    Route::get('slip', [SlipController::class, 'index'])->name('slip');

    //Route untuk Download Template
    Route::get('template', [TemplateController::class, 'index'])->name('template');

    Route::get('karyawanPKWT', [KaryawanPKWTController::class, 'index'])->name('karyawanPKWT');


    //Route Logout
    Route::get('logout', [LogoutController::class, 'index'])->name('logout');

    Route::get('logout', [LoginController::class, 'index'])->name('logout');

    //Routing Halaman Slip Gaji
    Route::get('SlipGaji', [SlipController::class, 'index'])->name('slip');

    //Routing Import Tetap
    Route::get('ImportTetap', [ImportTetapController::class, 'index'])->name('import_tetap');

    //Routing Export Tetap
    Route::get('ExportTetap', [ExportTetapController::class, 'index'])->name('export_tetap');

    //Routing Import Inka
    Route::get('ImportInka', [ImportInkaController::class, 'index'])->name('import_inka');

    //Routing Export Inka
    Route::get('ExportInka', [ExportInkaController::class, 'index'])->name('export_inka');

    //Routing Import Pkwt
    Route::get('ImportPkwt', [ImportPkwtController::class, 'index'])->name('import_pkwt');

    //Routing Export Pkwt
    Route::get('ExportPkwt', [ExportPkwtController::class, 'index'])->name('export_pkwt');

    //Routing Export
    Route::get('Export', [ExportTetapController::class, 'index'])->name('export_tetap');

    //Routing View Tetap
    Route::get('viewTetap', [viewTetapController::class, 'index'])->name('viewTetap');

    //Routing View INKA
    Route::get('viewInka', [viewInkaController::class, 'index'])->name('viewInka');

    //Routing View PKWT
    Route::get('viewPkwt', [viewPkwtController::class, 'index'])->name('viewPkwt');

    //Routing Import FIle
    Route::get('import_file', [ImportFileController::class, 'index'])->name('import_file');

    //Routing Ajukan Tetap
    Route::get('AjukanTetap', [AjukanTetapController::class, 'index'])->name('ajukan_tetap');

    //Routing Ajukan Inka
    Route::get('AjukanInka', [AjukanInkaController::class, 'index'])->name('ajukan_inka');

    //Routing Ajukan Pkwt
    Route::get('AjukanPkwt', [AjukanPkwtController::class, 'index'])->name('ajukan_pkwt');

    // //Routing Success Logout
    // Route::get('seccesslogout', [SuccessLogoutController::class, 'index'])->name('successlogout');

});
