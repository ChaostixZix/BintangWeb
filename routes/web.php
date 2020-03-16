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
        return redirect()->route('loginPage');
    })->name('logout');
});

Route::group(['prefix' => '/', 'middleware' => 'cekSes'], function ()
{
   Route::get('app', function ()
   {
       return view('app');
   })->name('index');
   Route::get('dataExportAll', 'Pendaftaran@exportDataAll');
   Route::get('dataExportAllBySekolah/{sekolah}', 'Pendaftaran@exportDataAll');
   Route::get('dataExport/{nisn}', 'Pendaftaran@exportData');
   Route::get('raportExport/{nisn}', 'Pendaftaran@exportRaport');


   Route::group(['prefix' => 'ajax'], function () //todo = middleware for nisn
   {
       Route::get('getSekolah', 'Pendaftaran@getSekolah');
       Route::get('getAllDataByNisn/{nisn}', 'Pendaftaran@getAllDataByNisn');
       Route::get('getAllSiswa/', 'Pendaftaran@getSiswaDatatable');
       Route::get('getAllSiswaBySekolah/', 'Pendaftaran@getSiswaDatatableBySekolah');
       Route::get('getDataByTable/{table}', 'Pendaftaran@getDataByTable');
       Route::get('getDataPrestasi/', 'Pendaftaran@getDataPrestasi');
       Route::get('getDataPrestasiByNisn/{nisn}', 'Pendaftaran@getDataPrestasiByNisn');
       Route::get('getDataBeasiswa/', 'Pendaftaran@getDataBeasiswa');
       Route::get('getDataBeasiswaByNisn/{nisn}', 'Pendaftaran@getDataBeasiswaByNisn');
       Route::get('getDataRaport/{semester}', 'Pendaftaran@getDataRaport');
       Route::get('getDataRaportByNisn/{nisn}/{semester}', 'Pendaftaran@getDataRaportByNisn');
       Route::get('selesai/{nisn}/', 'Pendaftaran@selesai');

       Route::group(['prefix' => 'submitData'], function ()
       {
           Route::get('ket_data_siswa', 'Pendaftaran@submitKeteranganSiswa');
           Route::get('ket_pendidikan', 'Pendaftaran@submitKeteranganPendidikan');
           Route::get('ket_kesehatan', 'Pendaftaran@submitKeteranganKesehatan');
           Route::get('ket_ayah', 'Pendaftaran@submitKeteranganAyah');
           Route::get('ket_prestasi', 'Pendaftaran@submitKeteranganPrestasi');
           Route::get('ket_raport/{semester}', 'Pendaftaran@submitKeteranganRaport');
           Route::get('ket_beasiswa/', 'Pendaftaran@submitKeteranganBeasiswa');
           Route::post('ket_foto/', 'Pendaftaran@submitFoto');
       });
   });
});
