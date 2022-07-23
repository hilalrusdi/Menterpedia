<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValueDumpController;
use App\Http\Controllers\DashboardMController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\PembelajaranController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\PembelajaranController2;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Register Route
Route::get('/register-pengajar', function() {
    return view('auth.register2');
});
// End Register Route

// User Profile Route
Route::get('/profile',[ProfileController::class, 'index'])->middleware('verified');

Route::get('/setupprofil',[ProfileController::class, 'viewSetupProfil'])->middleware('verified');
Route::post('/setupprofil',[ProfileController::class, 'create_customer'])->middleware('verified');
Route::get('/setuppengajar',[ProfileController::class, 'viewSetupPengajar'])->middleware('verified');
Route::post('/setuppengajar',[ProfileController::class, 'create_pengajar'])->middleware('verified');

Route::get('/editpengajar',[ProfileController::class,'viewEditPengajar'])->middleware('verified');
Route::post('/editpengajar',[ProfileController::class,'editPengajar'])->middleware('verified');
Route::get('/editprofil',[ProfileController::class,'viewEditprofil'])->middleware('verified');
Route::post('/editprofil',[ProfileController::class,'editprofil'])->middleware('verified');
// End User Profile Route

// Pengajar Route 
Route::get('/jadwal',[DashboardMController::class,'jadwal'])->middleware('verified');

// Old
// Route::get('/jadwal/tambahSesi',[PembelajaranController::class,'MenambahSesi'])->middleware('verified');
// Route::post('/jadwal/tambahSesi',[PembelajaranController::class,'setJadwal'])->middleware('verified');
// Route::post('/jadwal/editSesi',[PembelajaranController::class,'editJadwal'])->middleware('verified');

// New
Route::post('/jadwal/tambahSesi',[PembelajaranController2::class,'setJadwal'])->middleware('verified');
Route::post('/jadwal/tambahTanggal',[PembelajaranController2::class,'setDate'])->middleware('verified');
Route::post('/jadwal/editSesi',[PembelajaranController2::class,'editJadwal'])->middleware('verified');
Route::post('/jadwal/editTanggal',[PembelajaranController2::class,'editDate'])->middleware('verified');
Route::post('/jadwal/deleteTanggal',[PembelajaranController2::class,'deleteDate'])->middleware('verified');

Route::get('/penarikan',[DashboardMController::class,'penarikan'])->middleware('verified');

// Close Pengajar route


Route::get('/',[HalamanUtamaController::class,'index']);


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

// Admin Route
Route::get('/adm',[AdminController::class,'index']);
Route::post('/adm',[AdminController::class,'login']);

Route::post('/adm/home',[AdminController::class,'home']);
Route::post('/adm/verif',[AdminController::class,'verifikasi']);
Route::post('/adm/verif/detail',[AdminController::class,'detailsProfil']);
Route::post('/adm/verif/aprove',[AdminController::class,'aprove']);
Route::post('/adm/ad',[AdvertisementController::class,'control']);
Route::post('/adm/ad/newad',[AdvertisementController::class,'NewAd']);
Route::post('/adm/ad/dlt',[AdvertisementController::class,'dlt']);

Route::get('/adm/test',[AdminController::class,'test']);
// Close Admin Route

// Transaction Route
Route::get('/{nomer_hp}',[TransaksiController::class,'index'])->middleware('verified');
Route::post('/detail_transaksi',[TransaksiController::class,'generateToken'])->middleware('verified');
Route::post('/detail_transaksi/post',[TransaksiController::class,'payment_post'])->middleware('verified');
// Close Transaction Route

// Testing Route
Route::post('/capture',[ValueDumpController::class,'index']);
Route::get('/preview',[ValueDumpController::class,'preview']);
// End Testing Route

