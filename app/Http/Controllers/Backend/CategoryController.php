<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function categories()
    {
        // get latest data by using latest()
        $category = Category::latest()->get();
        return view('backend.category.index', compact('category'));
    }
    // End Method

    public function add_category()
    {
        return view('backend.category.create_category');
    }
    // End Method

    public function store_category(Request $request)
    {
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/adminPart/category/'.$name_gen);
        $save_url = 'upload/adminPart/category/'.$name_gen;

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            'category_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Category inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);   
    }
    // End Method

    public function edit_category($id)
    {
        $category = Category::find($id);
        if ($category) {
            return view('backend.category.edit_category',compact('category'));
        }else {
            return back()->with('error','data not found');
        }
    }
    // End Method

    public function update_category(Request $request)
    {
        $category_id = $request->id;
        $old_image = $request->image;
        if ($request->file('category_image')) {
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/adminPart/category/'.$name_gen);
            $save_url = 'upload/adminPart/category/'.$name_gen;

            if (file_exists($old_image)) {
                unlink($old_image);
            }

            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
                'category_image' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Category Updated with image successfuly',
                'alert-type' => 'success'
            );

            return redirect()->route('category.index')->with($notification);   
            }
            else {
                Category::findOrFail($category_id)->update([
                    'category_name' => $request->category_name,
                    'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
                    'updated_at' => Carbon::now(),

                ]);
    
                $notification = array(
                    'message' => 'Category Updated without image successfuly',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('category.index')->with($notification); 
            }
            // End else statement
    }
    // End Method

    public function destroy_category($id)
    {
        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method

}
