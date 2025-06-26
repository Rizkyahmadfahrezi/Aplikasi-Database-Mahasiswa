<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MahasiswaController;
    

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register','App\Http\Controllers\RegisterController@daftar')->
name('daftar');
Route::post('/register','App\Http\Controllers\RegisterController@simpan')
->name('simpan');
Route::get('homepage','App\Http\Controllers\HomeController@home')->name('homepage');
Route::get('profil','App\Http\Controllers\HomeController@profil')->name('profil');
Route::get('produk','App\Http\Controllers\ProdukController@produk')->name('produk');
Route::get('/produk/detail/{id}','App\Http\Controllers\ProdukController@detail')->name('detailproduk');
Route::resource('mahasiswa', 'App\Http\Controllers\MahasiswaController',['name' => 'mahasiswa']);
