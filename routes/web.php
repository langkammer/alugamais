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

Route::get('/home', 'HomeController@index');


Route::resource('aluguel', 'AluguelController');
Route::resource('cliente', 'ClienteController');
Route::resource('contas', 'ContasController');
Route::resource('fatura', 'FaturaController');
Route::resource('contrato', 'ContratoController');

//Route::get('confirm', 'ClienteController@deleteConfirm');
Route::get('cliente/confirm/{cliente}', ['uses' => 'ClienteController@deleteConfirm', 'as' => 'cliente.confirmDelete']);
Route::get('aluguel/confirm/{aluguel}', ['uses' => 'AluguelController@deleteConfirm', 'as' => 'aluguel.confirmDelete']);
Route::get('contrato/confirm/{contrato}', ['uses' => 'ContratoController@deleteConfirm', 'as' => 'contrato.confirmDelete']);
Route::get('fatura/confirm/{fatura}', ['uses' => 'FaturaController@deleteConfirm', 'as' => 'fatura.confirmDelete']);
Route::get('contrato/getJson/{contrato}', ['uses' => 'ContratoController@showJson', 'as' => 'contrato.showJson']);
Route::post('fatura/lancarConta', ['uses' => 'FaturaController@lancarConta', 'as' => 'fatura.lancarConta']);
Route::get('fatura/itemFatura/{id}', ['uses' => 'FaturaController@itemFatura', 'as' => 'fatura.itemFatura']);
Route::post('fatura/finalizarFatura', ['uses' => 'FaturaController@finalizarFatura', 'as' => 'fatura.finalizarFatura']);
Route::post('fatura/inserirItemFatura', ['uses' => 'FaturaController@inserirItemFatura', 'as' => 'fatura.inserirItemFatura']);
Route::get('contas/getJson/{id}', ['uses' => 'ContasController@showJson', 'as' => 'contas.showJson']);


