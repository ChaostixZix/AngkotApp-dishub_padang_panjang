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

Route::group(['prefix' => '/'], function ()
{
    Route::get('', 'publik@depan')->name('depanPublik');
});


Route::group(['middleware' => ['isNotLogin']], function ()
{
    Route::get('login', 'panelAuth@loginPage')->name('loginPage');
    Route::post('loginpost', 'panelAuth@login')->name('login');
});

Route::get('logout', 'panelAuth@logout')->name('logout');

Route::group(['prefix' => 'publik'], function ()
{
    Route::get('aduan', 'publik@aduan')->name('publikAduan');
});

Route::group([
    'prefix' => 'panel',
    'middleware' => ['cekSes']
    ], function (){

   Route::get('', 'panel@depan')->name('depanPanel');
   Route::get('updateprofil', 'panel@updateProfil')->name('updateProfil');

   Route::get('test', 'Feature\Derek@test');


   Route::group([
       'prefix' => 'feature'
   ], function () {
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
   });

   Route::group([
       'prefix' => 'user'
   ], function () {
       Route::get('pengaduan', 'User\User@pengaduanPage')->name('aduanPageUser');
       //Route::get('newAduan', 'Feature\Pengaduan@new')->name('newAduan');

       //Derek
       Route::get('pesanderek', 'User\User@derekPage')->name('derekPage');
       Route::get('invoicederek/{id?}', 'Feature\Derek@invoicePage')->name('derekInvoicePage');
   });

   Route::group([
       'prefix' => 'admin',
       'middleware' => ['fiturAdmin']
   ], function (){
       Route::get('post', 'Admin\Admin@postPage')->name('postAdmin');
       Route::get('aduan', 'Admin\Admin@aduanPage')->name('aduanPageAdmin');

       Route::get('pesananderek', 'Admin\Admin@derekPesananPage')->name('derekPesananPageAdmin');

   });

});
