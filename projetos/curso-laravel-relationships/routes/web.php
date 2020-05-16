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

Route::get('oneToOne', 'OneToOneController@oneToOne');
Route::get('inverse', 'OneToOneController@inverse');
Route::get('oneToOneInsert', 'OneToOneController@oneToOneInsert');
Route::get('oneToMany', 'OneToManyController@oneToMany');
Route::get('manyToOne', 'OneToManyController@manyToOne');
Route::get('oneToManyInsert', 'OneToManyController@oneToManyInsert');
Route::get('hasManyThrough', 'OneToManyController@hasManyThrough');
Route::get('manyToMany', 'ManyToManyController@manyToMany');
Route::get('manyToManyInverse', 'ManyToManyController@manyToManyInverse');
Route::get('manyToManyInsert', 'ManyToManyController@manyToManyInsert');
Route::get('polymorphic', 'PolymorphicController@polymorphic');
Route::get('polymorphicInsert', 'PolymorphicController@polymorphicInsert');
