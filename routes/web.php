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
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function ()
{
    Route::get('daftarPage', function ()
    {
        return view('Auth.register');
    })->name('daftarPage');
    Route::get('loginPage', function ()
    {
        return view('Auth.login');
    })->name('loginPage');

    Route::post('login', 'Pengguna@login')->name('login');
    Route::post('daftar', 'Pengguna@daftar')->name('daftar');
    Route::get('logout', function ()
    {
        \Illuminate\Support\Facades\Session::flush();
        return redirect()->route('daftarPage');
    })->name('logout');
});

Route::group(['prefix' => '/', 'middleware' => 'cekSes'], function ()
{
   Route::get('app', function ()
   {
       return view('app');
   })->name('index');


   Route::group(['prefix' => 'ajax'], function () //todo = middleware for nisn
   {
       Route::get('getDataByTable/{table}', 'Pendaftaran@getDataByTable');

       Route::group(['prefix' => 'submitData'], function ()
       {
           Route::get('ket_data_siswa', 'Pendaftaran@submitKeteranganSiswa');
           Route::get('ket_pendidikan', 'Pendaftaran@submitKeteranganPendidikan');
           Route::get('ket_kesehatan', 'Pendaftaran@submitKeteranganKesehatan');
       });
   });
});
