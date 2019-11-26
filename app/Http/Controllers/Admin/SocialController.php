<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Social;
class SocialController extends Controller
{

	//------------------------ Social list Method -----------------------//
	public function social()
	{
		$social_infos = Social::first();
		return view('admin.social.social_edit',compact('social_infos'));
	}

	//------------------------ Social list Method -----------------------//
	public function social_update(Request $request)
       { 
        // dd($request->all());
          $count_row = Social::get()->count();
           if($count_row < 1){  
             $update_infos =  Social::insert([
                 'facebook'   => $request->facebook,  
                 'instagram'  => $request->instagram,
                 'youtube'    => $request->youtube, 
               ]);
           if ($update_infos){
             Session::flash('success',"Basic Infrmation Updated !!!");
           return redirect()->back();
           }else{
             Session::flash('error','Opps Something Wrong !!!');
           return redirect()->back();
           } 
           }else{
               // update infos with logo//   
             $update_infos = Social::where('id', $request->id) 
               ->update([ 
                 'facebook'   => $request->facebook,  
                 'instagram'  => $request->instagram,
                 'youtube'    => $request->youtube,  
               ]);
           if ($update_infos){
             Session::flash('success',"Basic Infrmation Updated !!!");
           return redirect()->back();
           }else{
             Session::flash('error','Opps Something Wrong !!!');
           return redirect()->back();
           }
           }  
      }
}
