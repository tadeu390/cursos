<?php

/* Route::get('categories', 'Api\CategoryController@index');
Route::post('categories', 'Api\CategoryController@store');
Route::put('categories/{id}', 'Api\CategoryController@update');
Route::delete('categories/{id}', 'Api\CategoryController@destroy'); */

Route::post('auth', 'Auth\AuthApiController@authenticate');
Route::get('user', 'Auth\AuthApiController@getAuthenticatedUser');
Route::post('auth-refresh', 'Auth\AuthApiController@refreshToken');

Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1', 'middleware' => 'auth:api'], function() {

    Route::get('categories/{id}/products', 'CategoryController@products');
    Route::apiResource('categories', 'CategoryController');
    //implementa apenas os métodos usados em apí, ignorando assim o create e o edit

    Route::apiResource('products', 'ProductController');
});

