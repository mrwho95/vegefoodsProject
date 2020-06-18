<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;

class HomeController extends Controller
{
    public function index(){
    	$arr['allProduct'] = product::all()->random(8);
    	return view('user.home', $arr);
    }
}
