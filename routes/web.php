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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/books', 'BookController@index')->name('books.index');
    Route::get('/books/{book}', 'BookController@show')->name('books.show');
    Route::post('/books/{book}/add-book-to-cart', 'BookController@addToCart')->name('books.add-to-cart');
    Route::get('/mobiles', 'MobileController@index')->name('mobiles.index');
    Route::get('/mobiles/{mobile}', 'MobileController@show')->name('mobiles.show');
    Route::post('/mobiles/{mobile}/add-book-to-cart', 'MobileController@addToCart')->name('mobiles.add-to-cart');

    Route::get('/cart', 'CartController@view')->name('carts.view');
    Route::post('/cart/remove-from-cart/{item}', 'CartController@removeFromCart')->name('carts.remove-from-cart');
    Route::post('/checkout', 'CartController@checkout')->name('carts.checkout');
    Route::delete('/clear-cart', 'CartController@clearCart')->name('carts.clear-cart');
});
