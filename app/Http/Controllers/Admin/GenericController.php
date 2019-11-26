<?php

namespace App\Http\Controllers\Admin;

use App\Model\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Generic;
class GenericController extends Controller
{
    public function index(){
        $generic_list = Generic::get();
        return view('admin.generic.generic',compact('generic_list'));
    }
    //---------------Color Store Method------------//
    public function store(Request $request)
    {
//        dd($request->all());
        $check_validation = $request->validate([
            'generic_name' => 'required',
        ]);
        $color_add = Generic::create($request->all());
        if ($color_add){
            Session::flash('success',"Color Added Successfully!!!");
            return redirect()->back();
        }else{
            Session::flash('error','Opps Something Wrong!!!');
            return redirect()->back();
        }
    }


    //---------------Color Delete Method------------//
    public function delete($id)
    {
        $color_delete = Generic::where('id',$id)->delete();
        if ($color_delete){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }
}
