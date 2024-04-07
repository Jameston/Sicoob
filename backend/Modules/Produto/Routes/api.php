<?php

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

//Route::middleware('auth.check')->group(function() {
    Route::prefix('produto')->group(function() {
        Route::get('/', 'ProdutoController@index');
        Route::post('/find', 'ProdutoController@find');
        Route::post('/delete', 'ProdutoController@destroy');
        Route::post('/update', 'ProdutoController@update');
        Route::post('/create', 'ProdutoController@create');
        Route::post('/codigo', 'ProdutoController@getByCodigo');
        Route::prefix('unidade-medidas')->group(function() {
            Route::get('/', 'ProdutoUnidadeMedidasController@paginate');
            Route::post('/find', 'ProdutoUnidadeMedidasController@find');
            Route::post('/delete', 'ProdutoUnidadeMedidasController@destroy');
            Route::post('/update', 'ProdutoUnidadeMedidasController@update');
            Route::post('/create', 'ProdutoUnidadeMedidasController@create');
            Route::post('/codigo', 'ProdutoUnidadeMedidasController@getByCodigo');
            Route::post('/all', 'ProdutoUnidadeMedidasController@index');
        });
        Route::prefix('grupos')->group(function() {
            Route::get('/', 'ProdutoGruposController@paginate');
            Route::post('/all', 'ProdutoGruposController@index');
            Route::post('/find', 'ProdutoGruposController@find');
            Route::post('/delete', 'ProdutoGruposController@destroy');
            Route::post('/update', 'ProdutoGruposController@update');
            Route::post('/create', 'ProdutoGruposController@create');
            Route::post('/codigo', 'ProdutoGruposController@getByCodigo');
            
        });
    });
//});
