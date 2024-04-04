<?php

use Illuminate\Support\Facades\Auth;

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

Route::prefix('autenticacao')->group(function() {
    Route::post('/', 'AutenticacaoController@index');
    Route::group(['middleware' => ['auth:api']], function() {
        Route::post('/logout', 'AutenticacaoController@logout');
        Route::get('/dados', 'AutenticacaoController@dados');
    });
});
