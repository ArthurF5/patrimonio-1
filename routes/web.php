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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/sectors', 'SectorController', ['only' => ['index', 'store', 'update', 'delete']]);
Route::resource('/responsibles', 'ResponsibleController', ['only' => ['index', 'store', 'update', 'delete']]);
Route::resource('/roles', 'RoleController', ['only' => ['index', 'store', 'update', 'delete']]);
