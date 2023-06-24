<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function sliders()
    {
        // get latest data by using latest()
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', compact('sliders'));
    }
    // End Method

    public function add_slider()
    {
        return view('backend.slider.create_slider');
    }
    // End Method

    public function store_slider(Request $request)
    {
        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(2375,807)->save('upload/adminPart/slider/'.$name_gen);
        $save_url = 'upload/adminPart/slider/'.$name_gen;

        Slider::insert([
            'slider_title' => $request->slider_title,
            'slider_short_title' => $request->slider_short_title,
            'slider_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Slider inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification);   
    }
    // End Method

    public function edit_slider($id)
    {
        $slider = Slider::find($id);
        if ($slider) {
            return view('backend.slider.edit_slider',compact('slider'));
        }else {
            return back()->with('error','data not found');
        }
    }
    // End Method

    public function update_slider(Request $request)
    {
        $slider_id = $request->id;
        $old_image = $request->image;
        if ($request->file('slider_image')) {
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2375,807)->save('upload/adminPart/slider/'.$name_gen);
            $save_url = 'upload/adminPart/slider/'.$name_gen;

            if (file_exists($old_image)) {
                unlink($old_image);
            }

            Slider::findOrFail($slider_id)->update([
                'slider_title' => $request->slider_title,
                'slider_short_title' => $request->slider_short_title,
                'slider_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Updated with image successfuly',
                'alert-type' => 'success'
            );

            return redirect()->route('all.slider')->with($notification);   
            }
            else {
                Slider::findOrFail($slider_id)->update([
                    'slider_title' => $request->slider_title,
                    'slider_short_title' => $request->slider_short_title,
                    'updated_at' => Carbon::now(),
                ]);
    
                $notification = array(
                    'message' => 'Slider Updated without image successfuly',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('all.slider')->with($notification); 
            }
            // End else statement
    }
    // End Method

    public function destroy_slider($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method
}
