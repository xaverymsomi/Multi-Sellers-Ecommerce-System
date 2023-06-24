<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function setting(){

        $setting = SiteSetting::find(1);
        return view('backend.setting.my_setting',compact('setting'));

    }
    // End Method

    public function setting_update(Request $request){

        $setting_id = $request->id;
        $old_image = $request->image;
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/adminPart/setting/'.$name_gen);
            $save_url = 'upload/adminPart/setting/'.$name_gen;

            if (file_exists($old_image)) {
                unlink($old_image);
            }

            SiteSetting::findOrFail($setting_id)->update([
                'support_phone' => $request->support_phone,
                'contacts' => $request->contacts,
                'email' => $request->email,
                'company_addres' => $request->company_addres,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'copyright' => $request->copyright,
                'logo' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Site Setting Updated with image successfuly',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.setting')->with($notification);   
            }
            else {
                SiteSetting::findOrFail($setting_id)->update([
                    'support_phone' => $request->support_phone,
                    'contacts' => $request->contacts,
                    'email' => $request->email,
                    'company_addres' => $request->company_addres,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                    'copyright' => $request->copyright,
                    'updated_at' => Carbon::now(),

                ]);
    
                $notification = array(
                    'message' => 'Site Setting Updated without image successfuly',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('admin.setting')->with($notification); 
            }
            // End else statement

    }
    // End Method

    public function contactForm(){
        return view('frontend.contact.contact_us_form');
    }
    // End Method


    // public function search_by_shop(Request $request){

    //     $customer = $request->user;
    //     $items = OrderItems::with('seller','order')->where('seller_id',$customer)->get(); 
    //     $orders = Order::with('user')->where('user_id',$customer)->latest()->get();
    //     $amount = Order::with('user')->where('user_id',$customer)->sum('amount');
    //     $TotalOrder = Order::with('user')->where('user_id',$customer)->count('id');
    //     return view('backend.comission.comission_by_shop',compact('orders','customer','amount','TotalOrder','items'));
    // }
    // // End Method


    
}
