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