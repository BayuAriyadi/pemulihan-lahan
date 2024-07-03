<?php

use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController; 
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
    return view('login');
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
Route::get('/lahan', [LocationController::class, 'lahan']) -> name('lahan');
Route::post('/lahan', [LocationController::class, 'store']);


// Route::get('/lahan', [LandRecoveryLocation::class, 'index']) -> name('lahan');
Route::post('/getkabupaten', [IndoregionController::class, 'getkabupaten']) -> name('getkabupaten');
Route::post('/getkecamatan', [IndoregionController::class, 'getkecamatan']) -> name('getkecamatan');
Route::post('/getdesa', [IndoregionController::class, 'getDesa'])->name('getdesa');
Route::get('/getkecamatan/{id}', [KecamatanController::class, 'getKecamatanByKabupatenId']);
Route::delete('/location/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

Route::get('/lahan', [LocationController::class, 'index'])->name('lahan.index');
Route::get('/lahan/create', [LocationController::class, 'create'])->name('lahan.create');
Route::get('/lahan/{id}/edit', [LocationController::class, 'edit'])->name('lahan.edit');
Route::put('/lahan/{id}', [LocationController::class, 'update'])->name('lahan.update');
Route::post('/lahan', [LocationController::class, 'store'])->name('lahan.store');
Route::delete('/lahan/{id}', [LocationController::class, 'destroy'])->name('lahan.destroy');

Route::get('/lokasi', [LocationController::class, 'showLocations'])->name('locations.show');
Route::get('/lokasi/{id}/kml', [LocationController::class, 'getKMLFile'])->name('location.kml');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/user', [AuthController::class, 'index'])->name('users.index');
Route::get('/user/form/{id?}', [AuthController::class, 'showForm'])->name('users.form');
Route::post('/user/save/{id?}', [AuthController::class, 'save'])->name('users.save');
Route::delete('/user/{id}', [AuthController::class, 'destroy'])->name('users.destroy');
Route::get('/adduser', [AuthController::class, 'tambahUser']);
Route::get('/dashboard', [AuthController::class, 'dash']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');





// Route::post('/addlahan', [LandRecoveryLocationController::class, 'store']);


// Route::resource('land_recovery_locations', LandRecoveryLocationController::class);
