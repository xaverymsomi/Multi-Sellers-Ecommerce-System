<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SellerProductController extends Controller
{
    public function product_index()
    {
        // get latest data by using latest()
        $id = Auth::user()->id;
        $product = Product::where('seller_id',$id)->latest()->get();
        return view('seller.backend.product.index', compact('product'));
    }
    // End Method

    public function add_product()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('seller.backend.product.add_product', compact('brands','categories'));
    }
    // End Method

    public function seller_get_subcategory($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
    // End Method

    public function store_product(Request $request)
    {
        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/adminPart/product/images/'.$name_gen);
        $save_url = 'upload/adminPart/product/images/'.$name_gen;

        $product = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'seller_id' => Auth::user()->id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_tag' => $request->product_tag,
            'product_code' => $request->product_code,
            'product_quanity' => $request->product_quanity,
            'product_size' => $request->product_size,
            'product_price' => $request->product_price,
            'product_color' => $request->product_color,
            'product_description' => $request->product_description,
            'product_image' => $save_url,
            'product_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Multi image uploaded from here
        $multi_images = $request->file('multi_image');
        foreach ($multi_images as $key => $value) {
            $make_image = hexdec(uniqid()).'.'.$value->getClientOriginalExtension();
            Image::make($value)->resize(800,800)->save('upload/adminPart/product/multi_images/'.$make_image);
            $upload = 'upload/adminPart/product/multi_images/'.$make_image;

            MultiImage::insert([
                'product_id' => $product,
                'image_name' => $upload,
                'created_at' => Carbon::now(),
            ]); 
        }
        // End foreach

        // End Multi image uploaded from here
        $notification = array(
            'message' => 'Product and Images inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('seller.product_index')->with($notification);
    }
    // End Method

    public function edit_product($id)
    {
        $multipleImages = MultiImage::where('product_id', $id)->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('seller.backend.product.edit_product',compact('brands','categories','product','subcategories','multipleImages'));
    }
    // End Method

    public function update_product(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
 
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_tag' => $request->product_tag,
            'product_code' => $request->product_code,
            'product_quanity' => $request->product_quanity,
            'product_size' => $request->product_size,
            'product_price' => $request->product_price,
            'product_color' => $request->product_color,
            'product_description' => $request->product_description,
            'product_status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product updated without Image successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('seller.product_index')->with($notification);
    }
    // End Method

    public function update_product_image(Request $request)
    {
        $prodctId = $request->id;
        $oldImage = $request->old_image;

        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/adminPart/product/images/'.$name_gen);
        $save_url = 'upload/adminPart/product/images/'.$name_gen;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Product::findOrFail($prodctId)->update([
            'product_image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        
        $notification = array(
            'message' => 'Product Image Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    // End Method

    public function update_multi_image(Request $request)
    {
        $images = $request->multi_image;

        foreach ($images as $id => $item) {
            $imageDelete = MultiImage::findOrFail($id);
            unlink($imageDelete->image_name);

            $make_image = hexdec(uniqid()).'.'.$item->getClientOriginalExtension();
            Image::make($item)->resize(800,800)->save('upload/adminPart/product/multi_images/'.$make_image);
            $upload = 'upload/adminPart/product/multi_images/'.$make_image;

            MultiImage::where('id', $id)->update([
                'image_name' => $upload,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Multiple Image Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    public function destroy_multi_image($id)
    {
        $oldImage = MultiImage::findOrFail($id);
        unlink($oldImage->image_name);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Multi Image Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    public function inactivate_product($id)
    {
        Product::findOrFail($id)->update([
            'product_status' => 0,
        ]);

        $notification = array(
            'message' => 'Product Inactivated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    public function activate_product($id)
    {
        Product::findOrFail($id)->update([
            'product_status' => 1,
        ]);

        $notification = array(
            'message' => 'Product Activated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    public function delete_product($id)
    {
        $prodctId = Product::findOrFail($id);
        unlink($prodctId->product_image);
        Product::findOrFail($id)->delete();

        $images = MultiImage::where('product_id',$id)->get();
        foreach ($images as  $image) {
            unlink($image->image_name);
            MultiImage::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    // End Method

}
