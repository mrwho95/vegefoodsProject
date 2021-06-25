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

Route::get('/singleBlog', 'User\BlogController@singleBlog')->name('singleBlog');

Route::get('/contact', 'User\ContactController@index')->name('contact');

Route::get('/storeMessage', 'User\ContactController@storeMessage')->name('storeMessage');

Route::get('/shop', 'User\ShopController@index')->name('shop');

Route::get('/checkout', 'User\ShopController@checkout')->name('checkout');

Route::get('/wishlist', 'User\ShopController@wishlist')->name('wishlist');

Route::get('/cart', 'User\ShopController@cart')->name('cart');

Route::post('/cart', 'User\ShopController@checkDeliveryFee')->name('checkDeliveryFee');

Route::get('/product/{parameter}', 'User\ShopController@showProduct')->name('product');

Route::get('/order', 'User\OrderController@index')->name('order');

Route::post('/orderProcess', 'User\OrderController@orderProcess')->name('orderProcess');

Route::post('/promo', 'User\OrderController@promo')->name('promo');

Route::get('/review', 'User\ReviewController@index')->name('review');

Route::post('/addReview', 'User\ReviewController@addReview')->name('addReview');

Route::get('/profile', 'User\ProfileController@index')->name('profile');

Route::post('/updateProfile', 'User\ProfileController@updateProfile')->name('updateProfile');

Route::resource('/address', 'User\AddressController');

Route::get('address/delete/{id}', 'User\AddressController@destroy')->name('addressDestroy');

Route::get('address/setDefaultAddress/{id}', 'User\AddressController@setDefaultAddress')->name('setDefaultAddress');

Route::get('/delivery', 'User\DeliveryController@index')->name('delivery');

//admin
Route::get('/adminDashboard', 'Admin\DashboardController@index')->name('adminDashboard');

Route::get('/admin/calender', 'Admin\calenderController@index')->name('adminCalender');

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

Route::get('/adminDelivery', 'Admin\DeliveryController@index')->name('adminDelivery');

Route::post('/addDelivery', 'Admin\DeliveryController@addDelivery')->name('addDelivery');

Route::get('/fetchDelivery/{id}', 'Admin\DeliveryController@fetchDelivery')->name('fetchDelivery');

Route::post('/updateDelivery', 'Admin\DeliveryController@updateDelivery')->name('updateDelivery');

Route::get('/deleteDelivery/{id}', 'Admin\DeliveryController@deleteDelivery')->name('deleteDelivery');

// Auth::routes();
