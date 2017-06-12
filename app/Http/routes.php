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

Route::auth();

Route::get('/', 'HomeController@index');

Route::get('/cadastrarvaga', ['as'=>'getcadastrarVaga', 'uses' => 'VagaController@getcadastrarvaga', 'middleware' => ['auth', 'admin']]);
Route::post('/cadastrarvaga', ['as'=>'postcadastrarVaga', 'uses' => 'VagaController@postcadastrarvaga', 'middleware' => ['auth', 'admin']]);
Route::get('/getcidades/{uf}', ['as'=>'getcidades', 'uses' => 'VagaController@getcidades', 'middleware' => ['cors']]);
Route::get('/getestados', ['as'=>'getestados', 'uses' => 'VagaController@getestados', 'middleware' => ['cors']]);
Route::options('/getestados', ['as'=>'getestados', 'uses' => 'VagaController@getestados', 'middleware' => ['cors']]);
Route::get('/getvagas/{txt?}', ['as'=>'getvagas', 'uses' => 'VagaController@getvagas']);
Route::get('/registrarcv', ['as'=>'registrarcv', 'uses' => 'CurriculoController@getregistrarcv']);
Route::post('/registrarcv', ['as'=>'registrarcv', 'uses' => 'CurriculoController@postregistrarcv']);
Route::get('/enviarcv/{id}', ['as'=>'enviarcv', 'uses' => 'CurriculoController@enviarcv']);
Route::get('/vaga/{id}', ['as'=>'vaga', 'uses' => 'VagaController@vaga']);
Route::get('/candidato/{id}', ['as'=>'candidato', 'uses' => 'CurriculoController@perfil']);