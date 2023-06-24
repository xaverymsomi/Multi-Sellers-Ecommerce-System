<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Coupon;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function coupons()
    {
        // get latest data by using latest()
        $coupons = Coupon::latest()->get();
        return view('backend.coupons.index', compact('coupons'));
    }
    // End Method

    public function add_coupon()
    {
        // $categories = Coupon::orderBy('category_name', 'ASC')->get();
        return view('backend.coupons.add_coupon'); 
    }
    // End Method

    public function store_coupon(Request $request)
    {

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('coupon.index')->with($notification);   
    }
    // End Method

    public function edit_coupons($id)
    {
        // $categories = Category::orderBy('category_name', 'ASC')->get();
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupons.edit_coupons', compact('coupons')); 
    }
    // End Method

    public function update_coupons(Request $request)
    {
        $coupon_id = $request->id;
        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('coupon.index')->with($notification);  

    }
    // End Method

    public function destroy_coupons($id)
    {
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method

    public function coupon_apply(Request $request){

        $coupon_name = $request->coupon_name;        
        $coupon = Coupon::where('coupon_name',$coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        // 

        // $request->session()->put('user', $request->input('username'));
        // Add data in session
        if ($coupon) {

            $request->session()->put('coupon_name', $coupon->coupon_name);
            $request->session()->put('coupon_discount', $coupon->coupon_discount);
            $request->session()->put('discount_amount', round(($coupon->coupon_discount / 100) * Cart::getSubTotal()));
            $request->session()->put('total_amount', round(Cart::getTotal() - session()->get('discount_amount') ));
        
            // session()->get('user');round(Cart::getTotal()- ())  Cart::getSubTotal()*$coupon->coupon_discount / 100
            $notification = array(
                'message' => 'Coupon Applied Successfully !!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('cart.list')->with($notification); 
        }else{
            $notification = array(
                'message' => 'Coupon does not exist!!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('cart.list')->with($notification); 
        }
    }
    // End Method
    
}
