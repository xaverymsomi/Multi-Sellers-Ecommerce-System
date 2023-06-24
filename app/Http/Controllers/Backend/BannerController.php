<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function banners()
    {
        // get latest data by using latest()
        $banners = Banner::latest()->get();
        return view('backend.banner.index', compact('banners'));
    }
    // End Method

    public function add_banner()
    {
        return view('backend.banner.create_banner');
    }
    // End Method

    public function store_banner(Request $request)
    {
        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(768,450)->save('upload/adminPart/banner/'.$name_gen);
        $save_url = 'upload/adminPart/banner/'.$name_gen;

        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Banner inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('all.banner')->with($notification);   
    }
    // End Method

    public function edit_banner($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            return view('backend.banner.edit_banner',compact('banner'));
        }else {
            return back()->with('error','data not found');
        }
    }
    // End Method

    public function update_banner(Request $request)
    {
        $banner_id = $request->id;
        $old_image = $request->image;
        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(768,450)->save('upload/adminPart/banner/'.$name_gen);
            $save_url = 'upload/adminPart/banner/'.$name_gen;

            if (file_exists($old_image)) {
                unlink($old_image);
            }

            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'banner_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Banner Updated with image successfuly',
                'alert-type' => 'success'
            );

            return redirect()->route('all.banner')->with($notification);   
            }
            else {
                Banner::findOrFail($banner_id)->update([
                    'banner_title' => $request->banner_title,
                    'banner_url' => $request->banner_url,
                    'updated_at' => Carbon::now(),
                ]);
    
                $notification = array(
                    'message' => 'Banner Updated without image successfuly',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('all.banner')->with($notification); 
            }
            // End else statement
    }
    // End Method

    public function destroy_banner($id)
    {
        $banner = Banner::findOrFail($id);
        $img = $banner->banner_image;
        unlink($img);

        Banner::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Banner Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method

}
