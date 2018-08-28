<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index'); //listar productos

Route::get('/admin/products/create', 'ProductController@create'); //formulario de registro
Route::post('/admin/products', 'ProductController@store'); //registrar
Route::get('/admin/products/{id}/edit', 'ProductController@edit'); //formulario de edición
Route::post('/admin/products/{id}/edit', 'ProductController@update'); //actualizar
Route::post('/admin/products/{id}/delete', 'ProductController@destroy'); //form eliminar

// CR
// UD
