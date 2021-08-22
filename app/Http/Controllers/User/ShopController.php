<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\address;
use App\user;
use App\order;
use App\deliveryplace;
use Auth, Validator;

class ShopController extends Controller
{
    public function index(){
        $arr['allProduct'] = product::paginate(8);
        // $arr['allProductData'] = product::all();
    	return view('user.shop', $arr);
    }

    public function cart(){
        if (Auth::check()) {
            $arr['address'] = address::where([['user_id', Auth::id()], ['defaultaddress', '1']])->first();
            if (empty($arr['address'])) {
                return redirect()->route('user.address.create')->with('warning', "Sorry, your default address not found. Please create an address.");
            }
            $arr['defaultAddress'] = address::where([['user_id', Auth::id()], ['defaultaddress', '1']])->first();
            $address = json_decode(json_encode($arr['address']), true);
            $arr['deliveryfee'] = deliveryplace::where('state', $address['state'])->value('price');
            return view('user.cart', $arr);
        }else{
            return redirect()->route('register')->with('warning', "Recommend to register an new account first.");
        }
    	
    }

    public function checkDeliveryFee(Request $request){
        if (Auth::check()) {
            $arr['defaultAddress'] = address::where([['user_id', Auth::id()], ['defaultaddress', '1']])->first();
        }
        $validator = Validator::make($request->all(), [
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'postcode' => 'required|min:3',
            'country' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $city = $request->city;
        $state = $request->state;
        $postcode = $request->postcode;
        $country = $request->country;

        $arr['deliveryfee'] = deliveryplace::where([['city', $city], ['state', $state], ['postcode', $postcode], ['country', $country]])->value('price');

        if (empty($arr['deliveryfee'])) return redirect()->route('user.cart')->with('warning', "delivery fee of that place not found.");

        $arr['address'] = array(
            'city' => $city,
            'state' => $state,
            'postcode' => $postcode,
            'country' => $country
        );

        // return redirect()->route('user.cart')->with('deliveryfee', $deliveryfee);
        return view('user.cart', $arr)->with('success', 'Estimate successful!');
    }

    public function checkout(){
        $arr = [];
        if (Auth::check()) {
            $arr['user'] = user::find(Auth::id());
            $arr['receiver'] = address::where([['defaultaddress', 1], ['user_id', Auth::id()]])->first();
        }
    	return view('user.checkout', $arr);
    }

    public function showProduct($parameter){
        $category = ['vegetable', 'fruit', 'fruit juice', 'meat', 'bakery', 'seafood'];
        if (in_array($parameter, $category)) {
            $arr['allProduct'] = product::where('category', $parameter)->paginate(8);
            $arr['allProductData'] = product::all();
            return view('user.shop', $arr); 
        } else {
            $arr['singleProduct'] = product::find($parameter);
            $category = product::where('id', $parameter)->value('category');
            // $arr['relatedProduct'] = product::where('category', $category)->get()->random(4);
            $arr['relatedProduct'] = product::where('id', '!=', $parameter)->get()->random(4);
            return view('user.productSingle', $arr); 
        }
    }

    public function wishlist(){
    	return view('user.wishlist');
    }
}
