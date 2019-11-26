<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Model\ShippingArea;
use Session;
class ShippingController extends Controller
{
     public function index()
    {
    	$area_info = ShippingArea::get();
    	return view('admin.shipping.shipping_area',compact('area_info'));
    }
    public function store(Request $req)
    {
    	$data = $req->all();
    	$store =ShippingArea::create($data);
    	if($store){
    		Session::flash('success');
    		return redirect()->back();
    	}else{
    		Session::flash('error');
    		return redirect()->back();
    	}
    }
    public function delete($id)
    {
    	 $page_delete = ShippingArea::where('id',$id)->delete();
        if($page_delete){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }
}
