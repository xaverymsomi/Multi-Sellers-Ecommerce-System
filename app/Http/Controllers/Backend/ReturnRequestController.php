<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReturnRequestController extends Controller
{
    public function order_request(){

        $orders = Order::where('return_order',1)->orderBy('id','DESC')->get();

        return view('backend.return_order.return_request',compact('orders'));

    }
    // End Method

    public function approve_request($order_id){

        Order::where('id',$order_id)->update([
            'return_order' => 2,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Return Order Request updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('return.order.request')->with($notification); 

    }
    // End Method

    public function completed_request()
    {
        $orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
        return view('backend.return_order.completed_request',compact('orders'));
    }
    // End Method
}
