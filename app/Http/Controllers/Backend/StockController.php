<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function manage_stocks(){

        $products = Product::latest()->get();
        return view('backend.stock.product_stock',compact('products'));

    }
    // End Method
}
