<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\promotion;
use Carbon\Carbon;
use DataTables;
use Validator;

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
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    	return view('admin.promo');
    }

    public function addPromo(Request $request, promotion $promotion){
    	 $validator = Validator::make($request->all(), [
	        'name' => 'required|min:3',
	        'code' => 'required|min:3',
	        'discount' => 'required|min:3',
	        'availability' => 'required|min:3',
	        'expired' => 'required|min:3',
	    ]);

	    if ($validator->fails()) {
	        return back()->with('warning', $validator->messages()->all()[0])->withInput();
	    }

    	$promotion->name = $request->name;
    	$promotion->code = $request->code;
    	$promotion->discount = $request->discount;
    	$promotion->availability = $request->availability;
    	$promotion->expired = $request->expired;
    	$promotion->save();

    	return redirect()->route('adminPromotion')->with('success', 'Promotion Added');

    }

    public function fetchPromo($id){
    	$data = promotion::find($id);
    	$data = json_decode(json_encode($data),true);
    	$data['expired']= Carbon::parse($data['expired'])->format('Y-m-d');
    	echo json_encode($data); 
    }

    public function updatePromo(Request $request, promotion $promotion){

    	// $validator = Validator::make($request->all(), [
	    //     'name' => 'required|min:3',
	    //     'code' => 'required|min:3',
	    //     'discount' => 'required|min:3',
	    //     'availability' => 'required|min:3',
	    //     'expired' => 'required|min:3',
	    // ]);

	    // if ($validator->fails()) {
	    //     return back()->with('warning', $validator->messages()->all()[0])->withInput();
	    // }

    	$form_data = array(
            'name'    =>  $request->name,
            'code'     =>  $request->code,
            'discount'    =>  $request->discount,
            'availability'     =>  $request->availability,
            'expired'    =>  $request->expired,

        );
    	promotion::whereId($request->promoId)->update($form_data);
    	$promotion = promotion::find($request->promoId);
    	return response()->json(['success' => 'Data is successfully updated', 'data'=>$promotion]);
    }

    public function deletePromo($id){
    	$promotion = promotion::findOrFail($id);
        $promotion->delete();
    }
}
