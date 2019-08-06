<?php
use Illuminate\Routing\RouteGroup;

Route::get('/', function () {return view('auth.login');});
Route::get('/login', "AuthenticateController@login")->name('login');
Route::get('/logout', "AuthenticateController@logout")->name('logout');
Route::post('/auth', "AuthenticateController@auth")->name('auth');

Route::get('/intrasocial', "IntrasocialController@index")->name('intrasocial')->middleware('auth');
Route::resource('posts', 'PostsController');
Route::resource('coments', 'ComentsController');

// Route::get('/portalrh', "AuthenticateController@intrasocial")->name('intrasocial')->middleware('auth');
// Route::get('/ouvidoria', "AuthenticateController@intrasocial")->name('intrasocial')->middleware('auth');
