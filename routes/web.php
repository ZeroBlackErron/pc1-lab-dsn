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

Route::get('/', 'MainController@login')->name('login');

Route::post('/session/start', 'MainController@startSession')->name('session.start');
Route::get('/session/finish', 'MainController@finishSession')->name('session.finish');

Route::get('/productos', 'ProductsController@index')->name('list.products');

Route::post('/producto/buscar', 'ProductsController@search')->name('search.product');
Route::get('/productos/{slug}', 'ProductsController@show')->name('show.product');

Route::get('/producto/nuevo', 'ProductsController@create')->name('create.product');
Route::post('/producto/crear', 'ProductsController@store')->name('store.product');

Route::get('/producto/editar/{id}', 'ProductsController@edit')->name('edit.product');
Route::post('/producto/actualizar/{id}', 'ProductsController@update')->name('update.product');

Route::get('/producto/eliminar/{id}', 'ProductsController@destroy')->name('delete.product');
