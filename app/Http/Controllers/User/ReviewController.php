<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\user;
use App\review;
use Auth, Validator;

class ReviewController extends Controller
{
    //
    public function index(){
    	if (Auth::check()) {
    		$arr['userData'] = user::find(Auth::id());
    	}
        $arr['user'] = user::where('is_admin', '0')->get();
    	$arr['reviews'] = review::all();
    	$arr['products'] = product::select('name')->get();
    	return view('user.review', $arr);
    	
    }

    public function addReview(Request $request, review $review){
    	$validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'product' => 'required',
            'rating' => 'required',
            'message' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        if (Auth::check()) {
    		$review->user_id = Auth::id();	
    	}

        $review->name = $request->name;
        $review->email = $request->email;
        $review->product = $request->product;
        $review->rating = $request->rating;
        $review->message = $request->message;
        $review->save();

    	return redirect()->route('review')->with('success', 'Review submitted!');
    }
}
