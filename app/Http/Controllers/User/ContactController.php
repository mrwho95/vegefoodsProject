<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customermessage;
use Validator;

class ContactController extends Controller
{
    public function index(){
    	return view('user.contact');
    }

    public function storeMessage(Request $request, customermessage $customerMessage){
     	$validator = Validator::make($request->all(), [
	        'name' => 'required|min:3',
	        'email' => 'required|min:3',
	        'subject' => 'required|min:3',
	        'message' => 'required|min:3',
	    ]);

	    if ($validator->fails()) {
	        return back()->with('warning', $validator->messages()->all()[0])->withInput();
	    }

	    $customerMessage->name = $request->name;
	    $customerMessage->email = $request->email;
	    $customerMessage->subject = $request->subject;
	    $customerMessage->message = $request->message;
	    $customerMessage->save();

    	return redirect()->route('user.contact')->with('success', 'Message sent! We will contact you as soon as possible.');
    }
}
