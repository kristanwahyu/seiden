<?php

Route::get('/', function () {
    return view('welcome');
});

//====================== ROUTE ADMIN ======================//
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

Route::get('/dipa-program', function () {
    return view('pages.admin.dipa_program');
});
