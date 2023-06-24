<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        // return view('user-dashboard.index');
        return view('welcome');

    }
    // End Method

    public function Product_details($id,$slug)
    {
        $product = Product::findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',',$color);

        $size = $product->product_size;
        $product_size = explode(',',$size);

        $multi_image = MultiImage::where('product_id',$id)->get();

        $category_id = $product->category_id;
        $related_product = Product::where('category_id',$category_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('frontend.product.product_details',compact('product','product_color','product_size','multi_image','related_product'));
    }
    // End Method

    public function Seller_details($id)
    {
        $seller = User::findOrFail($id);
        $seller_product = Product::where('seller_id',$id)->get();
        return view('frontend.seller.seller_product',compact('seller','seller_product'));
    }
    // End Method

    public function all_shop_lists()
    {
        $sellers = User::where('status', 'active')->where('role', 'seller')->orderBy('id','DESC')->get();
        return view('frontend.seller.all_shop_list',compact('sellers'));
    }
    // End Method

    public function category(Request $request,$id,$slug)
    {
        $product = Product::where('product_status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $name_category = Category::where('id',$id)->first();
        return view('frontend.product.category_view',compact('product','categories','name_category'));
    }
    // End Method

    // public function category_product($id)
    // {
    //     $seller = Category::findOrFail($id);
    //     $seller_product = Product::where('seller_id',$id)->get();
    //     return view('frontend.product.category_product',compact('seller_product','seller'));
    // }

    public function subcategory(Request $request,$id,$slug)
    {
        $product = Product::where('product_status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $name_subcategory = SubCategory::where('id',$id)->first();
        return view('frontend.product.subcategory_view',compact('product','categories','name_subcategory'));
    }
    // End Method

}
