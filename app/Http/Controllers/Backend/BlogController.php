<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function blog_category() {
        $blog_category = BlogCategory::latest()->get();
        return view('backend.blogs.blog_category',compact('blog_category'));
    }
    // End Method

    public function add_blog_category()
    {
        return view('backend.blogs.create_blog_category');
    }
    // End Method

    public function store_blog_category(Request $request)
    {
    
        BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ','-',$request->blog_category_name)),
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Category inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog_category')->with($notification);   
    }
    // End Method

    public function edit_blog_category($id)
    {
        $blogcategory = BlogCategory::find($id);
        if ($blogcategory) {
            return view('backend.blogs.edit_blog_category',compact('blogcategory'));
        }else {
            return back()->with('error','data not found');
        }
    }
    // End Method

    public function update_blog_category(Request $request)
    {
        $blog_category_id = $request->id;
        
            BlogCategory::findOrFail($blog_category_id)->update([
                'blog_category_name' => $request->blog_category_name,
                'blog_category_slug' => strtolower(str_replace(' ','-',$request->blog_category_name)),
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Blog Category Updated successfuly',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog_category')->with($notification);   
    }
    // End Method

    public function destroy_blog_category($id)
    {
        
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method


    // Blog Post Methods
    public function blog_post() {
        $blog_post = BlogPost::with('blog_category')->latest()->get();
        return view('backend.blogs.blog_post',compact('blog_post'));
    }
    // End Method

    public function add_blog_post()
    {
        $blog_category = BlogCategory::orderBy('blog_category_name', 'ASC')->get();
        return view('backend.blogs.create_blog_post',compact('blog_category'));
    }
    // End Method

    public function store_blog_post(Request $request)
    {
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1200,490)->save('upload/adminPart/blogs/'.$name_gen);
        $save_url = 'upload/adminPart/blogs/'.$name_gen;

        BlogPost::insert([
            'blog_category_id' => $request->blog_category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
            'post_image' => $save_url,
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Post inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog_post')->with($notification);   
    }
    // End Method

    public function edit_blog_post($id)
    {
        $blog_category = BlogCategory::orderBy('blog_category_name', 'ASC')->get();
        $blog_post = BlogPost::findOrFail($id);
        return view('backend.blogs.edit_blog_post', compact('blog_category','blog_post')); 
    }
    // End Method

    public function update_blog_post(Request $request)
    {
        $blog_post_id = $request->id;
        $old_image = $request->image;
        if ($request->file('post_image')) {
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,490)->save('upload/adminPart/blogs/'.$name_gen);
            $save_url = 'upload/adminPart/blogs/'.$name_gen;

            if (file_exists($old_image)) {
                unlink($old_image);
            }

            BlogPost::findOrFail($blog_post_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
                'post_image' => $save_url,
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Blog post Updated with image successfuly',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog_post')->with($notification);      
            }
            else {
                BlogPost::findOrFail($blog_post_id)->update([
                    'blog_category_id' => $request->blog_category_id,
                    'post_title' => $request->post_title,
                    'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
                    'post_short_description' => $request->post_short_description,
                    'post_long_description' => $request->post_long_description,
                    'updated_at' => Carbon::now(),

                ]);
    
                $notification = array(
                    'message' => 'Blog Post Updated without image successfuly',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('all.blog_post')->with($notification);    
            }

    }
    // End Method

    public function destroy_blog_post($id)
    {
        $blog_post = BlogPost::findOrFail($id);
        $img = $blog_post->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method
}
