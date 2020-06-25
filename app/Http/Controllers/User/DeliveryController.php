<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\deliveryplace;

class DeliveryController extends Controller
{
    //
    public function index(){
    	$deliveryPlace = deliveryplace::all();
    	return view('user.delivery', compact('deliveryPlace'));
    }
}
