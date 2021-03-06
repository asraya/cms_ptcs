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

Route::middleware('auth:api')->get('/login', function (Request $request) {
    return $request->user();
});

// Route::get('/user')->name('api.user')->uses('UserController@datatables');

// Route::get('/spt')->name('api.spt')->uses('SptRequestController@datatables');
Route::get('/listitstock')->name('api.listitstock')->uses('ListItStockController@datatables');

Route::get('/it_helpdesk')->name('api.it_helpdesk')->uses('HelpdeskRequestController@itdatatables');

Route::get('/ga_helpdesk')->name('api.ga_helpdesk')->uses('HelpdeskRequestController@gadatatables');

Route::get('/elearn')->name('api.elearn')->uses('ElearnController@datatables');

//Route::get('/stockout/pending_data')->name('api.pending_stockout')->uses('StockOutController@pending_stockout');


Route::get('/stationary')->name('api.stationary')->uses('StationaryController@stationarydatatables');

Route::get('/souvenir')->name('api.souvenir')->uses('SouveneryController@souvenirdatatables');

// Route::get('/general_request')->name('api.general_request')->uses('GeneralRequestController@general_requestdatatables');

Route::get('/fbo')->name('api.fbo')->uses('FboRequestController@fbodatatables');
