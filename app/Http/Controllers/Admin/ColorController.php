<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Color;
use Session;
class ColorController extends Controller
{
    //---------------Color Index Method------------//
    public function color_index()
    {
    	$color_infos = Color::get();
    	return view('admin.colors.color_list',compact('color_infos'));
    }

    //---------------Color Store Method------------//
    public function color_store(Request $request)
    {
    	$check_validation = $request->validate([
    		'color_name' => 'required',
        'code' => 'required'
    	]);
    	$color_add = Color::create($request->all());
    	if ($color_add){
            Session::flash('success',"Color Added Successfully!!!");
            return redirect()->back();
        }else{
            Session::flash('error','Opps Something Wrong!!!');
            return redirect()->back();
        }
    }

    // ----------------------Tags Edit Method----------------------// 

   public function color_edit($color_id)
   {
   		$get_by_id = Color::where('color_id',$color_id)->first();
        return view('admin.colors.color_edit',compact('get_by_id'));
   } 

    // ----------------------Tags Update Method----------------------// 
   
   public function color_update(Request $request)
   {
     $check_validation = $request->validate([
        'color_name' => 'required'
     ]);
     $color_update = Color::where('color_id',$request->color_id)
                    ->update([
                      'color_name' => $request->color_name,
                      'code' => $request->code
                    ]);
        if ($color_update){
             Session::flash('success',"Color Updated Successfully !!!");
             return redirect('color-list');
         }else{
             Session::flash('error','Opps Something Wrong !!!');
             return redirect('color-list');
         }
   }
    //---------------Color Delete Method------------//
    public function color_delete($color_id)
    {
    	$color_delete = Color::where('color_id',$color_id)->delete();
   		if ($color_delete){
          Session::flash('success',"Color Deleted Successfully !!!");
          return redirect()->back();
        }else{
          Session::flash('error','Opps Something Wrong !!!');
          return redirect()->back();
        }
    }
}
