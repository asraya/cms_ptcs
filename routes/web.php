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
Route::get('elearn/{id}', 'ElearnController@show');
// Route::get('/role', 'PagesController@role');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/it_helpdesk')->name('api.it_helpdesk')->uses('HelpdeskRequestController@itdatatables');
Route::get('/it_helpdesk', 'PagesController@itdatatables');
Route::get('/it_helpdesk/create', 'HelpdeskRequestController@create')->name('it_helpdesk.create');

Route::get('/ga_helpdesk')->name('api.ga_helpdesk')->uses('HelpdeskRequestController@itdatatables');
Route::get('/ga_helpdesk', 'PagesController@gadatatables');
Route::get('/ga_helpdesk/create', 'HelpdeskRequestController@ga_create')->name('ga_helpdesk.create');

Route::get('/listitstock', 'PagesController@listdatatables');
Route::get('/create', 'ListItStockController@create')->name('listitstock.create');

Route::get('/spt_request', 'PagesController@spt_request');
Route::get('/spt')->name('api.spt')->uses('SptRequestController@datatables');
Route::get('/add_spt', 'PagesController@add_spt');
Route::post('/add_spt/send', 'SptRequestController@send');
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




// Route::get('/add_genreq', 'GeneralRequestController@create');

Route::get('/souvenir', 'PagesController@souvenirdatatables');
Route::post('invoicesouvenir', 'InvoiceController@createsouvenir')->name('invoice.createsouvenir');
Route::post('final_invoicesouvenir', 'InvoiceController@final_invoicesouvenir')->name('invoice.final_invoicesouvenir');
Route::get('print_souvenir/{id}', 'InvoiceController@print_souvenir')->name('invoice.print_souvenir');


Route::post('invoice', 'InvoiceController@create')->name('invoice.create');
Route::get('print/{id}', 'InvoiceController@print')->name('invoice.print');
Route::get('stockout-print/{stockout_id}', 'InvoiceController@stockout_print')->name('invoice.stockout_print');
Route::post('invoice-final', 'InvoiceController@final_invoice')->name('invoice.final_invoice');
Route::resource('stockout/pending','StockOutController');


Route::get('/add_genreq', 'ReqController@index');
Route::get('/add_genreq/edit/{id}', 'ReqController@edit')->name('req.edit');
Route::get('/add_genreq2', 'ReqController2@index');


Route::get('general_request_server/show/{gen_ticket}', 'GeneralRequestController@show')->name('genreq.show');
Route::get('general_request_server', 'GeneralRequestController@index')->name('stockout.pending');
Route::get('/general_request_server', 'PagesController@general_requestdatatables');
Route::get('/genreq')->name('api.general_request')->uses('GeneralRequestController@general_requestdatatables');

Route::get('general_request', 'StockOutController@index')->name('stockout.pending');
Route::put('stockout/update/', 'StockOutController@update')->name('stockout.update');
Route::get('stockout/show/{id}', 'StockOutController@show')->name('stockout.show');
Route::get('general_request/{id}', 'StockOutController@edit');

// Route::get('elearn/{id}', 'ElearnController@show');

Route::get('/pending')->name('api.pending_stockout')->uses('StockOutController@pending_stockout');

Route::get('stockout/approved', 'StockOutController@approved_stockout')->name('stockout.approved');
Route::get('stockout/confirm/{id}', 'StockOutController@stockout_confirm')->name('stockout.confirm');
Route::get('stockout/confirmGa/{id}', 'StockOutController@stockout_confirm_ga')->name('stockout.confirmGa');
Route::get('stockout/confirmMgr/{id}', 'StockOutController@stockout_confirm_mgr')->name('stockout.confirmMgr');
Route::delete('stockout/delete/{id}', 'StockOutController@destroy')->name('stockout.destroy');
Route::get('stockout/download/{id}', 'StockOutController@download')->name('stockout.download');

Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');

Route::get('/calendar', 'HomeController@calendarIndex');
Route::get('/calendar/all', 'HomeController@allCalendar');
Route::get('/calendar/delete/{id}', 'HomeController@deleteCalendar');
Route::post('/calendar/add', 'HomeController@storeCalendar');

// maintenance
Route::get('docapprove', 'DocApproveController@index')->name('docapprove.index');
Route::get('shipment', 'ShipmentController@index')->name('shipment.index');
Route::get('finger_data', 'FingerPrintController@index')->name('finger_data.index');
Route::get('crh', 'CorporateRateHotelController@index')->name('crh.index');
Route::get('psd', 'PSDController@index')->name('psd.index');
Route::get('hse', 'HSEreportController@index')->name('hse.index');
Route::get('ai_psg', 'AiPsgController@index')->name('ai_psg.index');

Route::get('meeting_room', 'MeetRoomController@index')->name('meeting_room.index');
Route::get('/meeting')->name('api.meeting_room')->uses('MeetRoomController@meeting_room');

Route::get('trip_request', 'TripRequestController@index')->name('trip_request.index');
Route::get('/trip')->name('api.trip_request')->uses('TripRequestController@trip_request');

//car
Route::get('car_request', 'CarRequestController@index')->name('car_request.index');
Route::get('/datatables_car_request')->name('api.datatables_car_request')->uses('CarRequestController@datatables_car_request');

Route::get('car_list', 'CarRequestController@car_list')->name('car_request.car_list');
Route::get('/datatables_car_list')->name('api.datatables_car_list')->uses('CarRequestController@datatables_car_list');

Route::get('driver_list', 'CarRequestController@driver_list')->name('car_request.driver_list');
Route::get('/datatables_driver_list')->name('api.datatables_driver_list')->uses('CarRequestController@datatables_driver_list');

Route::get('unlock_ER', 'CarRequestController@unlock_ER')->name('car_request.unlock_ER');
Route::get('/datatables_unlock_ER')->name('api.datatables_unlock_ER')->uses('CarRequestController@datatables_unlock_ER');

Route::get('schedule', 'CarRequestController@schedule')->name('car_request.schedule');
Route::get('/datatables_schedule')->name('api.datatables_schedule')->uses('CarRequestController@datatables_schedule');

Route::get('config', 'CarRequestController@config')->name('car_request.config');
Route::get('/datatables_config')->name('api.datatables_config')->uses('CarRequestController@datatables_config');

Route::get('config', 'CarRequestController@config')->name('car_request.config');

Route::get('car_allow', 'TaxiRequestController@car_allow')->name('car_request.car_allow');
Route::get('/datatables_car_allow')->name('api.datatables_car_allow')->uses('TaxiRequestController@datatables_car_allow');

});