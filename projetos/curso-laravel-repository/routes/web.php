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

Route::get('/', 'SiteController@index');

//Auth::routes(['register' => false]);//desabilita o registro automático, ou seja, os usuários não podem se registrar. Quando passa esse parametro com false.
Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {

    Route::any('categorias/search', "CategoriaController@search")->name('categorias.search');
    Route::resource('categorias', 'CategoriaController');

    Route::any('produtos/search', 'ProdutoController@search')->name('produtos.search');
    Route::resource('produtos', 'ProdutoController');

    Route::get('/', 'DashboardController@index')->name('admin');

    Route::any('usuarios/search', 'UsuarioController@search')->name('usuarios.search');
    Route::resource('usuarios', "UsuarioController");
//primeiro a rota search, depois os resources
});