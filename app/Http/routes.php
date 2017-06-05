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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/cadastrarvaga', ['as'=>'getcadastrarVaga', 'uses' => 'VagaController@getcadastrarvaga', 'middleware' => ['auth', 'admin']]);
Route::post('/cadastrarvaga', ['as'=>'postcadastrarVaga', 'uses' => 'VagaController@postcadastrarvaga', 'middleware' => ['auth', 'admin']]);
Route::get('/getcidades/{uf}', ['as'=>'getcidades', 'uses' => 'VagaController@getcidades', 'middleware' => ['auth', 'admin']]);
