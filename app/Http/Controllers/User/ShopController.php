<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    public function index(){
        $arr['allProduct'] = product::paginate(8);
    	return view('user.shop', $arr);
    }

    public function cart(){
    	return view('user.cart');
    }

    public function checkout(){
    	return view('user.checkout');
    }

    public function showProduct($parameter){
        $category = ['vegetable', 'fruit', 'fruit juice', 'meat', 'bakery', 'seafood'];
        if (in_array($parameter, $category)) {
            $arr['allProduct'] = product::where('category', $parameter)->paginate(8);
            return view('user.shop', $arr); 
        }
        else{
            $arr['singleProduct'] = product::find($parameter);
            return view('user.productSingle', $arr); 
        }
    }

    public function wishlist(){
    	return view('user.wishlist');
    }
}
