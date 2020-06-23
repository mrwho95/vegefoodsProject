<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use App\address;
use Validator, Auth;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$arr['userData'] = user::find(Auth::id());
        $arr['address'] = address::where([['user_id', Auth::id()], ['defaultaddress', '1']])->first();
    	return view('user.profile', $arr);
    }

    public function updateProfile(Request $request, User $user)
    {   
    	$validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'phonenumber' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $user = User::find(Auth::id());
    	$user->name = $request->name;
    	$user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/vegeFoodsPhoto/', $filename);
            $user->photo = $filename;
        }
        $user->save();
        return redirect()->route('profile')->with('success', "Profile edited successful!");
    }
}
