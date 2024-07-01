<?php

use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\LandRecoveryLocationController;
use App\Models\LandRecoveryLocation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout/main');
});

Route::get('login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

route::get('/user', function () {
    return view('user',);
});

route::get('/adduser', function () {
    return view('adduser',);
});

route::get('/lahan', function () {
    return view('lahan');
});

route::get('/addlahan', function () {
    return view('addlahan');
});

route::get('/manual', function () {
    return view('manual');
});

route::get('/admin', function () {
    return view('admin',);
});

route::get('/lokasi', function () {
    return view('lokasi',);
});

route::get('/index', function () {
    return view('index',);
});

route::get('/editlahan', function () {
    return view('editlahan',);
});

Route::get('/addlahan', [IndoregionController::class, 'addlahan']) -> name('addlahan');
// Route::get('/lahan', [LandRecoveryLocation::class, 'index']) -> name('lahan');
Route::post('/getkabupaten', [IndoregionController::class, 'getkabupaten']) -> name('getkabupaten');
Route::post('/getkecamatan', [IndoregionController::class, 'getkecamatan']) -> name('getkecamatan');
Route::post('/getdesa', [IndoregionController::class, 'getDesa'])->name('getdesa');

Route::post('/addlahan', [LandRecoveryLocationController::class, 'store']);


Route::resource('land_recovery_locations', LandRecoveryLocationController::class);

Route::get('/getkabupaten/{id}', function($id) {
    $kabupatens = \App\Models\Regency::where('province_id', $id)->pluck('name', 'id');
    return response()->json($kabupatens);
});

Route::get('/getkecamatan/{id}', function($id) {
    $kecamatans = \App\Models\District::where('regency_id', $id)->pluck('name', 'id');
    return response()->json($kecamatans);
});

Route::get('/getdesa/{id}', function($id) {
    $desas = \App\Models\Village::where('kecamatan_id', $id)->pluck('name', 'id');
    return response()->json($desas);
});


