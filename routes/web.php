<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GedungController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;
use App\Http\Controllers\LantaiController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Redirect /gedung ke /admin/gedung
Route::redirect('/gedung', '/admin/gedung');

// Route dashboard admin (wajib login dan role admin)
Route::prefix('admin')->middleware(['auth', Admin::class])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('gedung', GedungController::Class);
    Route::resource('lantai', LantaiController::class);

});
