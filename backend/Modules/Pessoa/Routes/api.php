<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('pessoa')->group(function() {
    Route::get('/', 'PessoaController@index');
    Route::post('/find', 'PessoaController@find');
    Route::post('/nome', 'PessoaController@getByNome'); 
    Route::post('/codigo', 'PessoaController@getByCodigo');
    Route::post('/tipo', 'PessoaController@getPessoaTipo');
    Route::post('/create', 'PessoaController@create');
    Route::post('/update', 'PessoaController@update');
    Route::post('/delete', 'PessoaController@destroy');
});
