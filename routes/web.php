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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/','MainController@home');

Route::resource('productos','ProductosController');
Route::resource('carro_usuario_compra_productos','Carro_usuario_comprasProductosController', [
    'only' => ['store', 'destroy']
]);
Route::get('/carrito','Carro_usuario_comprasController@index');
Route::post('/carrito','Carro_usuario_comprasController@checkout');
Route::get('/payments/store','PaymentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
