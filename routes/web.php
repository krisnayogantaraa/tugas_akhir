<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\App\Http\Controllers\PostController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\pengajuan;
use Whoops\Run;

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
})->name('welcome');

Route::post('/pengajuan}', [\App\Http\Controllers\pengajuan::class, 'store'])->name('pengajuan.store');
Route::get('/pengajuan/{no_keputusan_pengadilan}/cetak_bukti}', [\App\Http\Controllers\pengajuan::class, 'cetak'])->name('pengajuan.cetak');


Auth::routes();

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    //route utama

    Route::get('/home', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::post('/posts/tambah', [\App\Http\Controllers\PostController::class, 'tambah'])->name('posts.tambah');
    Route::get('/posts/{no_keputusan_pengadilan}/cetak_bukti', [\App\Http\Controllers\PostController::class, 'cetak_bukti'])->name('posts.cetak_bukti');

    Route::get('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita_acara.edit');
    Route::post('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita_acara.create');
    Route::get('/berita_acara/cetak', [BeritaController::class, 'cetak'])->name('berita_acara.cetak');

    Route::get('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'edit'])->name('surat_jalan.edit');
    Route::post('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'create'])->name('surat_jalan.create');
    Route::get('/surat_jalan/cetak', [SuratJalanController::class, 'cetak'])->name('surat_jalan.cetak');

    Route::resource('/warehouse', \App\Http\Controllers\WarehouseController::class);
    Route::resource('/users', \App\Http\Controllers\DaftarController::class);
    Route::resource('/ekspedisi', \App\Http\Controllers\EkspedisiController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:operator'])->group(function () {

    //route utama
    Route::resource('/posts2', \App\Http\Controllers\PostController::class);
    Route::post('/posts2/tambah', [\App\Http\Controllers\PostController::class, 'tambah'])->name('posts2.tambah');
    Route::get('/posts2/{no_keputusan_pengadilan}/cetak_bukti', [\App\Http\Controllers\PostController::class, 'cetak_bukti'])->name('posts2.cetak_bukti');

    Route::get('/berita_acara2/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita_acara2.edit');
    Route::post('/berita_acara2/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita_acara2.create');
    Route::get('/berita_acara2/cetak', [BeritaController::class, 'cetak'])->name('berita_acara2.cetak');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:gudang'])->group(function () {

    Route::get('/surat_jalan2/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'edit'])->name('surat_jalan2.edit');
    Route::post('/surat_jalan2/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'create'])->name('surat_jalan2.create');
    Route::get('/surat_jalan2/cetak', [SuratJalanController::class, 'cetak'])->name('surat_jalan2.cetak');

    Route::resource('/warehouse2', \App\Http\Controllers\WarehouseController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:ekspedisi'])->group(function () {

    Route::resource('/ekspedisi2', \App\Http\Controllers\EkspedisiController::class);
});





// //route utama
// Route::resource('/posts', \App\Http\Controllers\PostController::class);
// Route::post('/posts/tambah', [\App\Http\Controllers\PostController::class, 'tambah'])->name('posts.tambah');
// Route::get('/posts/{no_keputusan_pengadilan}/cetak_bukti', [\App\Http\Controllers\PostController::class, 'cetak_bukti'])->name('posts.cetak_bukti');

// Route::get('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita_acara.edit');
 //Route::post('/berita_acara/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita_acara.create');
 //Route::get('/berita_acara/cetak', [BeritaController::class, 'cetak'])->name('berita_acara.cetak');

// Route::get('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'edit'])->name('surat_jalan.edit');
// Route::post('/surat_jalan/create/{no_keputusan_pengadilan}', [\App\Http\Controllers\SuratJalanController::class, 'create'])->name('surat_jalan.create');
// Route::get('/surat_jalan/cetak', [SuratJalanController::class, 'cetak'])->name('surat_jalan.cetak');

// Route::resource('/warehouse', \App\Http\Controllers\WarehouseController::class);
// Route::resource('/users', \App\Http\Controllers\DaftarController::class);
