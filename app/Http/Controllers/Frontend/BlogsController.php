<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function blogs(){
        $blogCategory = BlogCategory::latest()->get();
        $blog_post = BlogPost::with('blog_category')->latest()->get();

        $blog_post_recent = BlogPost::with('blog_category')->where('recent',1)->latest()->get();
        $blog_post_popular= BlogPost::with('blog_category')->where('popular',2)->latest()->get();

        return view('user-dashboard.components.blog.all_blogs',compact('blogCategory','blog_post','blog_post_popular','blog_post_recent'));
    }
    // End Method

    public function details($id){
        $product = BlogPost::findOrFail($id);

        $multi_image = BlogCategory::where('blog_category_id',$id)->get();

        $related_product = BlogPost::where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('frontend.product.product_details',compact('product','multi_image','related_product'));
    }
    // End Method
}
