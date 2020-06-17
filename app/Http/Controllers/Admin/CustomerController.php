<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customermessage;
use DataTables;

class CustomerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('admin.customer');
    }

    public function message(Request $request){
        if($request->ajax())
        {
            $data = customermessage::all();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="reply" id="'.$data->id.'" class="reply btn btn-primary btn-sm">reply</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="'.route('deleteMessage', $data->id).'" class="edit btn btn-danger btn-sm delete-confirm">Delete</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    	return view('admin.customerMessage');
    }

    public function deleteMessage($id){
        customermessage::destroy($id);
        return redirect()->route('adminCustomerMessage')->with('success', "Message Deleted!");
    }
}
