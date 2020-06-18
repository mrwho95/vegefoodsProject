<?php

use Illuminate\Support\Facades\Route;
use App\product;

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
	$arr['allProduct'] = product::all()->random(8);
    return view('user.home', $arr);
});

Auth::routes();

Route::get('/home', 'User\HomeController@index')->name('home');

Route::get('/about', 'User\AboutController@index')->name('about');

Route::get('/blog', 'User\BlogController@index')->name('blog');

Route::get('/contact', 'User\ContactController@index')->name('contact');

Route::get('/storeMessage', 'User\ContactController@storeMessage')->name('storeMessage');

Route::get('/shop', 'User\ShopController@index')->name('shop');

Route::get('/checkout', 'User\ShopController@checkout')->name('checkout');

Route::get('/wishlist', 'User\ShopController@wishlist')->name('wishlist');

Route::get('/cart', 'User\ShopController@cart')->name('cart');

Route::get('/product/{parameter}', 'User\ShopController@showProduct')->name('product');

//admin
Route::get('/adminDashboard', 'Admin\DashboardController@index')->name('adminDashboard');

Route::get('/adminPromotion', 'Admin\PromoController@index')->name('adminPromotion');

Route::post('/addPromotion', 'Admin\PromoController@addPromo')->name('addPromo');

Route::get('/fetchPromotion/{id}', 'Admin\PromoController@fetchPromo')->name('fetchPromo');

Route::get('/deletePromotion/{id}', 'Admin\PromoController@deletePromo')->name('deletePromo');

Route::post('/updatePromotion', 'Admin\PromoController@updatePromo')->name('updatePromo');

Route::get('/adminCustomer', 'Admin\CustomerController@index')->name('adminCustomer');

Route::get('/adminCustomerMessage', 'Admin\CustomerController@message')->name('adminCustomerMessage');

Route::get('/deleteMessage/{id}', 'Admin\CustomerController@deleteMessage')->name('deleteMessage');

Route::resource('/adminProducts', 'Admin\ProductController');

Route::get('/adminProductsTable', 'Admin\ProductController@productTable')->name('productTable');

Route::get('/adminProducts/{parameter}', 'Admin\ProductController@vege')->name('adminVege');

Route::get('adminProducts/delete/{id}', 'Admin\ProductController@destroy')->name('productDestroy');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
