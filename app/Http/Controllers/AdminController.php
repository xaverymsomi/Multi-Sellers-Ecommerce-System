<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }
    // End Mehod

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin logout successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.login')->with($notification);
    }
    // End Method

    public function adminLogin()
    {
        return view('admin.components.admin_login');  
    }
    // End Method

    public function profile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.components.admin_profile', compact('userData'));
    }
    // End Method

    public function update_profile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/adminPart/'.$data->image));
            $filename = $file->getClientOriginalName();
            $file->move(public_path('upload/adminPart/'), $filename);
            $data->image = $filename;
        }   
        $data->save();

        $notification = array(
            'message' => 'Admin profile updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);     
    }
    // End Method

    public function change_password()
    {
        return view('admin.components.change_password');
    }
    // End Method

    public function update_password(Request $request)
    {
         // validate data entered
         $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password updated successfully');
            return redirect()->back();
        }else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }
    }
    // End Method

    public function manage_seller()
    {
        $sellers = User::where('role','seller')->latest()->get();
        return view('backend.sellers.all_sellers', compact('sellers'));
    }
    // End Method

    public function active_seller()
    {
        $active_sellers = User::where('status','active')->where('role','seller')->latest()->get();
        return view('backend.sellers.active_sellers', compact('active_sellers'));
    }
    // End Method

    public function inactive_seller()
    {
        $inactive_sellers = User::where('status','inactive')->where('role','seller')->latest()->get();
        return view('backend.sellers.inactive_sellers', compact('inactive_sellers'));
    }
    // End Method

    public function inactive_seller_details($id)
    {
        $inactive_seller_details = User::findOrFail($id);
        return view('backend.sellers.inactive_seller_details', compact('inactive_seller_details'));
    }
    // End Method

    public function approved_sellers(Request $request)
    {
        $seller_id = $request->id;
        $seller = User::findOrFail($seller_id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Seller approved to be Active successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('active.sellers')->with($notification); 
    }
    // End Method

    public function active_seller_details($id)
    {
        $active_seller_details = User::findOrFail($id);
        return view('backend.sellers.active_seller_details', compact('active_seller_details'));
    }
    // End Method

    public function dis_approved_sellers(Request $request)
    {
        $seller_id = $request->id;
        $seller = User::findOrFail($seller_id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Seller is in inActive state',
            'alert-type' => 'success'
        );

        return redirect()->route('inactive.sellers')->with($notification); 
    }
    // End Method

    public function manage_customer()
    {
        $customers = User::where('role','customer')->latest()->get();
        return view('backend.customers.customers', compact('customers'));
    }
    // End Method

    public function active_customer()
    {
        $active_customers = User::where('status','active')->where('role','customer')->latest()->get();
        return view('backend.customers.active_customer', compact('active_customers'));
    }
    // End Method

    public function inactive_customer()
    {
        $inactive_customers = User::where('status','inactive')->where('role','customer')->latest()->get();
        return view('backend.customers.inactive_customers', compact('inactive_customers'));
    }
    // End Method

    public function inactive_customer_details($id)
    {
        $inactive_customer_details = User::findOrFail($id);
        return view('backend.customers.inactive_customer_details', compact('inactive_customer_details'));
    }
    // End Method

    public function approved_customers(Request $request)
    {
        $customer_id = $request->id;
        $customer = User::findOrFail($customer_id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Customer approved to be Active successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('active.customers')->with($notification); 
    }
    // End Method

    public function active_customer_details($id)
    {
        $active_customer_details = User::findOrFail($id);
        return view('backend.customers.active_customer_details', compact('active_customer_details'));
    }
    // End Method

    public function dis_approved_customers(Request $request)
    {
        $customer_id = $request->id;
        $customer = User::findOrFail($customer_id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Customer is in inActive state',
            'alert-type' => 'success'
        );

        return redirect()->route('inactive.customers')->with($notification); 
    }
    // End Method

    public function search_by_shop(Request $request)
    {
        // Get the current date and time
        $currentDate = $request->date;
    
        // Calculate the date and time one day ago
        $oneDayAgo = $currentDate;
    
        // Retrieve all sellers
        $sellers = User::where('role', 'seller')->get();
    
        foreach ($sellers as $seller) {
            // Retrieve the order items placed within the last day for the current seller
            $orderItems = OrderItems::where('created_at', '>=', $oneDayAgo)
                ->where('seller_name', $seller->name)
                ->get();
    
            $deductedAmount = 0;
    
            foreach ($orderItems as $orderItem) {
                $deductedAmount += $orderItem->price * $orderItem->quantity * 0.02; // Calculate 2 percent of each order item amount
            }
    
            // Retrieve the orders associated with the order items
            $orders = Order::whereIn('id', $orderItems->pluck('order_id')->toArray())->get();
    
            foreach ($orders as $order) {
                $newAmount = $order->amount - $deductedAmount; // Deduct the calculated amount from the order amount
    
                // Update the order amount with the deducted value
                $order->amount = $newAmount;
                $order->save();
            }
            
        }
         // Replace this with the actual total amount delivered for all sellers in a day

 
    
        // Optionally, you can add a success message or redirect to a specific page
        return view('backend.comission.deduct_orders',compact('newAmount'));
    }

    public function shops_money(){
            $users = User::where('role','seller')->latest()->get();
            return view('backend.comission.view_comission',compact('users'));
        
    }
    // End Method

}