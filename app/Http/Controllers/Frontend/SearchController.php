<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search_product(Request $request){

        $request->validate([
            'search' => "required"
        ]);
        $searchName = $request->search;
        $categories = Category::orderBy('category_name','ASC')->get();
        $product = Product::where('product_name','LIKE','$searchName')->get();
        return view('frontend.product.search',compact('product','searchName','categories'));
    }
    // End Method
}
