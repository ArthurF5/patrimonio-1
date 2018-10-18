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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {

	/**
	 * Rotas básicas do sistema
	 */
	
	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('/setores', 'SetorController', ['only' => ['index', 'store', 'update', 'destroy']]);
	Route::resource('/responsaveis', 'ResponsavelController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	Route::resource('/cargos', 'CargoController', ['only' => ['index', 'store', 'update', 'destroy']]);
	Route::resource('/materiais', 'MaterialController', ['only' => ['index', 'store', 'update', 'destroy']]);

	/**
	 * Rotas para Ajax
	 */
	
	Route::get('/materiais/servidores-setor/', 'MaterialController@AjaxServidoresPorSetor')->name('ajax.servidores.por.setor');
	
});
