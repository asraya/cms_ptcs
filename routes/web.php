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

   Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');


        Route::resource('/users', 'UserController')->except([
            'show'
        ]);
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
    });

    Route::group(['middleware' => ['permission:show products|create products|delete products']], function() {
        Route::resource('/kategori', 'CategoryController')->except([
            'create', 'show'
        ]);
        Route::resource('/produk', 'ProductController');
    });

    Route::group(['middleware' => ['role:kasir']], function() {
        Route::get('/transaksi', 'OrderController@addOrder')->name('order.transaksi');
        Route::get('/checkout', 'OrderController@checkout')->name('order.checkout');
        Route::post('/checkout', 'OrderController@storeOrder')->name('order.storeOrder');
    });

    Route::group(['middleware' => ['role:admin,kasir']], function() {
        Route::get('/order', 'OrderController@index')->name('order.index');
        Route::get('/order/pdf/{invoice}', 'OrderController@invoicePdf')->name('order.pdf');
        Route::get('/order/excel/{invoice}', 'OrderController@invoiceExcel')->name('order.excel');
    });

    Route::get('/home', 'HomeController@index')->name('home');
});


Route::get('/elearn', 'PagesController@elearn');

// Route::get('/role', 'PagesController@role');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/it_helpdesk')->name('api.it_helpdesk')->uses('HelpdeskRequestController@itdatatables');
Route::get('/it_helpdesk', 'PagesController@itdatatables');


Route::get('/listitstock', 'PagesController@listdatatables');

Route::get('/spt_request', 'PagesController@spt_request');
Route::get('/spt')->name('api.spt')->uses('SptRequestController@datatables');
Route::get('/add_spt', 'PagesController@add_spt');

// Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/user')->name('api.user')->uses('UserController@datatables');
Route::get('/data_user', 'PagesController@data_user');
Route::get('/add_user', 'PagesController@add_user');
Route::get('edit/{id?}','UserController@edit');
Route::post('update-user','UserController@update');

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
