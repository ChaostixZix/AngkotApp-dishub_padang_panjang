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
    Route::get('a', function (){ return view('panel.public.angkot');})->name('publikAduan');
});

Route::group([
    'prefix' => 'panel',
    'middleware' => ['cekSes']
], function () {

    Route::get('', 'panel@depan')->name('depanPanel');
    Route::get('updateprofil', 'panel@updateProfil')->name('updateProfil');

    Route::get('test', 'User\User@test');


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
            Route::get('aduan', 'Admin\Admin@aduanPage')->name('aduanPageAdmin');

            Route::get('pesananderek', 'Admin\Admin@derekPesananPage')->name('derekPesananPageAdmin');

            Route::get('angkot', 'Admin\Admin@angkotPage')->name('angkotPageAdmin');
            Route::get('angkotupdate', 'Admin\Admin@angkotUpdatePage')->name('angkotUpdatePageAdmin');
        });

        Route::get('pesananparkir', 'Admin\Admin@parkirPesananPage')->name('parkirPesananPageAdmin');
        Route::get('pesananparkirsearch', 'Admin\Admin@parkirPesananSearchPage')->name('parkirPesananSearchPageAdmin');

    });

});
