<?php
use Illuminate\Routing\RouteGroup;

Route::get('/', function () {return view('auth.login');});
Route::get('/login', "AuthenticateController@login")->name('login');
Route::get('/logout', "AuthenticateController@logout")->name('logout');
Route::post('/auth', "AuthenticateController@auth")->name('auth');

Route::get('/intrasocial', "IntrasocialController@index")->name('intrasocial')->middleware('auth');
Route::resource('posts', 'PostsController');
Route::resource('coments', 'ComentsController');
Route::resource('users', 'UsersController');

Route::get('messages', 'MessagesController@fetchMessages')->name('fetchMessages');
Route::post('/sendMessage', 'MessagesController@sendMessage')->name('sendMessage');
Route::resource('messages', 'MessagesController');


// Route::get('/portalrh', "AuthenticateController@intrasocial")->name('intrasocial')->middleware('auth');
// Route::get('/ouvidoria', "AuthenticateController@intrasocial")->name('intrasocial')->middleware('auth');
