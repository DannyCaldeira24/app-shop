<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search','SearchController@show');
Route::get('/products/json','SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}','CategoryController@show');

Route::middleware(['auth'])->group(function(){
	Route::get('/user/edit', 'UserController@image');
	Route::post('/update/avatar','UserController@update_avatar');
	Route::get('/edit_user', 'UserController@index');
	Route::post('/modify_user','UserController@edit');
	Route::get('/change_password','UserController@showpassform');
	Route::post('/change_password/process','UserController@update_password');

	Route::get('/order/trans/{id}', 'UserController@img_trans');
	Route::post('/up', 'UserController@update_trans');
});

Route::middleware(['cart'])->group(function () {
	Route::post('/cart', 'CartDetailController@store');
	Route::delete('/cart', 'CartDetailController@destroy');
	Route::delete('/destroy/order', 'CartDetailController@destroyorder');
	Route::post('/order', 'CartController@update');
});	

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products', 'ProductController@index'); //listar productos

	Route::get('/products/create', 'ProductController@create'); //formulario de registro
	Route::post('/products', 'ProductController@store'); //registrar
	Route::get('/products/{id}/edit', 'ProductController@edit'); //formulario de edición
	Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
	Route::post('/products/{id}/delete', 'ProductController@destroy'); //form eliminar
	Route::get('/products/{id}/images', 'ImageController@index'); //listado
	Route::post('/products/{id}/images', 'ImageController@store'); //registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); //form eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //Elegir imagen fav por producto

	Route::get('/categories', 'CategoryController@index'); 
	Route::get('/categories/create', 'CategoryController@create'); 
	Route::post('/categories', 'CategoryController@store'); 
	Route::get('/categories/{id}/edit', 'CategoryController@edit'); 
	Route::post('/categories/{id}/edit', 'CategoryController@update');
	Route::post('/categories/{id}/delete', 'CategoryController@destroy');

	Route::get('/orders', 'OrderController@show');
	Route::get('/orders/{id}', 'OrderController@order');
	Route::post('/order/accepted/{id}', 'OrderController@accept');
	Route::post('/order/reject/{id}', 'OrderController@reject');
	Route::post('/order/finish/{id}', 'OrderController@finish');
	Route::post('/order/delete/{id}', 'OrderController@delete');
	Route::post('/order/pending/{id}', 'OrderController@pending');
});
