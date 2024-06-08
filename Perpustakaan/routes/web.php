<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\PeminjamanController;


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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('/member', MemberController::class);

Route::resource('/categori', CategoriController::class);
Route::resource('/peminjaman', PeminjamanController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/{id}/show', [BukuController::class, 'show'])->name('buku.show');

Route::middleware('auth')->group(function () {
    Route::resource('buku', BukuController::class)->except(['index', 'show']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


