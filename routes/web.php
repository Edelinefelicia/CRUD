<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Artisan;
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
Artisan::call('storage:link');
Route::get('/', function () {
    return view('welcome');
});
Route::delete('/gallery/{id}', [BukuController::class, 'bulkDelete'])->name('gallery.destroy');
Route::delete('/thumbnail/{id}', [BukuController::class, 'thumbnailDelete'])->name('thumbnail.destroy');
Route::get('/buku', [BukuController::class,'index'])->name('dashboard');
Route::get('/buku/create', [BukuController::class,'create'])->name('buku.create');
Route::post('/buku', [BukuController::class,'store'])->name('buku.store');
Route::delete('/buku/{id}',[BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/{id}/edit', [BukuController::class,'edit'])->name('buku.edit');
Route::put('/buku/{id}',[BukuController::class, 'update'])->name('buku.update');



// soal ketiga tugas praktikkum step 1
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
   });
