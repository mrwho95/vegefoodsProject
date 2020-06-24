<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\deliveryplace;
use Validator, DataTables;

class DeliveryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	if($request->ajax())
        {
            $data = deliveryplace::all();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="editDelivery btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="deleteDelivery btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    	return view('admin.delivery');
    }

    public function addDelivery(Request $request, deliveryplace $deliveryPlace){
    	$validator = Validator::make($request->all(), [
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'postcode' => 'required|min:3',
            'country' => 'required|min:3',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $deliveryPlace->city = $request->city;
        $deliveryPlace->state = $request->state;
        $deliveryPlace->postcode = $request->postcode;
        $deliveryPlace->country = $request->country;
        $deliveryPlace->price = $request->price;
        $deliveryPlace->save();

    	return redirect()->route('adminDelivery')->with('success', 'Delivery Place Added!');
    }

    public function fetchDelivery($id){
        $data = deliveryplace::find($id);
        echo json_encode($data); 
    }

    public function updateDelivery(Request $request, deliveryplace $deliveryPlace){

        $form_data = array(
            'city'    =>  $request->city,
            'state'     =>  $request->state,
            'postcode'    =>  $request->postcode,
            'country'     =>  $request->country,
            'price'    =>  $request->price,
        );
        deliveryplace::whereId($request->deliveryId)->update($form_data);
        $deliveryPlace = deliveryplace::find($request->deliveryId);
        return response()->json(['success' => 'Data updated!', 'data'=>$deliveryPlace]);
    }

     public function deleteDelivery($id){
        $deliveryPlace = deliveryplace::findOrFail($id);
        $deliveryPlace->delete();
    }
}
