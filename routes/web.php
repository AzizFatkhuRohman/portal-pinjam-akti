<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PinjamController;
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
Route::get('masuk',[AuthController::class,'Get'])->name('login');
Route::post('masuk',[AuthController::class,'Post'])->name('login');
Route::middleware('auth')->group(function(){
    Route::get('/',[Controller::class,'index'])->name('index');
    Route::post('logout',[AuthController::class,'Logout'])->name('logout');
    Route::get('data-barang',[BarangController::class,'Get'])->name('data-barang');
    Route::post('data-barang',[BarangController::class,'Post'])->name('data-barang');
    Route::put('data-barang/edit/{id}',[BarangController::class,'Put'])->name('data-barang-edit');
    Route::delete('data-barang/hapus/{id}',[BarangController::class,'Destroy'])->name('data-barang-hapus');
    Route::get('data-pinjaman',[PinjamController::class,'Get'])->name('data-pinjaman');
    Route::post('data-pinjaman',[PinjamController::class,'Post'])->name('data-pinjaman');
    Route::put('data-pinjaman/edit/{id}',[PinjamController::class,'Put'])->name('data-pinjaman-edit');
    Route::put('data-pinjaman/end/{id}',[PinjamController::class,'End'])->name('data-pinjaman-end');
});