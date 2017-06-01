<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //===========YANG PERLU AUTH MASUKIN SINI=============//
    Route::group(['middleware' => 'admin'], function () {
//====================== ROUTE ADMIN ======================//
        Route::get('/dashboard-admin', function () {
            return view('pages.admin.dashboard');
        });

        Route::get('/user', function () {
            return view('pages.admin.user');
        });

        Route::get('/tahun-anggaran', function () {
            return view('pages.admin.tahun_anggaran');
        });

        Route::get('/satuan-kerja', function () {
            return view('pages.admin.satuan_kerja');
        });
        Route::get('/satuan-kerja/show','SatuanKerjaController@show');
        Route::post('/satuan-kerja/store', 'SatuanKerjaController@store');
        Route::put('/satuan-kerja/update/{id}', 'SatuanKerjaController@update');
        Route::get('/satuan-kerja/code-generate', 'SatuanKerjaController@codeGenerate');
        Route::get('/satuan-kerja/get/{id}', 'SatuanKerjaController@getOne');

        Route::get('/dipa', function () {
            return view('pages.admin.dipa');
        });

        Route::get('/dipa/dipa-program', function () {
            return view('pages.admin.dipa_program');
        });

        Route::get('/dipa/dipa-kegiatan', function () {
            return view('pages.admin.dipa_kegiatan');
        });

        Route::get('/dipa/dipa-output', function () {
            return view('pages.admin.dipa_output');
        });

        Route::get('/dipa/dipa-suboutput', function () {
            return view('pages.admin.dipa_suboutput');
        });

        Route::get('/dipa/dipa-komponen', function () {
            return view('pages.admin.dipa_komponen');
        });

        Route::get('/dipa/dipa-subkomponen', function () {
            return view('pages.admin.dipa_subkomponen');
        });

        Route::get('/dipa/dipa-akun', function () {
            return view('pages.admin.dipa_akun');
        });
//==============+++END ADMIN+++============//

Auth::routes();
//==OVERIDE LOGOUT==//
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

Route::get('/tes','SatuanKerjaController@codeGenerate');
Route::get('/home', 'HomeController@index')->name('home');
