<?php

use App\Http\Controllers\AdminAlokasiDanaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDokumentasiController;
use App\Http\Controllers\AdminRiwayatDonasiController;
use App\Http\Controllers\DashboardDonaturController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\PengaturanController;

Route::get('/', [BerandaController::class, 'beranda'])->name('beranda');
Route::get('/donasi', [BerandaController::class, 'donasi'])->name('donasi');
Route::get('/tentang', [BerandaController::class, 'tentang'])->name('tentang');
Route::get('/dokumentasi', [BerandaController::class, 'dokumentasi'])->name('dokumentasi');
Route::get('/donasi/{alokasiDana}', [BerandaController::class, 'detail_donasi'])->name('donasi.detail');
Route::post('/donasikan/{alokasiDana}', [BerandaController::class, 'donasikan'])->name('donasikan');
Route::get('/verifikasi/{donasi}', [BerandaController::class, 'verifikasi'])->name('verifikasi');

Route::view('/masuk', 'masuk')->name('masuk');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::view('/daftar', 'daftar')->name('daftar');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/lupa-sandi', [AuthController::class, 'lupa_sandi'])->name('lupa-sandi');
Route::get('/lupa-sandi/token', [AuthController::class, 'kirim_token'])->name('token');
Route::post('/lupa-sandi/token', [AuthController::class, 'verifikasi_token'])->name('token-verifikasi');
Route::get('/password-baru', [AuthController::class, 'password_baru'])->name('password-baru');
Route::post('/password-baru', [AuthController::class, 'store_password_baru'])->name('password-baru.store');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::post('/edit/profile', [UserController::class, 'updateProfile'])->name('edit.profile');
Route::post('/edit/foto', [UserController::class, 'updateFoto'])->name('edit.foto');

Route::view('/kontak', 'kontak');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('donatur')->name('donatur.')->group(function () {
  Route::get('/dashboard', [DashboardDonaturController::class, 'index'])->name('dashboard');
  Route::get('/riwayat', [DashboardDonaturController::class, 'riwayat'])->name('riwayat');
});


// ADMIN

Route::prefix('admin')->name('admin.')->group(function () {
  Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::get('/setting', [PengaturanController::class, 'index'])->name('pengaturan');
  Route::post('/setting/beranda', [PengaturanController::class, 'beranda_store'])->name('beranda.store');
  Route::post('/setting/tentang', [PengaturanController::class, 'tentang_store'])->name('tentang.store');

  Route::resource('alokasi-dana', AdminAlokasiDanaController::class);
  Route::resource('riwayat-donasi', AdminRiwayatDonasiController::class);
  Route::resource('dokumentasi', AdminDokumentasiController::class);
  Route::resource('donatur', DataUserController::class);
});
