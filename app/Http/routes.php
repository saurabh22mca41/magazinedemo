<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'CategoryController@getIndex');

Route::any('magazines', 'MagazineController@getIndex');
Route::any('magazine/add', 'MagazineController@addMagazine');
Route::any('magazine/{id}/edit', 'MagazineController@editMagazine')->where('id', '[a-zA-Z=_0-9.]+');
Route::any('magazine/{id}/delete', 'MagazineController@deleteMagazine')->where('id', '[a-zA-Z=_0-9.]+');

Route::any('categories', 'CategoryController@getIndex');
Route::any('category/add', 'CategoryController@addCategory');
Route::any('category/{id}/edit', 'CategoryController@editCategory')->where('id', '[a-zA-Z=_0-9.]+');
Route::any('category/{id}/delete', 'CategoryController@deleteCategory')->where('id', '[a-zA-Z=_0-9.]+');