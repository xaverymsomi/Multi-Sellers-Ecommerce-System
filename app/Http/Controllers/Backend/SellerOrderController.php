<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerOrderController extends Controller
{
    public function sellerOrder()
{
    $sellerId = Auth::user()->id;

    $orders = OrderItems::with('order', 'product', 'seller')
        ->where('seller_id', $sellerId)
        ->orderBy('id', 'DESC')
        ->get();

    return view('seller.backend.orders.view_all_orders', compact('orders'));
}
    // End Method

    public function return_order(){
        $id = Auth::user()->id;
        $orders = OrderItems::with('order')->where('seller_id', $id)->orderBy('id','DESC')->get();

        return view('seller.backend.return_order.return_request',compact('orders'));
    }
    // End Method

    public function complete_order(){
        $id = Auth::user()->id;
        $orders = OrderItems::with('order')->where('seller_id', $id)->orderBy('id','DESC')->get();

        return view('seller.backend.return_order.complete_request',compact('orders'));
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

        return redirect()->back()->with($notification); 

    }
    // End Method

    public function order_details($order_id){
        $sellerId = Auth::user()->id;
        $order = Order::with('region','district','state','user')->where('id', $order_id)->first();
        $orderItems = OrderItems::with('order', 'product', 'seller')
        ->where('seller_id', $sellerId)->where('order_id',$order_id)
        ->orderBy('id', 'DESC')
        ->get();

        return view('seller.backend.orders.order_details',compact('order','orderItems'));
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

        return redirect()->route('seller.order')->with($notification); 

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

        return redirect()->route('seller.order')->with($notification);
    }
    // End Method

    public function order_delivered($order_id){

        Order::findOrFail($order_id)->update([
            'order_status' => 'delivered',
        ]);

        $notification = array(
            'message' => 'Order Delivered successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('seller.order')->with($notification); 

    }
    // End Method

    public function DownloadInvoice($order_id){
        $order = Order::with('region','district','state','user')->where('id', $order_id)->first();
        $orderItems = OrderItems::with('order','product','seller')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('seller.backend.orders.download_invoice',compact('order','orderItems'))->setPaper('a4')->setOption([
            'tempDir' => public_path(), 
            'chroot' => public_path(),
            'defaultFont' => 'Times-New-Roman',
        ]);;
        return $pdf->download('invoice.pdf');
        
    }
    // End Method

   
}
