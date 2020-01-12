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

Route::get('/', 'CadastrosController@index')->name('index');

Route::prefix('cadastro')->group(function () {

    Route::get('/', function () { return redirect('/'); });

    Route::prefix('clientes')->group(function () {

        Route::get('/', 'ClienteController@index')->name('cadastros.clientes.listar');

        Route::get('/cadastrar', 'ClienteController@cadastrar')->name('cadastros.clientes.cadastrar');

        Route::get('/editar', 'ClienteController@editar')->name('cadastros.clientes.editar');

        Route::post('/salvar', 'ClienteController@salvar')->name('cadastros.clientes.salvar');

        Route::get('/remover', 'ClienteController@remover')->name('cadastros.clientes.remover');

    });
});
