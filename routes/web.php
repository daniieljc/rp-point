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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// DASHBOARD

Route::get('/dashboard/data', 'DashController@data')->name('dashboard.data');
Route::get('/dashboard/server/{id}', 'DashController@server')->name('dashboard.server');
Route::get('/dashboard/server/edit/{id}', 'DashController@edit')->name('dashboard.edit');
Route::post('/dashboard/server/update', 'DashController@update')->name('dashboard.update');

// SERVER

Route::get('/create-server', 'ServerController@create')->name('server.create')->middleware('auth');
Route::post('/server/save', 'ServerController@save')->name('server.save');
Route::get('/server/{id}', 'ServerController@server')->name('servers');
Route::get('/request-server', 'ServerController@request')->name('server.request');

// USUARIO

Route::get('/user/config', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');

// EMAIL

Route::post('/requestServer', 'EmailController@requestServer')->name('requestServer');
