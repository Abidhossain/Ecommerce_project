<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Flavour;
use DB;
class CakeConfigContrtoller extends Controller
{
    public function flavour_index()
    {
    	$flavour_info = Flavour::get();
    	return view('admin.cake_config.flavour',compact('flavour_info'));
    }
    public function flavour_add_process(Request $request)
    {
    	// dd($request->all());
    	$chek_validation = $request->validate([
    		'flavour_name' => 'required|unique:flavours,flavour_name',
    		'flavour_price_per_kg' => 'required',
    		'publication_status' => 'required' 
    	]);
    	$store_flavour = $request->all();
    	$store_flavour = Flavour::create($store_flavour);
        Session::flash('success',"Flavour Added Successfully!!!");
    	return redirect()->back();
    }

    // --------------------Page Edit Method-----------------//

	public function flavour_edit($flavour_id)
	{
		$get_by_id = Flavour::where('id',$flavour_id)->first();
		return view('admin.cake_config.flavour_edit',compact('get_by_id'));
	}
    // --------------------Page Update Method-----------------//

	public function flavour_update(Request $request)
	{
      $check_validation = $request->validate([
        'flavour_name' 		    => 'required',
        'flavour_price_per_kg'  => 'required',
        'publication_status'    => 'required',  
      ]);
       // dd($request->all());
		$update_infos =  Flavour::where('id', $request->flavour_id)
	                      ->update([
	                        'flavour_name'           => $request->flavour_name,
	                        'flavour_price_per_kg'   => $request->flavour_price_per_kg,
	                        'publication_status'     => $request->publication_status
	                      ]);
            if ($update_infos){
                Session::flash('success',"Flavour Updated Successfully!!!");
                return redirect('make-flavour');
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect()->back();
            }
	}

     // ----------------Pages Delete Method---------------------//

    public function flavour_delete($flavour_id)
    {
        $flavour_delete = Flavour::where('id',$flavour_id)->delete();
        if($flavour_delete){
            Session::flash('success',"Flavour Deleted Successfully !!!");
            return redirect()->back();
        }else{
            Session::flash('error',"Opps Something Wrong !!!");
            return redirect()->back();
        }
    } 

    ////////////////////Pricing for celebration tire base///////////////////
    public function cake_pricing_index() 
    {
        $get_by_id = DB::table('cake_pricing')->first();
        return view('admin.cake_config.cake_pricing',compact('get_by_id'));
    }
    public function cake_pricing_update(Request $request) 
    {
     $count_row = DB::table('cake_pricing')->get()->count();
        if($count_row < 1){ 
            $update_infos =  DB::table('cake_pricing')->insert([ 
            'price_for_any_flavour'   => $request->price_for_any_flavour,
            'tire_fondant_price'      => $request->tire_fondant_price, 
            'non_tire_fondant_price'  => $request->non_tire_fondant_price,  
            ]);
            if ($update_infos){
                Session::flash('success','Updated Successfully !!');
                return redirect()->back();
            }
            else{
                Session::flash('error');
                return redirect()->back();
            } 
        }
     else{
        $update_infos = DB::table('cake_pricing')->where('id', $request->id) 
                        ->update([
                        'price_for_any_flavour'  => $request->price_for_any_flavour,
                        'tire_fondant_price'     => $request->tire_fondant_price, 
                        'non_tire_fondant_price' => $request->non_tire_fondant_price 
                        ]);
        if ($update_infos){
          Session::flash('success');
          return redirect()->back();
        }else{
          Session::flash('error','Opps No Update !!');
          return redirect()->back();
        } 
     } 
    }
}
