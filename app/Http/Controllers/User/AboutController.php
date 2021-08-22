<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\review;
use App\user;

class AboutController extends Controller
{
    public function index(){
    	$user = user::where('is_admin', '0')->get();
    	$reviews = review::all();
    	return view('user.about', compact('user','reviews'));
    }
}
