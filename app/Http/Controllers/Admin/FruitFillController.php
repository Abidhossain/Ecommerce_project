<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FruitFill;
use Session;
use DB;
class FruitFillController extends Controller
{
     public function index()
    {
    	$fruit_info = FruitFill::get();
    	return view('admin.fruitfill.fruit_filling',compact('fruit_info'));
    }
    public function fill_store(Request $request)
    {
    	// dd($request->filling_name);
    	$check_validation = $request->validate([
    	    		'filling_name' => 'required', 
    	    	]);
    	    	$fills_add = FruitFill::create($request->all());
    	    	if ($fills_add){
    	            Session::flash('success',"Fruit Added Successfully!!!");
    	            return redirect()->back();
    	        }else{
    	            Session::flash('error','Opps Something Wrong!!!');
    	            return redirect()->back();
    	        }
    }
     //---------------Color Delete Method------------//
     public function fruit_delete($id)
     {
     	$fruit_delete = FruitFill::where('id',$id)->delete();
    		if ($fruit_delete){
           Session::flash('success',"Feels Deleted Successfully !!!");
           return redirect()->back();
         }else{
           Session::flash('error','Opps Something Wrong !!!');
           return redirect()->back();
         }
     }
}
