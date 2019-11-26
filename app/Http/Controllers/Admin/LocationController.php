<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Location;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location_infos = Location::orderBy('id','DESC')->get();
        return view('admin.branch_location.branch_location',compact('location_infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
            // $check_validation = $request->validate([
            //     'branch_name'         => 'required',
            //     'google_map_code'     => 'required',
            //     'branch_address'      => 'required',
            //     'branch_phone_number' => 'required',
            //     'start_time'         => 'required',
            //     'end_time'         => 'required'
            // ]);
            $location_add = Location::create($request->all());
            if ($location_add){
                Session::flash('success',"Location Added Successfully!!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Something Wrong!!!');
                return redirect()->back();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $get_by_id = Location::where('id',$id)->first();
         return view('admin.branch_location.branch_location_edit',compact('get_by_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request)
    {         //dd($request->all());
             // $check_validation = $request->validate([
             //     'branch_name'         => 'required',
             //     'google_map_code'     => 'required',
             //     'branch_address'      => 'required',
             //     'branch_phone_number' => 'required',
             //     'start_time'         => 'required',
             //     'end_time'         => 'required'
             // ]);

     $loction_update = Location::where('id',$request->id)
                    ->update([
                      'branch_name' => $request->branch_name,
                      'google_map_code' => $request->google_map_code,
                      'branch_phone_number' => $request->branch_phone_number,
                      'branch_address' => $request->branch_address,
                      'start_time' => $request->start_time,
                      'end_time' => $request->end_time
                    ]);
        if ($loction_update) {
           Session::flash('success',"Location Updaetd !!!");
                return redirect('location-list');
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect('location-list');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_location = Location::find($id)->delete();
        Session::flash('success','Deleted Successfully');
        return redirect()->back();
    }
}
