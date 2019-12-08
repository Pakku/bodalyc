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

Route::get('/', 'InvitationController@index');

Auth::routes();

Route::get('/gestion', 'HomeController@index')->name('home');

Route::prefix('gestion')->group(function () {
    Route::resource('invitations', 'InvitationCRUDController');
});

Route::get('/{invitation}', 'InvitationController@index')->name('invitation');