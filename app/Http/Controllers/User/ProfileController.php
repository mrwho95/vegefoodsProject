<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
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
    	return view('user.profile', $arr);
    }

    public function updateProfile(Request $request, User $user)
    {   
    	$validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'phonenumber' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $user = User::find(Auth::id());
    	$user->name = $request->name;
    	$user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
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
