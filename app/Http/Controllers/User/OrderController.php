<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\orderdetails;
use App\product;
use App\CrudEvents;
use Auth;
use App\Jobs\SendMailJob;

class OrderController extends Controller
{
    //
	public function index(){
        $arr = [];
        if (Auth::check()) {
            $arr['order'] = order::where('user_id', Auth::id())->with('orderdetails')->orderBy('created_at', 'DESC')->get();
            $arr['product'] = product::all();
        }
		return view('user.order', $arr);
	}

    public function orderProcess(Request $request, order $order, orderdetails $orderDetails) {
        //json_decode is convert string to php object

        //no use save() to store orderDetails because it just update the same row. Either create new when don't have id or update row when got id.
        //save() method is used both for saving new model, and updating existing one. here you are creating new model or find existing one, setting its properties one by one and finally saves in database.

        // Create method you are passing an array, setting properties in model and persists in the database in one shot.
        $products = json_decode($request['product'],true);
        $productsIds = array_column($products, 'id');
        // return count($products);
        $productsStock = product::findMany($productsIds)->pluck('quantity')->toArray();
        $productsSell = product::findMany($productsIds)->pluck('sell')->toArray();
        $tmp = [];
        $tmp2 = [];
        $i = 0;
        foreach ($products as $k => $p) {
            if ($p['inCart'] > $productsStock[$i]) return ['msg'=>$p['name']." insufficient stock"];
            $tmp =  [
                'product_id' => $p['id'],
                'productName' => $p['name'],
                'productPrice' => bcmul($p['inCart'], $p['price']),
                'wishQuantity' => $p['inCart'],
                'created_at' => $orderDetails->freshTimestamp(),
                'updated_at' => $orderDetails->freshTimestamp()
            ];
            $data[] = $tmp;

            $remainStock = bcsub($productsStock[$i], $p['inCart']);
            $totalSell = bcadd($productsSell[$i],$p['inCart']);
            $tmp2[$p['id']]['remainStock'] = $remainStock;
            $tmp2[$p['id']]['totalSell'] = $totalSell;

            if ($i == count($products)-1) {
                $userDetails = json_decode($request['user_details'], true);
                $address = $userDetails[4]['value'].$userDetails[5]['value'].", ".$userDetails[7]['value']." ".$userDetails[6]['value'].", ".$userDetails[8]['value']." ".$userDetails[9]['value'];

                $orderID = "#".uniqid();
                $order->user_id = Auth::id();
                $order->orderunique_id = $orderID;
                $order->fullname = $userDetails[1]['value'];
                $order->phonenumber = $userDetails[2]['value'];
                $order->address = $address;
                $order->discount = null;
                $order->delivery = $request['deliveryFee'];
                $order->totalprice = $request['overallCost'];
                $order->status = "Success";
                $order->save();

                foreach($data as $k => $d) {
                    $data[$k]['order_id'] = $order->id;
                }
                orderdetails::insert($data);
                // using insert method does not insert created_at and updated_at data to db, need to manually insert both

                foreach($tmp2 as $k => $t) {
                    product::where('id', $k)->update([
                        'quantity' => $t['remainStock'],
                        'sell' => $t['totalSell']
                    ]);
                }
            }
            $i++;
        }

        $deliveryDate = date('Y-m-d',strtotime("+4 day", strtotime(now())));
        CrudEvents::create([
            'name' => "Delivery order: ".$orderID,
            'start' => $deliveryDate." 00:00:00",
            'end' => $deliveryDate." 23:59:59"
        ]);

        //dispatch job email
        $message = "Congratulation, your order is taken place!";
        $email = $userDetails[3]['value'];
        SendMailJob::dispatch($message, $email)->delay(now()->addSeconds(3));;
        // return 'mail sent successfully';

        return "Order Successful";  
    }

    public function promo(Request $request){
    	return redirect()->route('user.cart')->with('success', 'Enjoy the promotion!');
    }
}
