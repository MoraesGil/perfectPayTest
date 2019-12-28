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

Route::get('/costumers', 'CostumerController@index');

Route::resource('/products', 'ProductController', ['only' => ['update']]);
Route::resource('/costumers/{costumer_id}/sales', 'CostumerSalesController', ['only' => ['index','update','store']]);
Route::get('/costumers/{costumer_id}/sales-results', 'CostumerSalesController@results');

