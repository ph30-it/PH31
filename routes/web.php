<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');

//route trang admin
Route::group(['middleware' => [],
			   'namespace' => 'Auth',
			   'prefix' => 'admin'
], function() {
	Route::get('login', 'LoginController@showLoginForm')->name('admin-login-form');
	Route::post('login', 'LoginController@login')->name('admin-login');
	//logout
	Route::post('logout', 'LoginController@logout')->name('admin-logout');
	//Register
	Route::get('register', 'RegisterController@showRegistrationForm')->name('admin-register');


});

//route trang user

// Route::get('/users/{userid}', 'UserController@show');

// show list breeds
Route::get('/breeds', 'BreedController@index');

//show form create cat
Route::get('/cats/create', 'CatController@create')->name('cats.create');
//store cat
Route::post('/cats', 'CatController@store')->name('cats.store');

//list cats
Route::get('/cats', 'CatController@index')->name('list-cats');

//show form edit cat
Route::get('/cats/{id}/edit', 'CatController@edit')->name('edit-cat');
//update cat 
Route::put('/cats/{id}', 'CatController@update')->name('update-cat');
//Delete Cat
Route::delete('/cats/{id}', 'CatController@destroy')->name('delete-cat');

//List all cat of 1 breed
Route::get('/breeds/{id}/cats', 'BreedController@listAllCatByBreedId')->name('list-cat-by-breed');

//set role for user
Route::get('/users/{id}/set-role', 'UserController@getFormSetRole')->name('form-set-role-user');

//store role user
Route::post('users/{id}/set-role', 'UserController@storeRole')->name('store-role-user');




Auth::routes();
//form login
// Route::get('login', 'LoginController@showLoginForm')->name('login-form');
// Route::post('login', 'LoginController@login')->name('login');
// //logout
// Route::post('logout', 'LoginController@logout')->name('logout');
// //Register
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Managing Google accounts.
Route::name('google.index')->get('google', 'GoogleAccountController@index');
Route::name('google.store')->get('google/oauth', 'GoogleAccountController@store');
Route::name('google.destroy')->delete('google/{googleAccount}', 'GoogleAccountController@destroy');


//show form nhập question
Route::get('contact-us', 'HomeController@showFormContact')->name('form-contact');
//send mail khi submit form contact
Route::post('contact-us', 'HomeController@sendMailContact')->name('send-mail-contact');

//Send mail khi user đã submit order
Route::post('orders', 'OrderController@store')->name('store-order');

//form tạo user
Route::get('/users/create', 'UserController@create')->name('create-user');
//store user
Route::post('/users', 'UserController@store')->name('store-user');

//read excel
// Route::get('read-excel', 'UserController@read');
Route::get('/export', 'MyController@export')->name('export');
Route::get('/importExportView', 'MyController@importExportView');
Route::post('/import', 'MyController@import')->name('import');
Route::get('/trung', 'HomeController@index');
