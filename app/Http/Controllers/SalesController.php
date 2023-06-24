<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function manage_stocks(){
        $id = Auth::user()->id;
        $products = Product::where('seller_id',$id)->latest()->get();
        return view('seller.backend.stock.product_stock',compact('products'));

    }
    // End Method

    public function sales(){
        return view('seller.backend.report.report_view');
    }
    // End Method

    public function report(Request $request)
    {
        $sellerId = Auth::id();
        $date = $request->date;
    
        $orderItems = OrderItems::with('order', 'product', 'seller')
            ->where('seller_id', $sellerId)
            ->whereDate('created_at', $date)
            ->orderBy('id', 'DESC')
            ->get();
    
        return view('seller.backend.report.report_by_date', compact('date', 'orderItems'));
    }
    

    
    // End Method
}
