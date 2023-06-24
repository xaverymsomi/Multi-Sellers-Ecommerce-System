<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function Add_to_Wishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' =>Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Successfully added to your Wishlist',
                    'alert-type' => 'success'
                );
                

                return redirect()->back()->with($notification);
            }else {
                $notification = array(
                    'message' => 'This product has already on your Wishlist',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
                
            }
        }else {
            $notification = array(
                'message' => 'At first Login in your Account',
                'alert-type' => 'error'
            );
            return redirect()->back('/')->with($notification);
        }
    }
    // End Method

    public function my_list()
    {
        $mylist = Wishlist::get();
        return view('frontend.wishlist.view_wishlist',compact('mylist'));
    }
    // End Method

    public function get_wishlist_product()
    {
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        $wishQuantity = Wishlist::count();

        return response()->json([
            'wishlist' => $wishlist,
            'wishQuantity' => $wishQuantity,
        ]);
    }
    // End Method

    public function remove_product_wishlist($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

        $notification = array(
            'message' => 'Successfully product Deleted to your Wishlist',
            'alert-type' => 'success'
        );
        

        return redirect()->back()->with($notification);
    }
    // End Method
}
