<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\address;
use Validator, Auth;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arr['addresses'] = address::where('user_id', Auth::id())->get();
        return view('user.address', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.addAddress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, address $address)
    {
        //
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|min:3',
            'phonenumber' => 'required|min:3',
            'streetaddress1' => 'required|min:3',
            // 'streetaddress2' => 'required|min:3',
            'city' => 'required|min:3',
            'postcode' => 'required|min:3',
            'state' => 'required|min:3',
            'country' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $address->user_id = Auth::id();
        $address->fullname = $request->fullname;
        $address->phonenumber = $request->phonenumber;
        $address->streetaddress1 = $request->streetaddress1;
        $address->streetaddress2 = $request->streetaddress2;
        $address->city = $request->city;
        $address->postcode = $request->postcode;
        $address->state = $request->state;
        $address->country = $request->country;
        if (empty($request->defaultaddress)) {
            $request->defaultaddress = 0;
        }
        $address->defaultaddress = $request->defaultaddress;
        $address->save();

        return redirect()->route('address.index')->with('success', 'Address added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $arr['address'] = address::findorfail($id);
        return view('user.editAddress', $arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|min:3',
            'phonenumber' => 'required|min:3',
            'streetaddress1' => 'required|min:3',
            // 'streetaddress2' => 'required|min:3',
            'city' => 'required|min:3',
            'postcode' => 'required|min:3',
            'state' => 'required|min:3',
            'country' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $address = address::find($id);
        $address->user_id = Auth::id();
        $address->fullname = $request->fullname;
        $address->phonenumber = $request->phonenumber;
        $address->streetaddress1 = $request->streetaddress1;
        $address->streetaddress2 = $request->streetaddress2;
        $address->city = $request->city;
        $address->postcode = $request->postcode;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->defaultaddress = $request->defaultaddress;
        $address->save();

        return redirect()->route('address.index')->with('success', 'Address Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        address::destroy($id);
        return redirect()->route('address.index')->with('success', 'Address Deleted!');
    }

    public function setDefaultAddress($id){
        $address = address::where([['user_id', Auth::id()], ['defaultaddress', "1"]])->first();
        $address->defaultaddress = 0;
        $address->save();

        $address = address::findorfail($id);
        $address->defaultaddress = 1;
        $address->save();

        return redirect()->route('address.index')->with('success', 'Set Default Address Successful!');
    }
}
