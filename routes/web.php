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

Auth::routes();

// Route::group(['middleware'=>'auth'], function() {
// 	Route::get('/home', 'User\HomeController@index')->name('home');
// });

Route::group(['prefix'=>'user','namespace'=>'User','as'=>'user.'], function() {
	Route::get('/', function () {
		$products = product::all()->random(8);
	    return view('user.home', compact('products'));
	});

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/about', 'AboutController@index')->name('about');

	Route::get('/blog', 'BlogController@index')->name('blog');

	Route::get('/singleBlog', 'BlogController@singleBlog')->name('singleBlog');

	Route::get('/contact', 'ContactController@index')->name('contact');

	Route::get('/storeMessage', 'ContactController@storeMessage')->name('storeMessage');

	Route::get('/shop', 'ShopController@index')->name('shop');

	Route::get('/checkout', 'ShopController@checkout')->name('checkout');

	Route::get('/wishlist', 'ShopController@wishlist')->name('wishlist');

	Route::get('/cart', 'ShopController@cart')->name('cart');

	Route::post('/cart', 'ShopController@checkDeliveryFee')->name('checkDeliveryFee');

	Route::get('/product/{parameter}', 'ShopController@showProduct')->name('product');

	Route::get('/order', 'OrderController@index')->name('order');

	Route::post('/orderProcess', 'OrderController@orderProcess')->name('orderProcess');

	Route::post('/promo', 'OrderController@promo')->name('promo');

	Route::get('/review', 'ReviewController@index')->name('review');

	Route::post('/addReview', 'ReviewController@addReview')->name('addReview');

	Route::get('/profile', 'ProfileController@index')->name('profile');

	Route::post('/updateProfile', 'ProfileController@updateProfile')->name('updateProfile');

	Route::resource('/address', 'AddressController');

	Route::get('address/delete/{id}', 'AddressController@destroy')->name('addressDestroy');

	Route::get('address/setDefaultAddress/{id}', 'AddressController@setDefaultAddress')->name('setDefaultAddress');

	Route::get('/delivery', 'DeliveryController@index')->name('delivery');
});



//admin
Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'], function() {
	Route::get('/news', 'newsController@index')->name('news');

	Route::post('/addNews', 'newsController@addNews')->name('addNews');

	Route::get('/fetchNews/{id}', 'newsController@fetchNews')->name('fetchNews');

	Route::get('/deleteNews/{id}', 'newsController@deleteNews')->name('deleteNews');

	Route::post('/updateNews', 'newsController@updateNews')->name('updateNews');

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('/calender', 'calenderController@index')->name('calender');

	Route::post('/calender/crud', 'calenderController@calenderCRUD')->name('calenderCRUD');

	Route::get('/promotion', 'PromoController@index')->name('promotion');

	Route::post('/addPromotion', 'PromoController@addPromo')->name('addPromo');

	Route::get('/fetchPromotion/{id}', 'PromoController@fetchPromo')->name('fetchPromo');

	Route::get('/deletePromotion/{id}', 'PromoController@deletePromo')->name('deletePromo');

	Route::post('/updatePromotion', 'PromoController@updatePromo')->name('updatePromo');

	Route::get('/customer', 'CustomerController@index')->name('customer');

	Route::get('/customerMessage', 'CustomerController@message')->name('customerMessage');

	Route::get('/deleteMessage/{id}', 'CustomerController@deleteMessage')->name('deleteMessage');

	Route::resource('/products', 'ProductController');

	Route::get('/productsTable', 'ProductController@productTable')->name('productTable');

	Route::get('/products/{parameter}', 'ProductController@vege')->name('vege');

	Route::get('products/delete/{id}', 'ProductController@destroy')->name('productDestroy');

	Route::get('/delivery', 'DeliveryController@index')->name('delivery');

	Route::post('/addDelivery', 'DeliveryController@addDelivery')->name('addDelivery');

	Route::get('/fetchDelivery/{id}', 'DeliveryController@fetchDelivery')->name('fetchDelivery');

	Route::post('/updateDelivery', 'DeliveryController@updateDelivery')->name('updateDelivery');

	Route::get('/deleteDelivery/{id}', 'DeliveryController@deleteDelivery')->name('deleteDelivery');
});

// Auth::routes();
