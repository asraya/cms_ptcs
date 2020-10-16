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
Route::group(array('middleware' => 'auth'), function()
{

    Route::get('/customer', [
        'as'	=>	'dashboard',
        'uses' 	=>	'CustomerController@show'
    ]);

});


// Order Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::post('/orderProduct', [
        'as'	=>	'product.order',
        'uses' 	=>	'OrderController@productOrder'
    ]);

    Route::post('/payment', [
        'as'	=>	'product.payment',
        'uses' 	=>	'OrderController@payment'
    ]);

    Route::get('/remove/product/{id}', [
        'as'	=>	'product.remove',
        'uses' 	=>	'OrderController@remove'
    ]);

});


// Invoice Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/showInvoice/{id}', [
        'as'	=>	'invoice.show',
        'uses' 	=>	'InvoiceController@show'
    ]);


    Route::get('/pdfview/{id}', [
        'as'	=>	'pdfview',
        'uses' 	=>	'InvoiceController@pdf'
    ]);

});



// Profile Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/dash/{id}', [
        'as'	=>	'dash',
        'uses' 	=>	'ProfileController@show'
    ]);

    Route::get('/edit_profile', [
        'as'	=>	'editProfile',
        'uses' 	=>	'ProfileController@update'
    ]);

    Route::post('/edit/{id}', [
        'as'	=>	'profile.update',
        'uses' 	=>	'ProfileController@edit'
    ]);


});


// customer Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/customers', [
        'as'	=>	'customers.index',
        'uses' 	=>	'CustomerController@index'
    ]);

    Route::get('/addcustomers', [
        'as'	=>	'customers.add',
        'uses' 	=>	'CustomerController@create'
    ]);

    Route::post('/addcustomers', [
        'as'	=>	'customers.store',
        'uses' 	=>	'CustomerController@store'
    ]);


});


// Product Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/product', [
        'as'	=>	'product.index',
        'uses' 	=>	'ProductController@index'
    ]);

    Route::post('/product', [
        'as'	=>	'product.store',
        'uses' 	=>	'ProductController@store'
    ]);

    Route::get('/update/product/{id}', [
        'as'	=>	'product.update',
        'uses' 	=>	'ProductController@update'
    ]);

    Route::post('/update/product/{id}', [
        'as'	=>	'product.edit',
        'uses' 	=>	'ProductController@edit'
    ]);

    Route::get('/product/delete/{id}', [
        'as'	=>	'product.delete',
        'uses' 	=>	'ProductController@destroy'
    ]);


});


// Sell Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/sales', [
        'as'	=>	'sales.index',
        'uses' 	=>	'SaleController@index'
    ]);

    Route::post('/cart', [
        'as'	=>	'sale.store',
        'uses' 	=>	'SaleController@store'
    ]);

    Route::get('/update/product/{id}', [
        'as'	=>	'product.update',
        'uses' 	=>	'ProductController@update'
    ]);

    Route::post('/sale/delete/{id}', [
        'as'	=>	'sale.delete',
        'uses' 	=>	'SaleController@destroy'
    ]);

    Route::get('/product/delete/{id}', [
        'as'	=>	'product.delete',
        'uses' 	=>	'ProductController@destroy'
    ]);


});


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

//general req - stationary - souvenir
Route::get('/stationary', 'PagesController@stationarydatatables');
Route::get('/add_stationary', 'PagesController@add_stationary');

Route::post('/add_genreq/increasecart/{id}', 'GeneralRequestController@increasecart');
Route::post('/add_genreq/decreasecart/{id}', 'GeneralRequestController@decreasecart');
Route::get('/add_genreq', 'GeneralRequestController@index');
Route::post('/add_genreq/addstationary/{id}', 'GeneralRequestController@addStationaryCart');



Route::get('/general_request', 'PagesController@general_requestdatatables');
// Route::get('/add_genreq', 'GeneralRequestController@create');

Route::get('/souvenir', 'PagesController@souvenirdatatables');

Route::get('/fbo', 'PagesController@fbodatatables');



// Route::get('/ktdatatables', 'PagesController@ktDatatables');
// Route::get('/user')->name('api.user')->uses('UserController@datatables');
// Route::get('/data_user', 'PagesController@data_user');
// Route::get('/add_user', 'PagesController@add_user');
// Route::get('edit/{id?}','UserController@edit');
// Route::post('update-user','UserController@update');

Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// // Route::get('user','UserController@index');

// Route::get('user','UserController@index');
// Route::get('user/json','UserController@json');
// Route::get('user/json','UserController@json');
// Route::get('add-user','UserController@create');
// Route::post('post-user','UserController@store');

// Route::get('delete-user/{id?}','UserController@delete');


// // Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');


// Route::get('/', 'AuthController@showFormLogin')->name('login');
// Route::get('login', 'AuthController@showFormLogin')->name('login');
// Route::post('login', 'AuthController@login');
// Route::get('register', 'AuthController@showFormRegister')->name('register');
// Route::post('register', 'AuthController@register');
 
// Route::group(['middleware' => 'auth'], function () {
 
//     Route::get('home', 'HomeController@index')->name('home');
//     Route::get('logout', 'AuthController@logout')->name('logout');
 
   


// });

// Route::get('/', 'PagesController@index');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


});