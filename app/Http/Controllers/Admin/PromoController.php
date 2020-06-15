<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\promotion;
use DataTables;

class PromoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	if($request->ajax())
        {
            $data = promotion::all();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-warning btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    	return view('admin.promo');
    }

    public function addPromo(Request $request, promotion $promotion){
    	$promotion->name = $request->name;
    	$promotion->code = $request->code;
    	$promotion->discount = $request->discount;
    	$promotion->availability = $request->availability;
    	$promotion->expired = $request->expired;
    	$promotion->save();

    	return redirect('adminPromotion')->with('success', 'Promotion Added');

    }
}
