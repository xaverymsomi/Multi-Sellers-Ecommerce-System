<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;

class SellerController extends Controller
{
    public function dashboard()
    {
        return view('seller.seller_dashboard');
    }
    // End Mehod

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('seller.login');
    }
    // End Method

    public function sellerLogin()
    {
        return view('seller.components.seller_login');
    }
    // End Method

    public function profile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('seller.components.seller_profile', compact('userData'));
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
        $data->seler_join_date = $request->seler_join_date;
        $data->seller_short_info = $request->seller_short_info;

        
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/sellerPart/'.$data->image));
            $filename = $file->getClientOriginalName();
            $file->move(public_path('upload/sellerPart/'), $filename);
            $data->image = $filename;
        }   
        $data->save();

        $notification = array(
            'message' => 'Seller profile updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('seller.profile')->with($notification);     
    }
    // End Method

    public function change_password()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('seller.components.change_password', compact('userData'));
    }
    // End Method

    public function update_password(Request $request)
    {
        // Validation
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

    public function Registerseller(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'seler_join_date' => $request->seler_join_date,
            'password' => Hash::make($request->password),
            'role' => 'seller',
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Seller Registered successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('seller.login')->with($notification);
    }
    // End Method


    public function become_seller()
    {
        return view('auth.become_seller');
    }
}
