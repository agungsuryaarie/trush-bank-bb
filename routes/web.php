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

Auth::routes([
    'register' => false
]);

Route::get('/', 'HomeController@index')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('admin.profile');
    Route::patch('/profile/change', 'HomeController@change')->name('admin.change');

    // user
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');
    Route::post('/user', 'UserController@store')->name('user.store');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::patch('/user/{id}', 'UserController@update')->name('user.update');

    // nasabah
    Route::get('/nasabah', 'UserController@nasabahIndex')->name('nasabah.index');
    Route::get('/nasabah/{id}/edit', 'UserController@nasabahEdit')->name('nasabah.edit');
    Route::get('/nasabah/info/{id}', 'TabunganController@nasabahInfo')->name('nasabah.info');
    Route::post('/nasabah/tarik/{id}', 'TabunganController@nasabahTarik')->name('nasabah.tarik');

    // jenis sampah
    Route::get('/jenis-sampah', 'JenisSampahController@index')->name('jenis.index');
    Route::delete('/jenis-sampah/{id}', 'JenisSampahController@destroy')->name('jenis.destroy');
    Route::post('/jenis-sampah', 'JenisSampahController@store')->name('jenis.store');
    Route::patch('/jenis-sampah/{id}', 'JenisSampahController@update')->name('jenis.update');

    // catatan
    Route::get('/catatan', 'CatatanController@index')->name('catatan.index');
    Route::get('/catatan/total', 'CatatanController@total');

    // penjualan
    Route::get('/penjualan', 'PenjualanController@index')->name('penjualan.index');
    Route::post('/penjualan', 'PenjualanController@store')->name('penjualan.store');

    // keuangan
    Route::get('/keuangan', 'KeuanganController@index')->name('keuangan.index');
    Route::post('/keuangan', 'KeuanganController@store')->name('keuangan.store');
});
