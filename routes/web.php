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


//PUBLIC ROUTES
Route::get('/', function () {
    return view('home');
});
Route::get('/register', 'AuthenticationController@registerIndex');
Route::post('/register', 'SignupController@register');
Route::get('/signin', 'LoginController@index');
Route::post('/signin', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::post('/transactions/callback', 'TransactionsController@callback');

//LOGGED IN USER ROUTES
Route::middleware(['auth'])->group(function() {
	Route::get('/profile/incomplete', 'DashboardController@incompleteIndex');
	Route::post('/profile/incomplete/submit', 'IncompleteProfileController@submit');
	Route::middleware(['incomplete-profile'])->group(function() {
		Route::get('/profile', 'DashboardController@profileIndex');
		Route::get('/profile/edit', 'DashboardController@profileUpdateIndex');
		Route::post('/profile/personal/update', 'ProfileUpdateController@updatePersonal');
		Route::post('/profile/emergency/update', 'ProfileUpdateController@updateEmergency');
		Route::get('/events', 'DashboardController@eventIndex');
		Route::get('/transactions', 'TransactionsController@index');
		Route::get('/transactions/new', 'TransactionsController@newIndex');
		Route::post('/transactions/new', 'TransactionsController@new');
		Route::get('/transaction/expired', 'TransactionsController@expired');
		
	});
});


