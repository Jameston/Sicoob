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

Route::prefix('usuario')->group(function() {
    Route::middleware(['auth.check'])->group(function() {
        Route::get('/', 'UsuarioController@index');
        Route::post('/find', 'UsuarioController@find');
        Route::post('/create', 'UsuarioController@create');
        Route::post('/update', 'UsuarioController@update');
        Route::post('/delete', 'UsuarioController@destroy');
    });
});
