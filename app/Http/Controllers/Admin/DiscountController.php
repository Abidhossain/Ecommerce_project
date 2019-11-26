<?php

namespace App\Http\Controllers\Admin;

use App\Model\Cupon;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DiscountController extends Controller
{
    public function index(){
        $cupons = Cupon::get();
        return view ('admin.cupon.cupon_list',compact('cupons'));
    }
    public function create(Request $request){
         $check_validatoin = $request->validate([
                     'cupon_code'       => 'required|unique:cupons,cupon_code',
                     'discount_type'    => 'required',
                     'start_date'       => 'required',
                     'expire_date'      => 'required',
                     'discount_amount'  => 'required',
                 ]);
         $data = $request->all();
         $store_data = Cupon::create($data);
         if($store_data){
             Session::flash('success');
             return redirect()->back();
         }else{
             Session::flash('error');
             return redirect()->back();
         }
    }
    public function edit($id){
        $get_by_id = Cupon::where('id',$id)->get();
        dd($get_by_id);
    }
    public function update(Request $request){
        $update_infos =  Category::where('id', $request->id)
            ->update([
                'cupon_code'    	=> $request->cupon_code,
                'discount_type'    	=> $request->discount_type,
                'start_date'    	=> $request->start_date,
                'expire_date'    	=> $request->expire_date,
                'discount_amount'   => $request->discount_amount,
            ]);
    }
    public function delete($id){
        $delete  = Cupon::where('id',$id)->delete();
        if($delete){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }
}
