<?php

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
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/index2', function () {
    return view('index2');
});
Route::get('/dash', function () {
    return view('dash');
});
Route::get('/template', function () {
    return view('template');
});
// Kelompok
Route::get('/book', function () {
    return view('/frontend/book');
});
Route::get('/features', function () {
    return view('/frontend/features');
});
Route::get('/about', function () {
    return view('/frontend/about');
});
Route::get('/cinta', function () {
    return view('/frontend/show/cinta');
});
Route::get('/juni', function () {
    return view('/frontend/show/juni');
});
Route::get('/hujan', function () {
    return view('/frontend/show/hujan');
});
Route::get('/surga', function () {
    return view('/frontend/show/surga');
});
Route::get('/dalam', function () {
    return view('/frontend/show/dalam');
});
Route::get('/beijing', function () {
    return view('/frontend/show/beijing');
        
    });
//Berakhir

// Auth::resource(['register'=>'false']);

Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/home', function () {
        return view("home");
    });
    // Route::resource('index', 'HomeController');
    Route::resource('user', 'UserController');
    Route::resource('petugas', 'PetugasController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('penerbit', 'PenerbitController');
});
Route::group(['prefix' => 'backend'], function () {
    Route::get('/home', function () {
        return view("home");
    });
    // Route::resource('index', 'HomeController');
    Route::resource('buku', 'BukuController');
    Route::resource('detailpinjam', 'DetailpinjamController');
    Route::resource('kartupendaftaran', 'KartupendaftaranController');
    Route::resource('peminjam', 'PeminjamController');
    Route::resource('peminjaman', 'PeminjamanController');
});

Auth::routes(['register' => false]);
// Route::get('/home', 'HomeController@index')->name('home');