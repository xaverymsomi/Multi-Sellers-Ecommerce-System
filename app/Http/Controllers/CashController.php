<?php

namespace App\Http\Controllers;

use Cart;
use Exception;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CashController extends Controller
{
    public function cash_on_delivery(Request $request){

        if (Session::has('coupon')) {
            $total_amount = session()->get('total_amount');
        } else {
            $total_amount = Cart::getTotal();
        }
        
        $order_id = Order::insertGetId([
            'user_id'=> Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            'address' => $request->shipping_address,
            'post_code' => $request->shipping_code,
            
            'payment_type' => 'Cash on Delivery',
            'payment_method' => 'Cash on Delivery',
            'currency' => 'Tsh',
            'amount' => $total_amount,
            'order_number' => 'EOS'.mt_rand(10000000,99999999),
            'invoice_number' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'order_status' => 'pending',
            'created_at' => Carbon::now(),
        ]);
        
        $cart = Cart::getContent();
        foreach ($cart as $key => $value) {
            OrderItems::insert([
                'order_id' => $order_id,
                'product_id' => $value->id,
                'seller_id' => $value->attributes->seller_id,
                'seller_name' => $value->attributes->seller_name,
                'color' => $value->attributes->color,
                'size' => $value->attributes->size,
                'quantity' => $value->quantity,
                'price' => $value->price * $value->quantity,
                'created_at' => Carbon::now(),
            ]);
        }
        // End Foreach
        
        Cart::clear();
        Session::forget('coupon');
        
        $notification = array(
            'message' => 'Your Order Placed successfuly',
            'alert-type' => 'success'
        );
        
        return redirect()->route('dashboard')->with($notification);
}
}