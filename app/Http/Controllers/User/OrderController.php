<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
	public function index(){
		return view('user.order');
	}

    public function order(){
        return redirect()->route('order')->with('success', 'Order Successfully!');
    }
}
