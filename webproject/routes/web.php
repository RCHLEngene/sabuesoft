<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.auth');
});
Route::get('/admin', function () {
    return view('layouts.admin');
});

Auth::routes();
Route::resource('clientes', 'ClienteController');
Route::resource('sucursales', 'SedeController');
Route::resource('users', 'UserController');
Route::resource('bodega', 'BodegaController');
Route::resource('productos', 'ProductoController');
Route::resource('factura', 'FacturaController');

Route::get('/home', 'HomeController@index')->name('home');
