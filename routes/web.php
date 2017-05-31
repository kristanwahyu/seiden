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
    return view('welcome');
});

Route::get('/dashboard-admin', function () {
    return view('pages.admin.dashboard');
});

Route::get('/tahun-anggaran', function () {
    return view('pages.admin.tahun_anggaran');
});

Route::get('/satuan-kerja', function () {
    return view('pages.admin.satuan_kerja');
});

Route::get('/dipa', function () {
    return view('pages.admin.dipa');
});
