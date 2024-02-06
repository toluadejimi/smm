<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('v1', 'ApiController@process')->name('api.v1');


Route::get('process-request', 'ApiController@process_request')->name('api.process-request');
Route::get('process-info', 'ApiController@process_info')->name('api.process-request');



Route::any('e-fund',  [ApiController::class,'e_fund']);
Route::any('e-check',  [ApiController::class,'e_check']);






