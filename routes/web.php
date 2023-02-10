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

Route::get('/', '\App\Http\Controllers\PagamentoController@index')->name('index');
Route::get('/cartao', '\App\Http\Controllers\PagamentoController@cartao')->name('cartao');
Route::get('/boleto', '\App\Http\Controllers\PagamentoController@boleto')->name('boleto');
Route::get('/obrigado/{id}', '\App\Http\Controllers\PagamentoController@obrigado')->name('obrigado');
Route::post('/pagamento', '\App\Http\Controllers\PagamentoController@pagamento')->name('pagamento');
