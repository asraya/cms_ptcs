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
// Route::get('/', function() {
//     return redirect(route('login'));
// });
// Auth::routes();
// Route::group(['middleware' => 'auth'], function() {

//     Route::group(['middleware' => ['role:admin']], function () {
//         Route::resource('/role', 'RoleController')->except([
//             'create', 'show', 'edit', 'update'
//         ]);

//         Route::resource('/users', 'UserController')->except([
//             'show'
//         ]);
//         Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
//         Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
//         Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
//         Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
//         Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
//     });
//     Route::get('/home', 'HomeController@index')->name('home');

// });

Route::get('/', 'PagesController@index');


// Demo routes
Route::get('/spt_request', 'PagesController@spt_request');
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/add', 'PagesController@add');

Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Route::get('user','UserController@index');


Route::get('user','UserController@index');
Route::get('user/json','UserController@json');
Route::get('user/json','UserController@json');
Route::get('add-user','UserController@create');
Route::post('post-user','UserController@store');

Route::get('delete-user/{id?}','UserController@delete');
Route::get('edit/{id?}','UserController@edit');
Route::post('update-user','UserController@update');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Auth::routes();


Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');


