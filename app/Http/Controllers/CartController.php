<?php

namespace App\Http\Controllers;

use Cart;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Coupon;
// use Darryldecode\Cart\Cart;
use App\Models\Product;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartList()
    {
        
        // $product = Product::findOrFail($id);

        // $color = $product->product_color;
        // $product_color = explode(',',$color);

        // $size = $product->product_size;
        // $product_size = explode(',',$size);

        $cartItems = \Cart::getContent();
        return view('frontend.cart.view_cart', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        if (Auth::check()) {
        $id  = $request->id;
        $product = Product::findOrFail($id);
        $seller = User::findOrFail($request->seller);
        
        if ($product->discount_price == NULL) {
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                    'seller_id' => $request->seller_id,
                    'seller_name' => $seller->name, // Add the seller name as an attribute
                    'color' => $request->color,
                    'size' => $request->size,
                )
        ]);
        }else {
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->discount_price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                    'seller_id' => $request->seller,
                    'seller_name' => $seller->name, // Add the seller name as an attribute
                    'color' => $request->color,
                    'size' => $request->size,
                )
        ]);
        }
        $notification = array(
            'message' => 'Product is Added to Cart Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('cart.list')->with($notification);
    }else {

        $notification = array(
            'message' => 'You Need to login First',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification);
    }
}
    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        $notification = array(
            'message' => 'Item Cart is Updated Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('cart.list')->with($notification);
    }
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);

        $notification = array(
            'message' => 'Item Cart Remove Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->route('cart.list')->with($notification);
    }

    public function clearAllCart()
    {
        \Cart::clear();

        $notification = array(
            'message' => 'All Item Cart Clear Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->route('cart.list')->with($notification);
    }
    // End Method

    // public function applyCoupon(Request $request){
    //     $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

    //     // Add data in session
    //     if ($coupon) {
    //         Session::put('coupon',[
    //             'coupon_name' => $coupon->coupon_name,
    //             'coupon_discount' => $coupon->coupon_discount,
    //             'discount_amount' => round((Cart::getTotal() * $coupon->coupon_discount) / 100),
    //             'total_amount' => round((Cart::getTotal() - Cart::getTotal() * $coupon->coupon_discount) / 100),
    //         ]);

    //         return response()->json(array(
    //             'validity' =>true,
    //             'success' => 'Coupon Applied Successfully !!'
    //         ));
    //     }else {
    //         return response()->json([
    //             'error' => 'Invalid Coupon'
    //         ]);
    //     }
    // }
    // // End Method

    public function checkout(){

        if (Auth::check()) {
            
            if (Cart::getTotal() > 0) {

                if (session::has('coupon_name')) {
                    $cart = \Cart::getContent();
                    $cart_qty = Cart::getTotalQuantity();
                    $Carttotal = session()->get('total_amount');
                }else{
                    $cart = \Cart::getContent();
                    $cart_qty = Cart::getTotalQuantity();
                    $Carttotal = Cart::getTotal();
                }

                

                $region = ShipDivision::orderBy('division_name','ASC')->get();

                return view('frontend.checkout.view_checkout',compact('cart','cart_qty','Carttotal','region'));
            }else {
                
                $notification = array(
                    'message' => 'Shopping At least One Product',
                    'alert-type' => 'error'
                );
        
                return redirect()->to('/')->with($notification);

            }

        }else {

            $notification = array(
                'message' => 'You Need to login First',
                'alert-type' => 'error'
            );
    
            return redirect()->route('login')->with($notification);
        }
        
    }
    // End Method
}
