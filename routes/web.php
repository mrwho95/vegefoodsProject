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

Route::get('/', function () {
    return view('user.home');
});

Auth::routes();

Route::get('/home', 'User\HomeController@index')->name('home');

Route::get('/about', 'User\AboutController@index')->name('about');

Route::get('/blog', 'User\BlogController@index')->name('blog');

Route::get('/contact', 'User\ContactController@index')->name('contact');

Route::get('/shop', 'User\ShopController@index')->name('shop');

Route::get('/checkout', 'User\ShopController@checkout')->name('checkout');

Route::get('/wishlist', 'User\ShopController@wishlist')->name('wishlist');

Route::get('/cart', 'User\ShopController@cart')->name('cart');

Route::get('/product', 'User\ShopController@product')->name('product');
//admin

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
