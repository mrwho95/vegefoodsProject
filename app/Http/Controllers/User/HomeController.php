<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use Carbon\Carbon;
use App\order;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        // $message = "Hellow World";
//         Log::emergency($message);
// Log::alert($message);
// Log::critical($message);
// Log::error($message);
// Log::warning($message);
// Log::notice($message);
// Log::info($message);
// Log::debug($message);

    	$products = product::all()->random(8);

    	// $today = Carbon::now()->format('Y-m-d');
        $today = now()->format('Y-m-d');
        // info($today); store info at storage / logs/ laravel.log

            // return $day;
    	// $orderData = order::where('user_id', Auth::id())->with('orderdetails')->get();
     //    foreach($orderData as $d) {
     //        echo gettype($d['created_at']);
     //        $day[] = $d['created_at']->addDays(0)->format('Y-m-d');
     //    }
     //    print_r($day);
     //    return;
        
        $day = [];
        $orderData = '';

        $orders = json_decode(DB::table('orders')->select(['id','created_at'])->get(),true);
        foreach($orders as $v) {
            for ($i=0; $i < 6; $i++) { 
                $day[] = date('Y-m-d',strtotime("+$i day", strtotime($v['created_at'])));
                // $day[] = $v['created_at']->addDays($i)->format('Y-m-d');
            }
            switch ($today) {
                case $day[0]:
                case $day[1]:
                    $orderData = ['status' => "Prepare items"];
                    break;
                case $day[2]:
                    $orderData = ['status' => "Prepare for delivery"];
                    break;
                case $day[3]:
                    $orderData = ['status' => "Out to delivery"];
                    break;
                default:
                    $orderData = ['status' => "Completed"];
                    break;
            }
            order::where('id', $v['id'])->update($orderData);

        }

    	// return view('user.home', compact('products'));
        // return view('user.home')->with('products',$products);
        return view('user.home')->with(['products'=>$products]);

    }
}
