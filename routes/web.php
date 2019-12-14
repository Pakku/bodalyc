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

Route::get('/', function() {
	return "En construcción";
})->name('main');



Auth::routes();


Route::get('/gestion', 'HomeController@index')->name('home');

Route::prefix('gestion')->group(function () {
    Route::resource('invitations', 'InvitationCRUDController')->middleware('auth');
});

Route::get('/{invitation}', 'InvitationController@index')->name('invitation');