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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/clients', 'ClientsController@index');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients/store', 'ClientsController@store');
Route::get('/clients/{client}', 'ClientsController@edit');
Route::patch('/clients/update/{client}', 'ClientsController@update');
Route::delete('/clients/{client}', 'ClientsController@destroy');

Route::post('/clients/{client}/phones', 'PhonesController@store');
Route::delete('/phones/{phone}', 'PhonesController@destroy');
Route::post('/phones/{phone}', 'PhonesController@update');
