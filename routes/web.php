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
Route::get('checkout','CheckoutController@step1')->name('checkout');
Route::get('shipping','CheckoutController@Shipping')->name('checkout.shipping');
Route::POST('proceedpayment','PaymentController@charge')->name('proceedpayment');
Route::POST('makepayment','PaymentController@store')->name('makepayment');
Route::get('/home','FrontController@index')->name('home');
Route::get('/','FrontController@index')->name('home');
Route::get('/contact','FrontController@contact')->name('contact');
Route::get('/cart/empty','CartController@empty')->name('cart.empty');
Route::get('/category/{id}','FrontController@category');
Auth::routes();
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::resource('product','ProductsController');
Route::resource('/cart','CartController');
Route::post('/cart/{id}','CartController@add')->name('addToCart');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
	Route::get('/','ProductsController@index');
	
	Route::post('/deletecat/{nulobj}','ProductsController@destroy');
	Route::resource('product','ProductsController');
	Route::resource('category','CategoriesController');
	Route::get('orders','OrdersController@index');
});


//Route::get('/home', 'HomeController@index')->name('home');
