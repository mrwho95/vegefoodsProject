<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
    	return view('user.shop');
    }

    public function cart(){
    	return view('user.cart');
    }

    public function checkout(){
    	return view('user.checkout');
    }

    public function product(){
    	return view('user.productSingle');
    }

    public function wishlist(){
    	return view('user.wishlist');
    }
}
