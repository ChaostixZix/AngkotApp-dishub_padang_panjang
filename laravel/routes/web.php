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

Route::group([
    'prefix' => 'panel',
    'middleware' => ['cekSes']
    ], function (){

   Route::get('', 'panel@depan')->name('depanPanel');
   Route::get('updateprofil', 'panel@updateProfil')->name('updateProfil');


   Route::group([
       'prefix' => 'feature'
   ], function () {
       Route::post('getAduan', 'Feature\Pengaduan@getAduanById')->name('getAduan');
       Route::post('newAduan', 'Feature\Pengaduan@new')->name('aduanNew');
       Route::post('postnew', 'Feature\Post@new')->name('postNew');
       Route::post('postedit', 'Feature\Post@update')->name('postEdit');
   });

   Route::group([
       'prefix' => 'user'
   ], function () {
       Route::get('pengaduan', 'User\User@pengaduanPage')->name('aduanPageUser');
       Route::get('newAduan', 'Feature\Pengaduan@new')->name('newAduan');
   });

   Route::group([
       'prefix' => 'admin',
       'middleware' => ['fiturAdmin']
   ], function (){
       Route::get('post', 'Admin\Admin@postPage')->name('postAdmin');
       Route::get('aduan', 'Admin\Admin@aduanPage')->name('aduanPageAdmin');
   });

});