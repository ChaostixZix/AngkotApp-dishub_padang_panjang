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

   Route::get('/', 'panel@depan')->name('depanPanel');

   Route::group(['middleware' => ['fiturAdmin']], function (){
       Route::get('/post', 'Admin\Admin@postPage')->name('postAdmin');
       Route::post('/postnew', 'Admin\Post@new')->name('postNew');
       Route::post('/postedit', 'Admin\Post@update')->name('postEdit');
   });

});