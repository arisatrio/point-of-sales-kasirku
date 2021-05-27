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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\FrontController::class, 'dashboard'])->name('dashboard');
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
});
