<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use SebastianBergmann\Type\VoidType;

class UserController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('user-dashboard.dashboard', compact('data'));
    }
    // End Method

    public function user_profile_index()
    {    $id = Auth::user()->id;
        $data = User::find($id);
        return view('user-dashboard.components.profile_index', compact('data'));
    }
    // End Method

    public function user_profile(Request $request)
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
            @unlink(public_path('upload/customerPart/'.$data->image));
            $filename = $file->getClientOriginalName();
            $file->move(public_path('upload/customerPart/'), $filename);
            $data->image = $filename;
        }   
        $data->save();

        $notification = array(
            'message' => 'User profile updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification); 
    }
    // End Method

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User logout successfuly',
            'alert-type' => 'success'
        );

        return redirect('/')->with($notification);
    }
    // End Method

    // public function userLogin()
    // {
    //     return view('admin.components.admin_login');
    // }
    // // End Method

    public function update_password(Request $request)
    {
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

    public function track_order()
    {
        return view('user-dashboard.components.track_order');
    }
    // End Method

    public function change_password()
    {
        return view('user-dashboard.components.change_password');
    }
    // End Method

    public function user_order_index(){

        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('user-dashboard.components.orders', compact('orders'));

    }
    // End Method

    public function user_order_detail($order_id){
        $order = Order::with('region','district','state','user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItems::with('order','product','seller')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.orders.order_details',compact('order','orderItems'));
    }
    // End Method

    public function invoice_download($order_id){
        $order = Order::with('region','district','state','user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItems::with('order','product','seller')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.orders.order_invoice',compact('order','orderItems'))->setPaper('a4')->setOption([
            'tempDir' => public_path(), 
            'chroot' => public_path(),
            'defaultFont' => 'Times-New-Roman',
        ]);;
        return $pdf->download('invoice.pdf');
        
    }
    // End Method

    public function order_reason(Request $request,$order_id){

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Return Request Send successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view_order')->with($notification); 

    }
    // End Method

    public function return_order(){

        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();

        return view('frontend.orders.returned_order_request_view',compact('orders'));

    }
    // End Method

    // Tracking Users Orders Method

    public function tracking(Request $request){

        $invoice = $request->code;
        $track = Order::where('invoice_number',$invoice)->first();

        if ($track) {
            # code...
            return view('frontend.tracking.track_my_orders',compact('track'));

        } else {
             # code...
            $notification = array(
                'message' => 'Invoice Number Is Invalid',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification); 
        }
        


    }
    // End Method
    
}
