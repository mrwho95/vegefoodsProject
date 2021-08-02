<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\news;

class BlogController extends Controller
{
    public function index(){
        $arr['blogs'] = news::all();
    	return view('user.blog', $arr);
    }

    public function singleBlog() {
    	return view('user.blogSingle');
    }
}
