<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order_index() {
        
        $order = Order::orderBy('id','DESC')->get();

        return view('backend.order.pending_order',compact('order'));

    }
    // End Method

    public function order_detail($order_id){
        
        $order = Order::with('region','district','state','user')->where('id', $order_id)->first();
        $orderItems = OrderItems::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('backend.order.order_details',compact('order','orderItems'));
    }
    // End Method

    public function order_confirmed($order_id){

        

        Order::findOrFail($order_id)->update([
            'order_status' => 'confirm',
        ]);

        $notification = array(
            'message' => 'Order successfuly confirmed',
            'alert-type' => 'success'
        );

        return redirect()->route('order.index')->with($notification); 

    }
    // End Method

    public function order_processed($order_id){
        Order::findOrFail($order_id)->update([
            'order_status' => 'processing',
        ]);

        $notification = array(
            'message' => 'Order is started Processing',
            'alert-type' => 'success'
        );

        return redirect()->route('order.index')->with($notification);
    }
    // End Method

    public function order_delivered($order_id)
    {
        $product = OrderItems::where('order_id', $order_id)->get();
        
        foreach ($product as $item) {
            Product::where('id',$item->product_id)->update([
                'product_quanity' => DB::raw('product_quanity-'.$item->quantity)]);
        }
    
        Order::findOrFail($order_id)->update([
            'order_status' => 'delivered',
        ]);
    
        $notification = array(
            'message' => 'Order Delivered successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('order.index')->with($notification);
    }
    // public function order_delivered($order_id){

    //     $product = OrderItems::where('order_id',$order_id)->get();
    //     foreach ($product as $key => $item) {
    //         Product::where('id',$item->product_id)->
    //             update([
    //             'product_quanity' => DB::raw('product_quanity-'.$item->quantity)
    //         ]);
    //     }
    //     Order::findOrFail($order_id)->update([
    //         'order_status' => 'delivered',
    //     ]);

    //     $notification = array(
    //         'message' => 'Order Delivered successfuly',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('order.index')->with($notification); 

    // }
    // End Method



}
