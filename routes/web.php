<?php

use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritaKategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
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
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/pendidikan/ra', [PendidikanController::class, 'ra'])->name('pendidikan.ra');
Route::get('/pendidikan/mi', [PendidikanController::class, 'mi'])->name('pendidikan.mi');
Route::get('/pendidikan/mts', [PendidikanController::class, 'mts'])->name('pendidikan.mts');

Route::get('/page/berita-index', [BeritaController::class, 'frontendIndex'])->name('page.berita-index');
Route::get('/page/berita/{slug}', [BeritaController::class, 'frontendShow'])->name('page.berita-show');

Route::get('/page/prestasi-index', [PrestasiController::class, 'frontendIndex'])->name('page.prestasi-index');
Route::get('/page/prestasi/{slug}', [PrestasiController::class, 'frontendShow'])->name('page.prestasi-show');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');
    Route::resource('berita', BeritaController::class);
    Route::resource('kategori', BeritaKategoriController::class);
    Route::patch('kategori/{kategori}/toggle', [BeritaKategoriController::class, 'toggle'])->name('kategori.toggle');
    Route::resource('prestasi', PrestasiController::class);


    Route::get('/guru/dashboard', function () {return view('guru.dashboard');})->name('guru.dashboard');
});
