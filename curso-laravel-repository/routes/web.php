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

Route::get('admin', function() {
})->name('admin');

Route::any('/admin/categorias/search', "Admin\CategoriaController@search")->name('categorias.search');
Route::resource('/admin/categorias', 'Admin\CategoriaController');

Route::any('/admin/produtos/search', 'Admin\ProdutoController@search')->name('produtos.search');
Route::resource('/admin/produtos', 'Admin\ProdutoController');