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
	
	$this->get('/home', 'HomeController@index')->name('home');

	$this->resource('/setores', 'SetorController', ['only' => ['index', 'show' ,'store', 'update', 'destroy']]);
	$this->resource('/responsaveis', 'ResponsavelController', ['only' => ['index', 'show' ,'store', 'update', 'destroy']]);
	$this->resource('/cargos', 'CargoController', ['only' => ['index', 'show' ,'store', 'update', 'destroy']]);
	$this->resource('/materiais', 'MaterialController', ['only' => ['index', 'show' ,'store', 'update', 'destroy']]);
	$this->post('/materiais/exchange', 'MaterialController@exchange')->name('materiais.exchange');

	/**
	 * Rotas para Ajax
	 */
	
	Route::get('/materiais/servidores-setor/', 'MaterialController@AjaxServidoresPorSetor')->name('ajax.servidores.por.setor');
	
});
