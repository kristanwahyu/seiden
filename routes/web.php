<?php

Route::get('/', function () {
    return redirect('/login');
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
        Route::get('/tahun-anggaran/get/{id}','TahunAnggaranController@getOne');
        Route::put('/tahun-anggaran/aktif-toggle', 'TahunAnggaranController@aktifToggle');

        //negara
        Route::get('/negara', function () {
            return view('pages.admin.negara');
        });
        Route::get('/negara/show', 'kite_negara@show');
        Route::post('/negara/store', 'kite_negara@store');
        Route::put('/negara/update/{id}', 'kite_negara@update');
        Route::get('/negara/get/{id}','kite_negara@getOne');
        Route::delete('/negara/delete/{id}', 'kite_negara@delete');
        //endofnegara


        //kpbc
        Route::get('/kpbc', function () {
            return view('pages.admin.kpbc');
        });
        Route::get('/kpbc/show', 'KiteKpbcController@show');
        Route::post('/kpbc/store', 'KiteKpbcController@store');
        Route::put('/kpbc/update/{id}', 'KiteKpbcController@update');
        Route::get('/kpbc/get/{id}','KiteKpbcController@getOne');
        Route::delete('/kpbc/delete/{id}', 'KiteKpbcController@delete');
        //endofkppbc

        //Satuan KErjaz
        Route::get('/satuan-kerja', function () {
            return view('pages.admin.satuan_kerja');
        });
        Route::get('/satuan-kerja/show','SatuanKerjaController@show')->name('dashboarduser');
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

     Route::group(['middleware' => 'simak'], function () {
         //==============+++START OPERATOR SIMAK+++============//
        Route::get('/dashboard-simak', function () {
            return view('pages.operator_simak.dashboard');
        });

        Route::get('/dashboard-simak/show', 'SimakController@show');
        Route::get('/sinkronisasi-simak/{id}', 'SimakController@showdetail');
        Route::post('/sinkronisasi-simak', 'SimakController@store');

        //==============+++END OPERATOR SIMAK+++============//
     });

     Route::group(['middleware' => 'saiba'], function () {
         //==============+++START OPERATOR SAIBA+++============//
        Route::get('/dashboard-saiba', function () {
            return view('pages.operator_saiba.dashboard');
        });

        Route::get('/dashboard-saiba/show', 'SaibaController@show');
        Route::get('/sinkronisasi-saiba/{id}', 'SaibaController@showdetail');
        Route::post('/sinkronisasi-saiba', 'SaibaController@store');
        //==============+++END OPERATOR SAIBA+++============//

     });

     Route::group(['middleware' => 'ppk'], function () {
        //==============+++START PPK+++============//
        Route::get('/dashboard-ppk', 'SppController@showPage');
        Route::get('/ppk/show', 'SppController@show');

        Route::get('/spp/{id}','SppController@getOne');
        Route::post('/spp','SppController@store');
        //==============+++END PPK+++============//
     });

     Route::group(['middleware' => 'ppspm'], function () {
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
     });

     Route::group(['middleware' => 'bendahara'], function () {
        //==============+++START Bendahara+++============//
        Route::get('/dashboard-bendahara', function () {
            return view('pages.bendahara.dashboard');
        });
        Route::get('/dipa-bendahara/{jenis_pembayaran}', 'PembayaranController@bendahara');
        //==============+++END Bendahara+++============//
     });

     Route::group(['middleware' => 'perlengkapan'], function () {
        //==============+++START OPERATOR PERLENGKAPAN+++============//
        Route::get('/dashboard-perlengkapan', function () {
            return view('pages.operator_perlengkapan.dashboard');
        });
        Route::get('/dashboard-perlengkapan/show', 'PerlengkapanController@show');
        Route::get('/sinkronisasi-perlengkapan/{id}', 'PerlengkapanController@showdetail');
        Route::post('/sinkronisasi-perlengkapan', 'PerlengkapanController@store');
        //==============+++END OPERATOR PERLENGKAPAN+++============//
     });

     Route::group(['middleware' => 'kpa'], function () {
        //==============+++START KPA+++============//
        Route::get('/dashboard-kpa', function () {
            return view('pages.kpa.dashboard');
        });
        Route::get('/detail/{id}', 'KpaController@showPage');
        Route::get('/monitoring/{id}', 'KpaController@showPageDetail');
        Route::get('/monitoring/show/{id}','KpaController@monitoring');
        Route::get('/kpa/show/{id}', 'KpaController@show');
        //==============+++END KPA+++============//
     });
});
//OTHER
Route::get('/tahun/get', 'TahunAnggaranController@get');
Route::get('/satker/get', 'SatuanKerjaController@get');
Route::get('/program/get/{id_tahun}/{id_satker}', 'ProgramController@get');
Route::get('/kegiatan/get/{id_program}', 'KegiatanController@get');
Route::get('/output/get/{id_kegiatan}', 'OutputController@get');
Route::get('/suboutput/get/{id_output}', 'SubOutputController@get');
Route::get('/komponen/get/{id_sub_output}', 'KomponenController@get');
Route::get('/subkomponen/get/{id_komponen}', 'SubKomponenController@get');
Route::get('/akun/get/{id_sub_komponen}', 'AkunController@get');

Auth::routes();
//==OVERIDE LOGOUT==//
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', 'HomeController@index');













