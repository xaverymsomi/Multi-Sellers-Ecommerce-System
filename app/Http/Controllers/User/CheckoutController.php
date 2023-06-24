<?php

namespace App\Http\Controllers\User;

use App\Models\ShipState;
use Cart;
use Illuminate\Http\Request;
use App\Models\ShipDistricts;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function show_district($division_id){
        $district = ShipDistricts::where('division_id', $division_id)->orderBy('district_name','ASC')->get();

        return json_encode($district);
    }
    // End Method

    public function show_state($district_id){
        $state = ShipState::where('district_id', $district_id)->orderBy('state_name','ASC')->get();

        return json_encode($state);
    }
    // End Method

    public function checkout_store(Request $request){

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_code'] = $request->shipping_code;
        $data['shipping_address'] = $request->shipping_address;
        $data['seller'] = $request->seller;

        $cartTotal = Cart::getTotal();

        if ($request->payment_option == 'card') {
            return "CARD";
            // return view('frontend.payment.card',compact('data','cartTotal'));
        }
        elseif ($request->payment_option == 'online_gateway') {
            return view('frontend.payment.online_gateway',compact('data','cartTotal'));
        }
        else{
            return view('frontend.payment.cash_on_delivery',compact('data','cartTotal'));
        }


    }
    // End Method
}
