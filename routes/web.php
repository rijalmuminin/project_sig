<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GedungController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\FrontController;




// halamn depan

Route::get('/tentang', [FrontController::class, 'tentang'])->name('tentang');

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/ruangan/{id}', [FrontController::class, 'detailRuangan'])->name('front.detail');
Route::get('/filter/gedung/{gedung_id}', [FrontController::class, 'filter'])->name('front.filter.gedung');


Auth::routes();

// agar otomatis admin/
Route::redirect('/gedung', '/admin/gedung');
Route::redirect('/ruangan', '/admin/ruangan');

// Route dashboard admin (wajib login)
Route::prefix('admin')->middleware(['auth', Admin::class])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('gedung', GedungController::class);
    Route::resource('lantai', LantaiController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('ruangan', RuanganController::class);
});
