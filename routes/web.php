<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/detail/{produk}', [UserController::class, 'detail'])->name('pelanggan.detail');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('postlogin', [UserController::class, 'postlogin'])->name('postLogin');

Route::get('/registrasi', [UserController::class, 'registrasi'])->name('registrasi');
Route::post('/postregistrasi', [UserController::class, 'postregistrasi'])->name('postregistrasi');
Route::get('/produk', [UserController::class, 'produk'])->name('admin.produk');

Route::middleware('auth')->group(function(){
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('postkeranjang{produk}', [UserController::class, 'postkeranjang'])->name('pelanggan.postkeranjang');
    Route::get('keranjang', [UserController::class, 'keranjang'])->name('pelanggan.keranjang');
    Route::get('bayar/{detailtransaksi}', [UserController::class, 'bayar'])->name('pelanggan.bayar');
    Route::post('/prosesbayar/{detailtransaksi}', [UserController::class, 'prosesbayar'])->name('pelanggan.prosesbayar');
    Route::get('summary', [UserController::class, 'summary'])->name('pelanggan.summary');

    Route::get('admin/produk', [AdminController::class, 'produkIndex'])->name('admin.produk');
    Route::get('admin/tampiltambahproduk', [AdminController::class, 'tampiltambahproduk'])->name('admin.tampiltambahproduk');
    Route::post('admin/tambahproduk', [AdminController::class, 'tambahproduk'])->name('admin.tambahproduk');
    Route::get('admin/editproduk{produk}', [AdminController::class, 'editproduk'])->name('admin.editproduk');
    Route::post('admin/updateproduk{produk}', [AdminController::class, 'updateproduk'])->name('admin.updateproduk');
    Route::get('admin/deleteproduk{produk}', [AdminController::class, 'deleteproduk'])->name('admin.deleteproduk');
});
