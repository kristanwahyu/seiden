<?php

Route::get('/', function () {
    return bcrypt('admin');
});

Route::group(['middleware' => 'auth'], function () {
    //===========YANG PERLU AUTH MASUKIN SINI=============//
    Route::group(['middleware' => 'admin'], function () {
//====================== ROUTE ADMIN ======================//
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard');
        });

        Route::get('/user', function () {
            return view('pages.admin.user');
        });
        Route::post('/user/store', 'UserController@store');
        Route::get('/user/show','UserController@show');
        Route::get('/user/get/{id}','UserController@getOne');
        Route::put('/user/update/{id}','UserController@update');
        Route::delete('/user/delete/{id}', 'UserController@delete');
        //TAHUN ANGGARAN
        Route::get('/tahun-anggaran', function () {
            return view('pages.admin.tahun_anggaran');
        });
        Route::get('/tahun-anggaran/show','TahunAnggaranController@show');
        Route::post('/tahun-anggaran/store','TahunAnggaranController@store');
        Route::put('/tahun-anggaran/update/{id}', 'TahunAnggaranController@update');
        Route::get('/tahun-anggaran/get/{id}','TahunAnggaranController@show');
        Route::put('/tahun-anggaran/aktif-toggle', 'TahunAnggaranController@aktifToggle');

        //Satuan KErja
        Route::get('/satuan-kerja', function () {
            return view('pages.admin.satuan_kerja');
        });
        Route::get('/satuan-kerja/show','SatuanKerjaController@show');
        Route::post('/satuan-kerja/store', 'SatuanKerjaController@store');
        Route::put('/satuan-kerja/update/{id}', 'SatuanKerjaController@update');
        Route::get('/satuan-kerja/code-generate', 'SatuanKerjaController@codeGenerate');
        Route::get('/satuan-kerja/get/{id}', 'SatuanKerjaController@getOne');
        Route::get('/satuan-kerja/get','SatuanKerjaController@getAll');
    });

    Route::group(['middleware' => 'satker'], function () {
                //==============+++START SATUAN KERJA+++============//
        Route::get('/dashboard-satker', function () {
            return view('pages.satker.dashboard');
        });

        // Route::get('/dipa', function () {
        //     return view('pages.satker.dipa');
        // });

        Route::get('/dipa/dipa-program', 'ProgramController@showPage');
        Route::get('/dipa/dipa-program/show', 'ProgramController@show');
        Route::get('/dipa/dipa-program/get/{id}', 'ProgramController@getOne');
        Route::post('/dipa/dipa-program/store', 'ProgramController@store');
        Route::put('/dipa/dipa-program/update/{id}', 'ProgramController@update');
        Route::delete('/dipa/dipa-program/delete/{id}', 'ProgramController@delete');

        Route::get('/dipa/dipa-kegiatan/{id}', 'KegiatanController@showPage');
        Route::get('/dipa/dipa-kegiatan/show/{id}', 'KegiatanController@show');
        Route::get('/dipa/dipa-kegiatan/get/{id}', 'KegiatanController@getOne');
        Route::post('/dipa/dipa-kegiatan/store', 'KegiatanController@store');
        Route::put('/dipa/dipa-kegiatan/update/{id}', 'KegiatanController@update');
        Route::delete('/dipa/dipa-kegiatan/delete/{id}', 'KegiatanController@delete');

        Route::get('/dipa/dipa-output/{id}', 'OutputController@showPage');
        Route::get('/dipa/dipa-output/show/{id}', 'OutputController@show');
        Route::get('/dipa/dipa-output/get/{id}', 'OutputController@getOne');
        Route::post('/dipa/dipa-output/store', 'OutputController@store');
        Route::put('/dipa/dipa-output/update/{id}', 'OutputController@update');
        Route::delete('/dipa/dipa-output/delete/{id}', 'OutputController@delete');

        Route::get('/dipa/dipa-suboutput/{id}', 'SubOutputController@showPage');
        Route::get('/dipa/dipa-suboutput/show/{id}', 'SubOutputController@show');
        Route::get('/dipa/dipa-suboutput/get/{id}', 'SubOutputController@getOne');
        Route::post('/dipa/dipa-suboutput/store', 'SubOutputController@store');
        Route::put('/dipa/dipa-suboutput/update/{id}', 'SubOutputController@update');
        Route::delete('/dipa/dipa-suboutput/delete/{id}', 'SubOutputController@delete');

        Route::get('/dipa/dipa-komponen/{id}', 'KomponenController@showPage');
        Route::get('/dipa/dipa-komponen/show/{id}', 'KomponenController@show');
        Route::get('/dipa/dipa-komponen/get/{id}', 'KomponenController@getOne');
        Route::post('/dipa/dipa-komponen/store', 'KomponenController@store');
        Route::put('/dipa/dipa-komponen/update/{id}', 'KomponenController@update');
        Route::delete('/dipa/dipa-komponen/delete/{id}', 'KomponenController@delete');

        Route::get('/dipa/dipa-subkomponen/{id}', 'SubKomponenController@showPage');
        Route::get('/dipa/dipa-subkomponen/show/{id}', 'SubKomponenController@show');
        Route::get('/dipa/dipa-subkomponen/get/{id}', 'SubKomponenController@getOne');
        Route::post('/dipa/dipa-subkomponen/store', 'SubKomponenController@store');
        Route::put('/dipa/dipa-subkomponen/update/{id}', 'SubKomponenController@update');
        Route::delete('/dipa/dipa-subkomponen/delete/{id}', 'SubKomponenController@delete');

        Route::get('/dipa/dipa-akun/{id}', 'AkunController@showPage');
        Route::get('/dipa/dipa-akun/show/{id}', 'AkunController@show');
        Route::get('/dipa/dipa-akun/get/{id}', 'AkunController@getOne');
        Route::post('/dipa/dipa-akun/store', 'AkunController@store');
        Route::put('/dipa/dipa-akun/update/{id}', 'AkunController@update');
        Route::delete('/dipa/dipa-akun/delete/{id}', 'AkunController@delete');

        Route::get('/dipa/dipa-rincian/{id}', 'DetailAkunController@showPage');
        Route::get('/dipa/dipa-rincian/show/{id}', 'DetailAkunController@show');
        Route::get('/dipa/dipa-rincian/get/{id}', 'DetailAkunController@getOne');
        Route::post('/dipa/dipa-rincian/store', 'DetailAkunController@store');
        Route::put('/dipa/dipa-rincian/update/{id}', 'DetailAkunController@update');
        Route::delete('/dipa/dipa-rincian/delete/{id}/{id_akun}', 'DetailAkunController@delete');

        Route::get('/dipa/dipa-pembayaran/{id}/{id_akun}', 'PembayaranController@showPage');
        Route::post('/dipa/dipa-pembayaran/store', 'PembayaranController@storeOrUpdate');
        Route::get('/dipa/download/{id_pmb}/{url}','SyaratPembayaranController@download');
        //==============+++END SATUAN KERJA+++============//
     });
});
//==============+++END ADMIN+++============//

Auth::routes();
//==OVERIDE LOGOUT==//
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

Route::get('/tes','ProgramController@coba');
Route::get('/home', 'HomeController@index')->name('home');

//==============+++START PPK+++============//
Route::get('/dashboard-ppk', 'SppController@showPage');
Route::get('/ppk/show', 'SppController@show');

Route::get('/spp/{id}','SppController@getOne');
Route::post('/spp','SppController@store');
//==============+++END PPK+++============//

//==============+++START PPSPM+++============//
Route::get('/dashboard-ppspm', function () {
    return view('pages.ppspm.dashboard');
});
Route::get('/dipa-spm', 'SpmController@index');
Route::get('/spm/{id}', 'SpmController@show');
Route::put('/spm/{id}', 'SpmController@store');

Route::get('/dipa-sp2d', 'Sp2dController@index');
Route::get('/sp2d/{id}', 'Sp2dController@show');
Route::put('/sp2d/{id}', 'Sp2dController@store');
//==============+++END PPSPM+++============//

//==============+++START OPERATOR SIMAK+++============//
Route::get('/dashboard-simak', function () {
    return view('pages.operator_simak.dashboard');
});

Route::get('/sinkronisasi-simak', function () {
    return view('pages.operator_simak.sinkronisasi');
});
//==============+++END OPERATOR SIMAK+++============//

//==============+++START OPERATOR SAIBA+++============//
Route::get('/dashboard-saiba', function () {
    return view('pages.operator_saiba.dashboard');
});
Route::get('/sinkronisasi-saiba', function () {
    return view('pages.operator_saiba.sinkronisasi');
});
//==============+++END OPERATOR SAIBA+++============//

//==============+++START OPERATOR PERLENGKAPAN+++============//
Route::get('/dashboard-perlengkapan', function () {
    return view('pages.operator_perlengkapan.dashboard');
});
Route::get('/sinkronisasi-perlengkapan', function () {
    return view('pages.operator_perlengkapan.sinkronisasi');
});
//==============+++END OPERATOR PERLENGKAPAN+++============//

//==============+++START KPA+++============//
Route::get('/dashboard-kpa', function () {
    return view('pages.kpa.dashboard');
});
Route::get('/detail', function () {
    return view('pages.kpa.detail');
});
Route::get('/monitoring', function () {
    return view('pages.kpa.monitoring');
});
//==============+++END KPA+++============//

//==============+++START Bendahara+++============//
Route::get('/dashboard-bendahara', function () {
    return view('pages.bendahara.dashboard');
});
//==============+++END Bendahara+++============//
