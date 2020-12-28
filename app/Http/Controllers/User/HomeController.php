<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use Carbon\Carbon;
use App\order;
use Auth;

class HomeController extends Controller
{
    public function index(){
    	$arr['allProduct'] = product::all()->random(8);

    	$today = Carbon::now()->format('Y-m-d');
            // return $day;
    	$orderData = order::where('user_id', Auth::id())->with('orderdetails')->get();
        foreach ($orderData as $key => $elements) {
            $createDate = $elements['created_at'];
            $day = $createDate->addDays(0)->format('Y-m-d');
            $day2 = $createDate->addDays(1)->format('Y-m-d');
            $day3 = $createDate->addDays(2)->format('Y-m-d');
            $day4 = $createDate->addDays(3)->format('Y-m-d');
            $day5 = $createDate->addDays(4)->format('Y-m-d');
            if($day2 == $today){
                order::where('id', $elements['id'])->update(['status' => "Prepare items"]);
            }elseif($day3 == $today){
                order::where('id', $elements['id'])->update(['status' => "Prepare for delivery"]);
            }elseif($day4 == $today){
                order::where('id', $elements['id'])->update(['status' => "Out to delivery"]);
            }elseif($day5 <= $today){
                order::where('id', $elements['id'])->update(['status' => "Completed"]);
            }
        }

    	return view('user.home', $arr);
    }
}
