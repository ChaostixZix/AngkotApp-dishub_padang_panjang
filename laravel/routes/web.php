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

Route::group(['prefix' => '/'], function () {
//    Route::get('', 'publik@depan')->name('depanPublik');
    Route::get('', function () {
        return redirect(route('loginPage'));
    })->name('depanPublik');
});


Route::group(['middleware' => ['isNotLogin']], function () {
    Route::get('login', 'panelAuth@loginPage')->name('loginPage');
    Route::get('register', 'panelAuth@registerPage')->name('registerPage');
    Route::post('loginpost', 'panelAuth@login')->name('login');
    Route::post('registerajax', 'Feature\Auth@registerAjax')->name('registerAjax');
});

Route::get('logout', 'panelAuth@logout')->name('logout');

Route::group(['prefix' => 'publik'], function () {
    Route::get('aduan', 'publik@aduan')->name('publikAduan');
    Route::get('angkot', 'publik@angkot')->name('publikAngkot');
    Route::get('verifyFirst', function (){ return view('panel.auth.verifyFirst');})->name('verifyFirst');
});

Route::group([
    'prefix' => 'panel',
    'middleware' => ['cekSes']
], function () {

    Route::get('', 'panel@depan')->name('depanPanel');
    Route::get('updateprofil', 'panel@updateProfil')->name('updateProfil');

    Route::get('test', function (){
        return view('mail.invoice');
    });


    Route::group([
        'prefix' => 'feature'
    ], function () {
        //Profil
        Route::post('profilUpdate', 'Feature\Profil@update')->name('profilUpdate');
        Route::get('profilBuat', 'Feature\Profil@buat')->name('profilBuat');

        //Aduan
        Route::post('getAduan', 'Feature\Pengaduan@getAduanById')->name('getAduan');
        Route::post('deleteAduan', 'Feature\Pengaduan@delete')->name('deleteAduan');
        Route::post('newAduan', 'Feature\Pengaduan@new')->name('aduanNew');

        //POST
        Route::post('postnew', 'Feature\Post@new')->name('postNew');
        Route::post('postedit', 'Feature\Post@update')->name('postEdit');

        //DEREK
        Route::post('derekNew', 'Feature\Derek@pesanDerek')->name('derekNew');
        Route::get('derekChangeStatus/{id?}/{status?}/{supir?}', 'Feature\Derek@changeStatusDerek')->name('derekChangeStatus');
        Route::get('getharga', 'Feature\Derek@getHarga')->name('getHargaDerek');
        Route::get('getjarak', 'Feature\Derek@getJarak')->name('getJarakDerek');
        Route::get('getinfooforigins', 'Feature\Derek@getInfoOfOrigins')->name('getInfoOfOrigins');

        //Parkir
        Route::post('parkirNew', 'Feature\Parkir@pesan')->name('parkirNew');
        Route::get('parkirFinish/{id?}', 'Feature\Parkir@finishParkir')->name('parkirSelesai');
        Route::get('parkirAjaxSearch/{plat_nomor?}', 'Feature\Parkir@ajaxSearchPage')->name('parkirAjaxSearch');
        Route::get('getjarakparkir', 'Feature\Parkir@getJarak')->name('getJarakParkir');

        //Angkot
        Route::get('getsupirprofil/{id?}', 'Feature\Angkot@getSupirData')->name('getSupirDataAngkot');
        Route::get('getjurusandetail/{id?}', 'Feature\Angkot@getJurusanData')->name('getJurusanDataAngkot');
        Route::post('angkotsubmit', 'Feature\Angkot@update')->name('submitAngkot');
        Route::post('angkotcreate', 'Feature\Angkot@create')->name('createAngkot');
        Route::get('getdataangkot/{id?}', 'Feature\Angkot@getData')->name('getAngkot');
        Route::get('angkotdelete/{id?}', 'Feature\Angkot@delete')->name('deleteAngkot');

        //Jurusan
        Route::post('jurusansubmit', 'Feature\Jurusan@update')->name('submitJurusan');
        Route::post('jurusancreate', 'Feature\Jurusan@create')->name('createJurusan');
        Route::get('getdatajurusan/{id?}', 'Feature\Jurusan@getData')->name('getJurusan');
        Route::get('jurusandelete/{id?}', 'Feature\Jurusan@delete')->name('deleteJurusan');

    });

    Route::group([
        'prefix' => 'user',
        'middleware' => 'cekProfil'
    ], function () {
        Route::get('pengaduan', 'User\User@pengaduanPage')->name('aduanPageUser');
        //Route::get('newAduan', 'Feature\Pengaduan@new')->name('newAduan');

        //Derek
        Route::get('pesanderek', 'User\User@derekPage')->name('derekPage');
        Route::get('invoicederek/{id?}', 'Feature\Derek@invoicePage')->name('derekInvoicePage');

        //Parkir
        Route::get('pesanparkir', 'User\User@parkirPage')->name('parkirPage');
        Route::get('invoiceparkir/{id?}', 'Feature\Parkir@invoicePage')->name('parkirInvoicePage');

    });

    Route::group([
        'prefix' => 'admin',
        'middleware' => ['fiturRestricted']
    ], function () {

        Route::group([
            'middleware' => ['fiturAdmin']
        ], function () {
            Route::get('post', 'Admin\Admin@postPage')->name('postAdmin');
            Route::get('userlist', 'Admin\Admin@userListPage')->name('userAdmin');
            Route::get('aduan', 'Admin\Admin@aduanPage')->name('aduanPageAdmin');

            Route::get('verifyakun/{id?}/{status?}', 'Feature\Auth@verify')->name('verifyAdmin');

            Route::get('pesananderek', 'Admin\Admin@derekPesananPage')->name('derekPesananPageAdmin');

            Route::get('angkot', 'Admin\Admin@angkotPage')->name('angkotPageAdmin');
            Route::get('angkotupdate/{id?}', 'Admin\Admin@angkotUpdatePage')->name('angkotUpdatePageAdmin');

            Route::get('jurusan', 'Admin\Admin@jurusanPage')->name('jurusanPageAdmin');
            Route::get('jurusanupdate/{id?}', 'Admin\Admin@jurusanUpdatePage')->name('jurusanUpdatePageAdmin');
        });

        Route::get('angkotgantijurusan/{id_angkot?}/{id_jurusan?}', 'Feature\Angkot@gantiJurusan')->name('gantiJurusan');
        Route::get('pesananparkir', 'Admin\Admin@parkirPesananPage')->name('parkirPesananPageAdmin');
        Route::get('pesananparkirsearch', 'Admin\Admin@parkirPesananSearchPage')->name('parkirPesananSearchPageAdmin');

    });

});
