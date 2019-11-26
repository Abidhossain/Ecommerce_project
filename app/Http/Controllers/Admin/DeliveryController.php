<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Session;
use App\Model\DeliveryCahrgeAndVat;
use App\Model\DeliveryTime;
class DeliveryController extends Controller
{
     public function index()
        { 
        	$config_info = DeliveryCahrgeAndVat::first(); 
        	return view('admin.charge_and_vat.delivery_charge',compact('config_info'));
        }
        public function update(Request $request)
        { 
            // dd($request->all());
    		$count_row = DeliveryCahrgeAndVat::get()->count();
    		if($count_row < 1){ 
    		    $update_infos =  DeliveryCahrgeAndVat::insert([ 
    		        'inside_dhaka'        => $request->inside_dhaka,
    		        'outside_dhaka'       => $request->outside_dhaka, 
    		        'product_vat'         => $request->product_vat,  
                    'free_ship_above_or_equal'=> $request->free_ship_above_or_equal?$request->free_ship_above_or_equal:0,  
    		    ]);
    		     if ($update_infos){
    		        Session::flash('success');
    		      	return redirect()->back();
    		    }
    		    else{
    		    Session::flash('error');
    		  	return redirect()->back();
    		  	} 
    		}else{
    			$update_infos = DeliveryCahrgeAndVat::where('id', $request->id)
                        ->update([
                        'inside_dhaka'         => $request->inside_dhaka,
                        'outside_dhaka'        => $request->outside_dhaka, 
                        'product_vat'          => $request->product_vat,  
                        'free_ship_above_or_equal'=> $request->free_ship_above_or_equal?$request->free_ship_above_or_equal:0
                         ]);
    			if ($update_infos){
    			  Session::flash('success');
    			  return redirect()->back();
    			}else{
    			  Session::flash('error');
    			  return redirect()->back();
    			} 
    		} 
        }
    public function deliery_time()
    {
    	$delivery_time = DeliveryTime::get();
    	return view('admin.charge_and_vat.delivery_time',compact('delivery_time'));
    }
    public function deliery_time_add(Request $time)
    { 
    	// dd($time->all());
    	$time_add = DeliveryTime::create($time->all());
    	if ($time_add){
    	  Session::flash('success');
    	  return redirect()->back();
    	}else{
    	  Session::flash('error');
    	  return redirect()->back();
    	} 
    }
    public function delivery_time_delete($id)
    {
            $time = DeliveryTime::where('id',$id)->delete();
                if ($time){
               Session::flash('success','');
               return redirect()->back();
             }else{
               Session::flash('error','');
               return redirect()->back();
             }
    }
}
