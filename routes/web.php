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
Route::get('/', function() {
    return redirect(route('login'));
});

Auth::routes();
    Route::group(['middleware' => 'auth'], function() {
   Route::get('logout', 'AuthController@logout')->name('logout');
   Route::resource('roles','RoleController');
   Route::resource('users','UserController');


Route::get('/elearn', 'PagesController@elearn');

// Route::get('/role', 'PagesController@role');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/it_helpdesk')->name('api.it_helpdesk')->uses('HelpdeskRequestController@itdatatables');
Route::get('/it_helpdesk', 'PagesController@itdatatables');

Route::get('/ga_helpdesk')->name('api.ga_helpdesk')->uses('HelpdeskRequestController@itdatatables');
Route::get('/ga_helpdesk', 'PagesController@gadatatables');

Route::get('/listitstock', 'PagesController@listdatatables');

Route::get('/spt_request', 'PagesController@spt_request');
Route::get('/spt')->name('api.spt')->uses('SptRequestController@datatables');
Route::get('/add_spt', 'PagesController@add_spt');


Route::get('/fbo', 'PagesController@fbodatatables');




Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// // Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');


Route::resource('cart', 'CartController');

Route::resource('customer', 'CustomerController');



//general req - stationary - souvenir
Route::get('/stationary', 'PagesController@stationarydatatables');
Route::get('/add_stationary', 'PagesController@add_stationary');


Route::get('/add_genreq', 'ReqController@index');


Route::get('/general_request', 'PagesController@general_requestdatatables');
// Route::get('/add_genreq', 'GeneralRequestController@create');

Route::get('/souvenir', 'PagesController@souvenirdatatables');

Route::post('invoice', 'InvoiceController@create')->name('invoice.create');
Route::get('print/{id}', 'InvoiceController@print')->name('invoice.print');
Route::get('stockout-print/{stockout_id}', 'InvoiceController@stockout_print')->name('invoice.stockout_print');
Route::post('invoice-final', 'InvoiceController@final_invoice')->name('invoice.final_invoice');

Route::get('stockout/show/{id}', 'StockOutController@show')->name('stockout.show');
Route::get('stockout/pending', 'StockOutController@pending_stockout')->name('stockout.pending');
Route::get('stockout/approved', 'StockOutController@approved_stockout')->name('stockout.approved');
Route::get('stockout/confirm/{id}', 'StockOutController@stockout_confirm')->name('stockout.confirm');
Route::delete('stockout/delete/{id}', 'StockOutController@destroy')->name('stockout.destroy');
Route::get('stockout/download/{id}', 'StockOutController@download')->name('stockout.download');

Route::resource('cart', 'CartController');

Route::post('invoice', 'InvoiceController@create')->name('invoice.create');
Route::get('print/{customer_id}', 'InvoiceController@print')->name('invoice.print');
Route::get('stockout-print/{stockout_id}', 'InvoiceController@stockout_print')->name('invoice.stockout_print');
Route::post('invoice-final', 'InvoiceController@final_invoice')->name('invoice.final_invoice');

});