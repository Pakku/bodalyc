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

Route::get('/', 'Auth\Guests\LoginController@showLoginForm')->name('main');

Route::post('/guestlogin', 'Auth\Guests\LoginController@login')->name('guestlogin');

Auth::routes();

Route::get('/app', function() {
	return "En construcción";
})->name('main-app');

Route::get('/gestion', 'HomeController@index')->name('home');

Route::prefix('gestion')->group(function () {
    Route::resource('invitations', 'InvitationCRUDController')->middleware('admin-auth');
    Route::resource('users', 'UserController')->middleware('admin-auth')->except([
		    'create', 'store'
		]);
});

Route::get('/{invitation}', 'InvitationController@index')->name('invitation');