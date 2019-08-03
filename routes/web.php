<?php
use Illuminate\Routing\RouteGroup;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', "AuthenticateController@login")->name('login');
Route::get('/logout', "AuthenticateController@logout")->name('logout');
Route::post('/auth', "AuthenticateController@auth")->name('auth');

Route::get('/intrasocial', "AuthenticateController@intrasocial")->name('intrasocial')->middleware('auth');


// Route::get('/portalrh', "AuthenticateController@intrasocial")->name('intrasocial')->middleware('auth');

// Route::get('/ouvidoria', "AuthenticateController@intrasocial")->name('intrasocial')->middleware('auth');
