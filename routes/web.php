<?php

use App\Http\Controllers\AjukanInkaController;
use App\Http\Controllers\AjukanPkwtController;
use App\Http\Controllers\AjukanTetapController;
use App\Http\Controllers\ApprovalSuperController;
use App\Http\Controllers\cobaController;
use App\Http\Controllers\KaryawanPerbantuanInkaController;
use App\Http\Controllers\KaryawanTetapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardSuperController;
use App\Http\Controllers\EditInkaSuperController;
use App\Http\Controllers\EditPkwtSuperController;
use App\Http\Controllers\EditTetapSuperController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportInkaController;
use App\Http\Controllers\ExportInkaSuperController;
use App\Http\Controllers\ExportPkwtController;
use App\Http\Controllers\ExportPkwtSuperController;
use App\Http\Controllers\ExportTetapController;
use App\Http\Controllers\ExportTetapSuperController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ImportFileController;
use App\Http\Controllers\ImportInkaController;
use App\Http\Controllers\ImportInkaSuperController;
use App\Http\Controllers\ImportPkwtController;
use App\Http\Controllers\ImportPkwtSuperController;
use App\Http\Controllers\ImportTetapController;
use App\Http\Controllers\ImportTetapSuperController;
use App\Http\Controllers\KaryawanInkaSuperController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\listTetap;
use App\Http\Controllers\KaryawanPKWTController;
use App\Http\Controllers\KaryawanPkwtSuperController;
use App\Http\Controllers\KaryawanTetapSuperController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\RekapSuperController;
use App\Http\Controllers\SlipController;
use App\Http\Controllers\SlipSuperController;
use App\Http\Controllers\SuccessLogoutController;
use App\Http\Controllers\TemplateSuperController;
use App\Http\Controllers\viewInkaController;
use App\Http\Controllers\ViewInkaSuperController;
use App\Http\Controllers\viewPkwtController;
use App\Http\Controllers\ViewPkwtSuperController;
use App\Http\Controllers\viewTetapController;
use App\Http\Controllers\viewTetapSuperController;

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
Route::get('/test_rar', [App\Http\Controllers\PdfController::class, 'test_rar']);
Route::post('/generate_zip', [App\Http\Controllers\PdfController::class, 'generate_zip']);
Route::post('/generate_slip', [App\Http\Controllers\PdfController::class, 'generate_slip']);

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

    //Routing Halaman test pdf
    // Route::get('test_pdf', [PdfController::class, 'test_pdf'])->name('test_pdf');

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

    Route::group(['middleware' => ['superuser']], function () {
        Route::get('dashboardSuperuser', [DashboardSuperController::class, 'index'])->name('superuser.dashboard');
        //taroh rute superadmin ng kene

        //Routing Halaman Karyawan Tetap
        Route::get('KaryawanTetapSuper', [KaryawanTetapSuperController::class, 'index'])->name('superuser.karyawan_tetap');

        //Routing Halaman Karyawan Inka
        Route::get('KaryawanInkaSuper', [KaryawanInkaSuperController::class, 'index'])->name('superuser.karyawan_inka');

        //Routing Halaman Karyawan PKWT
        Route::get('KaryawanPkwtSuper', [KaryawanPkwtSuperController::class, 'index'])->name('superuser.karyawan_pkwt');

        //Routing Halaman Export Tetap
        Route::get('ExportTetapSuper', [ExportTetapSuperController::class, 'index'])->name('superuser.export_tetap');

        //Routing Halaman Export Inka
        Route::get('ExportInkaSuper', [ExportInkaSuperController::class, 'index'])->name('superuser.export_inka');

        //Rotuing Halaman Export Pkwt
        Route::get('ExportPkwtSuper', [ExportPkwtSuperController::class, 'index'])->name('superuser.export_pkwt');

        //Routing Halaman Import Tetap
        Route::get('ImportTetapSuper', [ImportTetapSuperController::class, 'index'])->name('superuser.import_tetap');

        //Routing Halaman Import Inka
        Route::get('ImportInkaSuper', [ImportInkaSuperController::class, 'index'])->name('superuser.import_inka');

        //Routing Halaman Import Pkwt
        Route::get('ImportPkwtSuper', [ImportPkwtSuperController::class, 'index'])->name('superuser.import_pkwt');

        //Routing Halaman Rekap Superuser
        Route::get('RekapSuper', [RekapSuperController::class, 'index'])->name('superuser.rekap');

        //Routing Halaman Slip Superuser
        Route::get('SlipSuper', [SlipSuperController::class, 'index'])->name('superuser.slip');

        //Routing Halaman Template Superuser
        Route::get('TemplateSuper', [TemplateSuperController::class, 'index'])->name('superuser.template');

        //Routing Halaman Edit Tetap Superuser
        Route::get('EditTetapSuper', [EditTetapSuperController::class, 'index'])->name('superuser.edit_tetap');

        //Routing Halaman Edit Inka Superuser
        Route::get('EditInkaSuper', [EditInkaSuperController::class, 'index'])->name('superuser.edit_inka');

        //Routing Halaman Edit Pkwt Superuser
        Route::get('EditPkwtSuper', [EditPkwtSuperController::class, 'index'])->name('superuser.edit_pkwt');

        //Routing Halaman Approval Superusser
        Route::get('ApprovalSuper', [ApprovalSuperController::class, 'index'])->name('superuser.approval');

        //Routing Halaman View Tetap Superuser
        Route::get('ViewTetapSuper', [viewTetapSuperController::class, 'index'])->name('superuser.view_tetap');

        //Routing Halaman View Inka Superuser
        Route::get('ViewInkaSuper', [ViewInkaSuperController::class, 'index'])->name('superuser.view_inka');

        //Routing Halaman View Pkwt Superuser
        Route::get('ViewPkwtSuper', [ViewPkwtSuperController::class, 'index'])->name('superuser.view_pkwt');

        //Routing decline approval superuser
        Route::patch('ApprovalSuper/decline', [ApprovalSuperController::class, 'decline'])->name('superuser.approval.decline');
        Route::patch('ApprovalSuper/approve', [ApprovalSuperController::class, 'approve'])->name('superuser.approval.approve');
    });
    // //Routing Success Logout
    // Route::get('seccesslogout', [SuccessLogoutController::class, 'index'])->name('successlogout');

    //coba
    Route::get('coba', [cobaController::class, 'index'])->name('coba');

    // Route::get('/siswa/export_excel', 'SiswaController@export_excel');
    // Route::post('importTetap/import_excell', [ImportTetapController::class, 'import_excel'])->name('importTetap');
});

Route::post('test_import', [ImportTetapController::class, 'import'])->name('importTetap');
Route::post('test_import_inka', [ImportInkaController::class, 'import'])->name('importInka');
Route::post('test_import_pkwt', [ImportPkwtController::class, 'import'])->name('importPkwt');
Route::get('test_upload', [ImportTetapController::class, 'test_upload'])->name('testUpload');
