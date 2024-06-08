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

Auth::routes();
Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/{id}/show', [BukuController::class, 'show'])->name('buku.show');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/{id}/show', [MemberController::class, 'show'])->name('member.show');

Route::get('/categori', [CategoriController::class, 'index'])->name('categori.index');
Route::get('/categori/{id}/show', [CategoriController::class, 'show'])->name('categori.show');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/{id}/show', [PeminjamanController::class, 'show'])->name('peminjaman.show');

Route::middleware('auth')->group(function () {
    Route::resource('buku', BukuController::class)->except(['index', 'show']);
    Route::resource('/member', MemberController::class)->except(['index', 'show']);
    Route::resource('/categori', CategoriController::class)->except(['index', 'show']);
    Route::resource('/peminjaman', PeminjamanController::class)->except(['index', 'show']);
});


