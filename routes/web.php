<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/transaksi', [App\Http\Controllers\FrontController::class, 'dashboard'])->name('transaksi');
    //
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    //
    Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan');
    Route::post('/penjualan/post', [App\Http\Controllers\PenjualanController::class, 'store'])->name('penjualan-post');
    Route::get('/penjualan/detail/{id}', [App\Http\Controllers\PenjualanController::class, 'show'])->name('penjualan-detail');
    Route::get('/penjualan/edit', [App\Http\Controllers\PenjualanController::class, 'edit'])->name('penjualan-edit');
    //
    Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
    Route::post('/produk/post', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk-post');
    Route::get('/produk/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk-edit');
    Route::post('/produk/edit/post/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('produk-edit-post');
    Route::delete('/produk/delete/{id}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk-delete');
    //
    Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori');
    Route::post('/kategori/post', [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori-post');
    Route::get('/kategori/edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori-edit');
    Route::post('/kategori/edit/post/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori-edit-post');
    Route::delete('/kategori/delete/{id}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori-delete');
    //
    Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
    Route::post('/member/post', [App\Http\Controllers\MemberController::class, 'store'])->name('member-post');
    Route::get('/member/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->name('member-edit');
    Route::post('/member/edit/post/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('member-edit-post');
    Route::delete('/member/delete/{id}', [App\Http\Controllers\MemberController::class, 'destroy'])->name('member-delete');
    //
    Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/post', [App\Http\Controllers\PegawaiController::class, 'store'])->name('pegawai-store');
});



Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin-login');
Route::post('/admin/login/post', [App\Http\Controllers\AdminController::class, 'loginPost'])->name('admin-login-post');

Route::group(['middleware' => 'auth:admin'], function () {
    //KATEGORI
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/admin/kategori-usaha', [App\Http\Controllers\AdminController::class, 'index_kategori'])->name('admin-kategori');
    Route::post('/admin/kategori-usaha/post', [App\Http\Controllers\AdminController::class, 'store_kategori'])->name('admin-kategori-post');
    Route::get('/admin/kategori-usaha/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_kategori'])->name('admin-kategori-edit');
    Route::post('/admin/kategori-usaha/update/{id}', [App\Http\Controllers\AdminController::class, 'update_kategori'])->name('admin-kategori-update');
    Route::delete('/admin/kategori-usaha/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_kategori'])->name('admin-kategori-delete');
    //USER
    Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'index_user'])->name('admin-user');
    Route::post('/admin/user/post', [App\Http\Controllers\AdminController::class, 'store_user'])->name('admin-user-post');
});
