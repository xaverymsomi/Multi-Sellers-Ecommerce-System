<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistricts;
use App\Models\ShipState;

class ShippingAreaController extends Controller
{

     // Regions part in shipping area
    public function region_index()
    {
        
        $region_index = ShipDivision::latest()->get();
        return view('backend.ship.region.index', compact('region_index'));
    }
    // End Method

    public function add_region()
    {
        
        return view('backend.Ship.region.add_region'); 
    }
    // End Method

    public function store_region(Request $request)
    {

        ShipDivision::insert([
            'division_name' => strtoupper($request->division_name),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Region inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('ship.region')->with($notification);   
    }
    // End Method

    public function edit_region($id)
    {
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.region.edit_region', compact('division')); 
    }
    // End Method

    public function update_region(Request $request)
    {
        $region_id = $request->id;
        ShipDivision::findOrFail($region_id)->update([
            'division_name' => strtoupper($request->division_name),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Region Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('ship.region')->with($notification);  

    }
    // End Method

    public function destroy_region($id)
    {
        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Region Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method


    // district part in shipping area
    public function district_index()
    {
        
        $district_index = ShipDistricts::latest()->get();
        return view('backend.ship.district.index', compact('district_index'));
    }
    // End Method

    public function add_district()
    {
        $ship_division = ShipDivision::orderBy('division_name', 'ASC')->get();
        return view('backend.Ship.district.add_district',compact('ship_division')); 
    }
    // End Method

    public function store_district(Request $request)
    {

        ShipDistricts::insert([
            'division_id' => $request->division_id,
            'district_name' => strtoupper($request->district_name),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('ship.district')->with($notification);   
    }
    // End Method

    public function edit_district($id)
    {
        $region = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistricts::findOrFail($id);
        return view('backend.Ship.district.edit_district', compact('region','district')); 
    }
    // End Method

    public function update_district(Request $request)
    {
        $district_id = $request->id;
        ShipDistricts::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => strtoupper($request->district_name),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('ship.district')->with($notification);  

    }
    // End Method

    public function destroy_district($id)
    {
        ShipDistricts::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method


     // states part in shipping area
    public function state_index()
    {
        
        $state_index = ShipState::latest()->get();
        return view('backend.ship.state.index', compact('state_index'));
    }
    // End Method

    public function add_state()
    {
        $ship_division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $ship_district = ShipDistricts::orderBy('district_name', 'ASC')->get();
        return view('backend.Ship.state.add_state',compact('ship_division','ship_district')); 
    }
    // End Method

    public function get_district($division_id){
        $districts = ShipDistricts::where('division_id', $division_id)->get();
        return response()->json($districts);
    }
    // End Method

    public function store_state(Request $request)
    {

        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => strtoupper($request->state_name),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('ship.state')->with($notification);   
    }
    // End Method

    public function edit_state($id)
    {
        $region = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistricts::orderBy('district_name', 'ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.Ship.state.edit_state', compact('state','region','district')); 
    }
    // End Method

    public function update_state(Request $request)
    {
        $state_id = $request->id;
        ShipState::findOrFail($state_id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => strtoupper($request->state_name),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('ship.state')->with($notification);  

    }
    // End Method

    public function destroy_state($id)
    {
        ShipState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
    // End Method
}
