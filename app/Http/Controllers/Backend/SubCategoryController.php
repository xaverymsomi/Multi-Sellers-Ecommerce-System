<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function sub_categories()
    {
        // get latest data by using latest()
        $subcategory = SubCategory::latest()->get();
        return view('backend.subcategory.index', compact('subcategory'));
    }
    // End Method
    public function add_subcategory()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.subcategory.add_subcategory', compact('categories')); 
    }
    // End Method
    
    public function store_subcategory(Request $request)
    {

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'SubCategory inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('sub_category.index')->with($notification);   
    }
    // End Method

    public function edit_subcategory($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::findOrFail($id);
        return view('backend.subcategory.edit_subcategory', compact('categories','subcategories')); 
    }
    // End Method

    public function update_subcategory(Request $request)
    {
        $subcategory_id = $request->id;
        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('sub_category.index')->with($notification);  

    }
    // End Method

    public function destroy_subcategory($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method

    public function get_subcategory($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
    // End Method
}
