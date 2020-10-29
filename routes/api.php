<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', 'Api\\AuthController@login');
Route::post('transacao/deposito', 'Transacoes\\TransacaoController@deposito');

Route::group(['middleware' => ['apiJwt']], function () {
	Route::get('users', 'Api\\UserController@index');
    Route::get('transacao/extrato', 'Transacoes\\TransacaoController@index');
	Route::get('transacao/saldo', 'Transacoes\\TransacaoController@saldo');
	Route::get('transacao/transferencia', 'Transacoes\\TransacaoController@transferencia');
	Route::post('transacao/saque', 'Transacoes\\TransacaoController@saque');
});
