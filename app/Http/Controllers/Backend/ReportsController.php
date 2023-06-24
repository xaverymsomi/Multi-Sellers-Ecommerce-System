<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function report_view(){
        return view('backend.report.report_view');
    }
    // End Method

    public function search_by_date(Request $request){

        $date = new DateTime($request->order_date);
        $format = $date->format('d F Y');

        $orders = Order::where('order_date',$format)->latest()->get();
        return view('backend.report.report_by_date',compact('orders','format'));

    }
    // End Method

    public function search_by_month(Request $request){
        $month = $request->order_month;
        $year = $request->order_year;

        $orders = Order::where('order_month',$month)->where('order_year',$year)->latest()->get();

        return view('backend.report.report_by_month',compact('orders','month','year'));
    }
    // End Method

    public function search_by_year(Request $request){
        $year = $request->order_year;

        $orders = Order::where('order_year',$year)->latest()->get();

        return view('backend.report.report_by_year',compact('orders','year'));
    }
    // End Method

    public function search_by_user(){
        $users = User::where('role','customer')->latest()->get();
        return view('backend.report.report_by_user',compact('users'));
    }
    // End Method

    public function search_by_customer(Request $request){

        $customer = $request->user;
        $orders = Order::with('user')->where('user_id',$customer)->latest()->get();
        return view('backend.report.report_by_customer',compact('orders','customer'));
    }
    // End Method
}
