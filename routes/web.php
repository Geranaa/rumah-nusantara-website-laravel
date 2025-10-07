<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuessController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::controller(GuessController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/rumah_detail/{id}', 'rumah_detail')->name('rumah_detail');
    Route::get('/kontak', 'kontak')->name('kontak');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/berita_1', 'berita_1')->name('berita_1');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/rumah_tambah', 'rumah_tambah')->name('rumah_tambah');
        Route::post('/rumah_tambah', 'tambah')->name('tambah');
        Route::get('/rumah_daftar', 'rumah_daftar')->name('rumah_daftar');
        Route::get('/rumah_edit/{id}', 'edit')->name('edit');
        Route::post('/rumah_edit/{id}', 'update')->name('update');
        Route::post('/rumah_daftar/{id}', 'hapus')->name('hapus');
        Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    });
});

