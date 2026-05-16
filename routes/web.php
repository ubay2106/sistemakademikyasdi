<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritaKategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Guru\ProfileController as GuruProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Controllers\TahunAjaranController;
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

Route::get('/guru', [GuruController::class, 'guruLanding'])->name('guru.landing');
Route::get('/page/guru/{guru}', [GuruController::class, 'show'])->name('page.guru-show');

Route::get('/galeri', [GaleriController::class, 'all'])->name('galeri.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('berita', BeritaController::class);
        Route::resource('kategori', BeritaKategoriController::class);
        Route::patch('kategori/{kategori}/toggle', [BeritaKategoriController::class, 'toggle'])->name('kategori.toggle');

        Route::resource('prestasi', PrestasiController::class);

        Route::resource('guru', GuruController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
        Route::resource('matapelajaran', MataPelajaranController::class);

        Route::resource('tahunajaran', TahunAjaranController::class);
        Route::resource('semester', SemesterController::class);
        Route::resource('pengajar', PengajarController::class);

        Route::get('/siswakelas/kenaikan', [SiswaKelasController::class, 'kenaikan'])->name('siswakelas.kenaikan');
        Route::post('/siswakelas/proses-kenaikan', [SiswaKelasController::class, 'prosesKenaikan'])->name('siswakelas.prosesKenaikan');
        Route::resource('siswakelas', SiswaKelasController::class)->except(['show']);

        Route::resource('nilai', NilaiController::class);
        Route::get('nilai/export/excel', [NilaiController::class, 'export'])->name('nilai.export');

        Route::resource('galeri', GaleriController::class);

        Route::get('/account', [AccountController::class, 'index'])->name('account.index');

        Route::post('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.update-password');

        Route::post('/account/reset-password-guru/{guru}', [AccountController::class, 'resetPasswordGuru'])->name('account.reset-password-guru');
    });

Route::middleware('auth')
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

        Route::get('/nilai', [GuruNilaiController::class, 'index'])->name('nilai.index');

        Route::get('/nilai/{pengajar}/input', [GuruNilaiController::class, 'input'])->name('nilai.input');
        Route::post('/nilai/{pengajar}/simpan', [GuruNilaiController::class, 'simpan'])->name('nilai.simpan');

        Route::get('/rekap-nilai', [GuruNilaiController::class, 'rekap'])->name('nilai.rekap');
        Route::get('/rekap-nilai/{pengajar}', [GuruNilaiController::class, 'lihat'])->name('nilai.lihat');

        Route::get('/nilai/edit/{nilai}', [GuruNilaiController::class, 'edit'])->name('nilai.edit');
        Route::put('/nilai/update/{nilai}', [GuruNilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/nilai/delete/{nilai}', [GuruNilaiController::class, 'destroy'])->name('nilai.destroy');
        

        Route::get('/profile', [GuruProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/identitas', [GuruProfileController::class, 'updateIdentitas'])->name('profile.updateIdentitas');

        Route::put('/profile/password', [GuruProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    });
