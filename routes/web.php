<?php

use App\Http\Controllers\arsipSuratController;
use App\Http\Controllers\kategoriSuratController;
use App\Http\Controllers\LoginController;
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
    return view('layout.master');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/masuk-sistem', [LoginController::class, 'login'])->name('masuk');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/arsipSurat', [arsipSuratController::class, 'tampilArsip'])->name('arsip-surat');
    Route::get('/tampilFormTambah', [arsipSuratController::class, 'tampilFormTambahArsip'])->name('form-arsipTambah');
    Route::post('/tambahArsipSurat', [arsipSuratController::class, 'tambahArsip'])->name('tambah-arsip');
    Route::get('/editArsipSurat/{id}', [arsipSuratController::class, 'tampileditArsip'])->name('edit-arsip');
    Route::post('/updateArsipSurat/{id}', [arsipSuratController::class, 'updateArsip'])->name('update-arsip');
    Route::get('/lihatArsipSurat/{id}', [arsipSuratController::class, 'lihatArsip'])->name('lihat-arsip');
    Route::get('/unduhArsipSurat/{id}', [arsipSuratController::class, 'unduhFileSurat'])->name('unduh-arsip');
    Route::post('/hapusArsipSurat/{id}', [arsipSuratController::class, 'hapusArsip'])->name('hapus-arsip');

    Route::get('/kategoriSurat', [kategoriSuratController::class, 'tampilKategori'])->name('kategori-surat');
    Route::get('/tampilFormTKategori', [kategoriSuratController::class, 'tampilFormTambahKategori'])->name('form-kategoriTambah');
    Route::post('/tambahKategoriSurat', [kategoriSuratController::class, 'tambahKategori'])->name('tambah-kategori');
    Route::get('/tampilFormEKategori/{id}', [kategoriSuratController::class, 'tampilFormEditKategori'])->name('form-kategoriEdit');
    Route::post('/editKategoriSurat/{id}', [kategoriSuratController::class, 'editKategori'])->name('edit-kategori');
    Route::post('/hapusKategoriSurat/{id}', [kategoriSuratController::class, 'hapusKategori'])->name('hapus-kategori');

    Route::get('/aboutMe', function () {
        return view('aboutMe');
    });
// Route::get('/login', function () {
//     return view('auth/login');
    Route::get('/dashboard', [arsipSuratController::class, 'tampilDashboard'])->name('dashboard');
});



