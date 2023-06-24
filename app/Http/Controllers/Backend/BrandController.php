<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brands()
    {
        // get latest data by using latest()
        $brand = Brand::latest()->get();
        return view('backend.brand.all_brands', compact('brand'));
    }
    // End Method

    public function add_brand()
    {
        return view('backend.brand.brand_create');
    }
    // End Method

    public function store_brand(Request $request)
    {
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/adminPart/brand/'.$name_gen);
        $save_url = 'upload/adminPart/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ','-',$request->brand_name)),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Brand inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);   
    }
    // End Method

    public function edit_brand($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            return view('backend.brand.brand_edit',compact('brand'));
        }else {
            return back()->with('error','data not found');
        }
    }
    // End Method

    public function update_brand(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->image;
        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/adminPart/brand/'.$name_gen);
            $save_url = 'upload/adminPart/brand/'.$name_gen;

            if (file_exists($old_image)) {
                unlink($old_image);
            }

            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ','-',$request->brand_name)),
                'brand_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Brand Updated with image successfuly',
                'alert-type' => 'success'
            );

            return redirect()->route('all.brand')->with($notification);   
            }
            else {
                Brand::findOrFail($brand_id)->update([
                    'brand_name' => $request->brand_name,
                    'brand_slug' => strtolower(str_replace(' ','-',$request->brand_name)),
                    'updated_at' => Carbon::now(),
                ]);
    
                $notification = array(
                    'message' => 'Brand Updated without image successfuly',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('all.brand')->with($notification); 
            }
            // End else statement
    }
    // End Method

    public function destroy_brand($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method

}
