<?php

use App\Http\Controllers\AjukanInkaController;
use App\Http\Controllers\AjukanPkwtController;
use App\Http\Controllers\AjukanTetapController;
use App\Http\Controllers\ApprovalLemburController;
use App\Http\Controllers\ApprovalSuperController;
use App\Http\Controllers\cobaController;
use App\Http\Controllers\KaryawanPerbantuanInkaController;
use App\Http\Controllers\KaryawanTetapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardSuperController;
use App\Http\Controllers\EditInkaSuperController;
use App\Http\Controllers\EditLemburTetapInkaController;
use App\Http\Controllers\EditPkwtSuperController;
use App\Http\Controllers\EditTetapSuperController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportInkaController;
use App\Http\Controllers\ExportInkaSuperController;
use App\Http\Controllers\ExportLemburController;
use App\Http\Controllers\ExportLemburSuperController;
use App\Http\Controllers\ExportPkwtController;
use App\Http\Controllers\ExportPkwtSuperController;
use App\Http\Controllers\ExportTetapController;
use App\Http\Controllers\ExportTetapSuperController;
use App\Http\Controllers\GajiLemburInkaController;
use App\Http\Controllers\GajiLemburInkaSuperController;
use App\Http\Controllers\GajiLemburPkwtController;
use App\Http\Controllers\GajiLemburPkwtSuperController;
use App\Http\Controllers\GajiLemburTetapController;
use App\Http\Controllers\GajiLemburTetapSuperController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ImportFileController;
use App\Http\Controllers\ImportInkaController;
use App\Http\Controllers\ImportInkaSuperController;
use App\Http\Controllers\ImportLemburInkaController;
use App\Http\Controllers\ImportLemburPkwtController;
use App\Http\Controllers\ImportLemburSuperController;
use App\Http\Controllers\ImportLemburTetapController;
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
use App\Http\Controllers\MasterGajiPokokController;
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
use App\Models\GajiLembur;

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
Route::post('/export_tetap', [App\Http\Controllers\ExportTetapController::class, 'export'])->name('export.export_tetap');
Route::post('/export_inka', [App\Http\Controllers\ExportTetapController::class, 'export'])->name('export.export_inka');
Route::post('/export_pkwt', [App\Http\Controllers\ExportTetapController::class, 'export'])->name('export.export_pkwt');
Route::post('/export_lembur_action', [App\Http\Controllers\ExportLemburSuperController::class, 'export'])->name('export.export_lembur');

Route::post('/preview_gaji/{id}', [App\Http\Controllers\EditTetapSuperController::class, 'preview_gaji'])->name('preview_gaji');
Route::post('/preview_gaji_pkwt/{id}', [App\Http\Controllers\EditTetapSuperController::class, 'preview_gaji_pkwt'])->name('preview_gaji');
Route::post('/preview_gaji_lembur/{id}', [App\Http\Controllers\EditLemburTetapInkaController::class, 'preview_gaji'])->name('preview_gaji');
Route::post('/edit_gaji_tetap/{id}', [App\Http\Controllers\EditTetapSuperController::class, 'edit_gaji_tetap'])->name('edit_gaji_tetap');
Route::post('/edit_gaji_pkwt/{id}', [App\Http\Controllers\EditPkwtSuperController::class, 'edit_gaji_pkwt'])->name('edit_gaji_tetap');
Route::post('/edit_gaji_lembur/{id}', [App\Http\Controllers\EditLemburTetapInkaController::class, 'edit_gaji_lembur'])->name('edit_gaji_lembur');

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
    Route::get('ImportInka', [ImportTetapController::class, 'index'])->name('import_inka');

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

    //Routing Gaji Lembur Tetap
    Route::get('GajiLemburTetap', [GajiLemburTetapController::class, 'index'])->name('gaji_lembur_tetap');

    //Routing Gaji Lembur Inka
    Route::get('GajiLemburInka', [GajiLemburInkaController::class, 'index'])->name('gaji_lembur_inka');

    //Routing Gaji Lembur Pkwt
    Route::get('GajiLemburPkwt', [GajiLemburPkwtController::class, 'index'])->name('gaji_lembur_pkwt');

    //Routing View Lembur Tetap
    Route::get('viewLemburTetapUser', [GajiLemburTetapController::class, 'detail'])->name('view_lembur_tetap');

    //Routing View Lembur Inka
    Route::get('viewLemburInkaUser', [GajiLemburInkaController::class, 'detail'])->name('view_lembur_inka');

    //Routing View Lembur Pkwt
    Route::get('viewLemburPkwtUser', [GajiLemburPkwtController::class, 'detail'])->name('view_lembur_pkwt');
    //Routing Import Lembur Tetap
    Route::get('ImportLemburTetap', [ImportLemburTetapController::class, 'index'])->name('import_lembur_tetap');

    //Routing Import Lembur Inka
    Route::get('ImportLemburInka', [ImportLemburInkaController::class, 'index'])->name('import_lembur_inka');

    //Routing Import Gaji Lembur Pkwt
    Route::get('ImportLemburPkwt', [ImportPkwtController::class, 'index_lembur'])->name('import_lembur_pkwt');

    Route::get('ExportLemburUser', [ExportLemburController::class, 'index'])->name('superuser.export_lembur');

    //Delete Tetap & Inka
    Route::post('DeleteTetapSuper', [KaryawanTetapController::class, 'deleteTetap'])->name('deleteTetap');
    Route::post('DeleteInkaSuper', [KaryawanTetapController::class, 'deleteTetap'])->name('deleteTetap');
    Route::post('DeletePkwtSuper', [KaryawanPkwtController::class, 'deleteTetap'])->name('deleteTetap');
    Route::post('DeleteLemburSuper', [GajiLemburTetapSuperController::class, 'delete'])->name('deleteTetap');

    Route::group(['middleware' => ['superuser']], function () {
        Route::get('dashboardSuperuser', [DashboardSuperController::class, 'index'])->name('superuser.dashboard');
        //taroh rute superuser ng kene

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

        //Routing Halaman Export Lembur
        Route::get('ExportLembur', [ExportLemburSuperController::class, 'index'])->name('superuser.export_lembur');

        //Routing Halaman Import Tetap
        Route::get('ImportTetapSuper', [ImportTetapSuperController::class, 'index'])->name('superuser.import_tetap');

        //Routing Halaman Import Inka
        Route::get('ImportInkaSuper', [ImportInkaSuperController::class, 'index'])->name('superuser.import_inka');

        //Routing Halaman Import Pkwt
        Route::get('ImportPkwtSuper', [ImportPkwtSuperController::class, 'index'])->name('superuser.import_pkwt');

        //Routing Import Lembur 
        Route::get('ImportLemburTetapSuper', [ImportLemburSuperController::class, 'index'])->name('superuser.import_lembur');

        //Routing Import Lembur INKA
        Route::get('ImportLemburInkaSuper', [ImportLemburSuperController::class, 'index'])->name('superuser.import_lembur');

        //Routing Import Lembur PKWT
        Route::get('ImportLemburPkwtSuper', [ImportLemburSuperController::class, 'index'])->name('superuser.import_lembur');

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

        //Routing Halaman Edit Lembur Tetap
        Route::get('EditLemburTetapSuper', [EditLemburTetapInkaController::class, 'index'])->name('superuser.edit_lembur_tetap');

        //Routing Halaman Edit Lembur Inka
        Route::get('EditLemburInkaSuper', [EditLemburTetapInkaController::class, 'index'])->name('superuser.edit_lembur_inka');

        //Routing Halaman Edit Lembur Pkwt
        Route::get('EditLemburPkwtSuper', [EditLemburTetapInkaController::class, 'index'])->name('superuser.edit_lembur_pkwt');

        //Routing Halaman Approval Superusser
        Route::get('ApprovalSuper', [ApprovalSuperController::class, 'index'])->name('superuser.approval');

        //Routing Halaman Approval Lembur Superuser
        Route::get('ApprovalLemburSuper', [ApprovalLemburController::class, 'index'])->name('superuser.approval_lembur');

        //Routing Halaman View Tetap Superuser
        Route::get('ViewTetapSuper', [viewTetapSuperController::class, 'index'])->name('superuser.view_tetap');

        //Routing Halaman View Lembur Tetap
        Route::get('viewLemburTetap', [GajiLemburTetapSuperController::class, 'detail'])->name('superuser.view_lembur_tetap');

        //Routing Halaman View Lembur Inka
        Route::get('viewLemburInka', [GajiLemburTetapSuperController::class, 'detail'])->name('superuser.view_lembur_inka');

        //Routing Halaman View Lembur Pkwt
        Route::get('viewLemburPkwt', [GajiLemburTetapSuperController::class, 'detail'])->name('superuser.view_lembur_pkwt');

        //Routeing Halaman View Approval Lembur Super
        Route::get('ViewApprovalLemburSuper', [ApprovalLemburController::class, 'detail'])->name('superuser.view_approval_lembur');

        //Routing Halaman View Approval Superuser
        Route::get('ViewApprovalSuper', [ApprovalSuperController::class, 'detail'])->name('superuser.view_approval');

        //Routing Halaman View Inka Superuser
        Route::get('ViewInkaSuper', [ViewInkaSuperController::class, 'index'])->name('superuser.view_inka');

        //Routing Halaman View Pkwt Superuser
        Route::get('ViewPkwtSuper', [ViewPkwtSuperController::class, 'index'])->name('superuser.view_pkwt');

        //Routing Halaman Gaji Lembur Tetap Superuser
        Route::get('GajiLemburTetapSuper', [GajiLemburTetapSuperController::class, 'index'])->name('superuser.gaji_lembur_tetap');

        //Routing Halaman Gaji Lembur Inka Superuser
        Route::get('GajiLemburInkaSuper', [GajiLemburInkaSuperController::class, 'index'])->name('superuser.gaji_lembur_inka');

        //Routing Halaman Gaji Lembur Pkwt Superuser
        Route::get('GajiLemburPkwtSuper', [GajiLemburPkwtSuperController::class, 'index'])->name('superuser.gaji_lembur_pkwt');

        //Routing decline approval superuser
        Route::patch('ApprovalSuper/decline', [ApprovalSuperController::class, 'decline'])->name('superuser.approval.decline');
        Route::patch('ApprovalSuper/approve', [ApprovalSuperController::class, 'approve'])->name('superuser.approval.approve');

        //Routing decline approval lembur superuser
        Route::patch('ApprovalLemburSuper/decline', [ApprovalLemburController::class, 'decline'])->name('superuser.approval.lembur.decline');
        Route::patch('ApprovalLemburSuper/approve', [ApprovalLemburController::class, 'approve'])->name('superuser.approval.lembur.approve');
    });
    // //Routing Success Logout
    // Route::get('seccesslogout', [SuccessLogoutController::class, 'index'])->name('successlogout');

    //coba
    Route::get('coba', [cobaController::class, 'index'])->name('coba');

    // Route::get('/siswa/export_excel', 'SiswaController@export_excel');
    // Route::post('importTetap/import_excell', [ImportTetapController::class, 'import_excel'])->name('importTetap');
});

Route::post('test_import', [ImportTetapController::class, 'import'])->name('importTetap');
Route::post('import_lembur_tetap', [ImportTetapController::class, 'import_lembur'])->name('importLemburTetap');
Route::post('import_lembur_inka', [ImportTetapController::class, 'import_lembur'])->name('importLemburInka');
Route::post('import_lembur_pkwt', [ImportPkwtController::class, 'import_lembur'])->name('importLemburPkwt');
Route::post('test_import_inka', [ImportTetapController::class, 'import'])->name('importInka');
Route::post('test_import_pkwt', [ImportPkwtController::class, 'import'])->name('importPkwt');
Route::get('test_upload', [ImportTetapController::class, 'test_upload'])->name('testUpload');

Route::post('test_import_tetap_super', [ImportTetapController::class, 'import'])->name('importTetapSuper');
Route::post('test_import_inka_super', [ImportInkaSuperController::class, 'import'])->name('importInkaSuper');
Route::post('test_import_pkwt_super', [ImportPkwtSuperController::class, 'import'])->name('importPkwtSuper');

Route::get('gaji_pokok', [MasterGajiPokokController::class, 'index']);
