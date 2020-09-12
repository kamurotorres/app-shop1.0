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

Route::get('/', 'TestController@welcome');

//autenticacion
Auth::routes();
//rutas para el autocompletado
Route::get('/search','SearchController@show');
Route::get('/products/json','SearchController@data');


Route::get('/home', 'HomeController@index')->name('home');
//lo puede visualizar cualquier usuario
Route::get('/products/{id}','ProductController@show');
Route::get('/categories/{category}','CategoryController@show');



//añadir al cartdetalle
Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

//orden carrito
Route::post('/order','CartController@update');

//middleware para administrador

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
    //creacion del crud de productos
    Route::get('/products', 'ProductController@index'); // listar los productos
    Route::get('/products/create', 'ProductController@create'); //cargar el formulario
    Route::post('/products','ProductController@store'); // registrar la informacion base datos
//editar producto
//id es el parametro para saber q producto es e
    Route::get('/products/{id}/edit', 'ProductController@edit');
    Route::post('/products/{id}/edit','ProductController@update');
//eliminar un producto metodo DELETE
    Route::delete('/products/{id}','ProductController@destroy');

    //Rutas para la adicion de imagenes al producto
    Route::get('/products/{id}/images','ImageController@index'); //listar
    Route::post('/products/{id}/images','ImageController@store'); //guardar
    Route::delete('/products/{id}/images','ImageController@destroy'); //eliminar
    Route::get('/products/{id}/images/select/{image}','ImageController@select');


    //creacion del crud de categorias
    Route::get('/categories', 'CategoryController@index'); // listar los productos
    Route::get('/categories/create', 'CategoryController@create'); //cargar el formulario
    Route::post('/categories','CategoryController@store'); // registrar la informacion base datos
    //editar categorias
    //id es el parametro para saber q categorias es e
    Route::get('/categories/{id}/edit', 'CategoryController@edit');
    Route::post('/categories/{id}/edit','CategoryController@update');
    //eliminar un categorias metodo DELETE
    Route::delete('/categories/{id}','CategoryController@destroy');

});



