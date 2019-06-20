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

Auth::routes();
Route::get('/',['as'=>'beers.home', 'uses'=>'HomeController@index']);
Route::get('/',['as'=>'beers.home', 'uses'=>'PunkController@index']);
Route::get('beer/{id}',['as'=>'beers.beer', 'uses'=>'PunkController@show']);
Route::get('beerName',['as'=>'beers.name', 'uses'=>'PunkController@beerName']);

Route::get('perfil/{id}',['as'=>'user.perfil', 'uses'=>'UserController@edit']);
Route::put('perfil/update/{id}',['as'=>'user.update', 'uses'=>'UserController@update']);
