<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Promise\Create;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::get('post',[HomeController::class,'post'])->middleware(['auth','manajer']);

Route::controller(UserController::class)
    ->prefix('/manajemen-user')
    ->group(function(){
        Route::get('/','index')->name('manajemen-user.index');
    });

Route::controller(BarangController::class)
    ->prefix('/manajemen-barang')
    ->group(function(){
        Route::get('/data-barang',[BarangController::class, 'index'])->name('manajemen-barang.data-barang');
        Route::get('/create-barang', [BarangController:: class, 'create'])->name('manajemen-barang.create-barang');
        Route::post('/simpan-barang', [BarangController:: class, 'store'])->name('manajemen-barang.simpan-barang');
        Route::get('/edit-barang/{id}', [BarangController:: class, 'edit'])->name('manajemen-barang.edit-barang');
        Route::post('/update-barang/{id}', [BarangController:: class, 'update'])->name('manajemen-barang.update-barang');
        Route::get('/delete-barang/{id}', [BarangController:: class, 'destroy'])->name('manajemen-barang.delete-barang');
    });

Route::controller(SupplierController::class)
    ->prefix('/manajemen-barang')
    ->group(function(){
        Route::get('/data-supplier',[SupplierController::class, 'index'])->name('manajemen-supplier.data-supplier');
        Route::get('/create-supplier', [SupplierController:: class, 'create'])->name('manajemen-supplier.create-supplier');
        Route::post('/simpan-supplier', [SupplierController:: class, 'store'])->name('manajemen-supplier.simpan-supplier');
        Route::get('/edit-supplier/{id}', [SupplierController:: class, 'edit'])->name('manajemen-supplier.edit-supplier');
        Route::post('/update-supplier/{id}', [SupplierController:: class, 'update'])->name('manajemen-supplier.update-supplier');
        Route::get('/delete-supplier/{id}', [SupplierController:: class, 'destroy'])->name('manajemen-supplier.delete-supplier');
    });

Route::get('/data-transaksi',[TransaksiController::class, 'index'])->name('manajemen-transaksi.data-transaksi');
Route::get('/create-transaksi', [TransaksiController:: class, 'create'])->name('manajemen-transaksi.create-transaksi');
Route::post('/simpan-transaksi', [TransaksiController:: class, 'store'])->name('manajemen-transaksi.simpan-transaksi');
Route::get('/nota-transaksi',[TransaksiController::class, 'notaPenjualan'])->name('manajemen-transaksi.nota-transaksi');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
