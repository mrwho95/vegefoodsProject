<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\orderdetails;
use App\product;
use Auth;
use App\Jobs\SendMailJob;

class OrderController extends Controller
{
    //
	public function index(){
        if (Auth::check()) {
            $arr['order'] = order::where('user_id', Auth::id())->with('orderdetails')->orderBy('created_at', 'DESC')->get();
            $arr['product'] = product::all();
        }else{
            $arr = '';
        }
		return view('user.order', $arr);
	}

    public function orderProcess(Request $request, order $order, orderdetails $orderDetails){
        //json_decode is convert string to php object
        // return $userDetails;
        // foreach ($user_details as $key => $data) {
            // return $data['name'];
        // $address = join(',' $userDetails);
        // return $address;
        $userDetails = json_decode($request['user_details'], true);
        $address = $userDetails[4]['value'].$userDetails[5]['value'].", ".$userDetails[7]['value']." ".$userDetails[6]['value'].", ".$userDetails[8]['value']." ".$userDetails[9]['value'];

        $order->user_id = Auth::id();
        $order->orderunique_id = "#".uniqid();
        $order->fullname = $userDetails[1]['value'];
        $order->phonenumber = $userDetails[2]['value'];
        $order->address = $address;
        $order->discount = null;
        $order->delivery = $request['deliveryFee'];
        $order->totalprice = $request['overallCost'];
        $order->status = "Success";
        $order->save();

        //no use save() to store orderDetails because it just update the same row. Either create new when don't have id or update row when got id.
        //save() method is used both for saving new model, and updating existing one. here you are creating new model or find existing one, setting its properties one by one and finally saves in database.

        // Create method you are passing an array, setting properties in model and persists in the database in one shot.
        $product = json_decode($request['product'],true);
        foreach ($product as $key => $data) {
            $orderDetails->create([
                'order_id' => $order->id, 
                'product_id' => $data['id'],
                'productName' => $data['name'],
                'productPrice' => $data['price'],
                'wishQuantity' => $data['inCart']
            ]);

            product::where(['id' => $data['id']])->update(['sell' => $data['inCart']]);

            $productStock = product::where(['id' => $data['id']])->value('quantity');
            if ($productStock >= $data['inCart'] ) {
                $productStock = bcsub($productStock, $data['inCart']);
                $update = product::where('id',  $data['id'])->update(['quantity' => $productStock]);
            }else{
                //error
                 return response()->json(['error' => 'Failed to order', 'data'=>"product stock not enough."]);
            }
            
        }

        //dispatch job email
        $message = "Congratulation, your order is taken place!";
        $email = $userDetails[3]['value'];
        SendMailJob::dispatch($message, $email)->delay(now()->addSeconds(3));;
        // return 'mail sent successfully';

        return response()->json(['success' => 'Data is successfully updated', 'data'=>"sucesss"]);    
    }

    public function promo(Request $request){
    	return redirect()->route('cart')->with('success', 'Enjoy the promotion!');
    }
}
