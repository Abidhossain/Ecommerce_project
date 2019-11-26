<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class OnsiteCatering extends Controller
{
	public function index()
	{
		$catering_info = DB::table('on_site_catering')->first();
		// dd($catering_info);
		return view('admin.onsite.onsite_catering',compact('catering_info'));
	}
    public function update(Request $request)
    {
// dd($request->all());
    	     	$count_row = DB::table('on_site_catering')->get()->count();
    	         if($count_row < 1){ 
    	             $update_infos =  DB::table('on_site_catering')->insert([  
    	 	            'description'     => $request->description, 
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
    	         	$update_infos =  DB::table('on_site_catering')->where('id', $request->id) 
    	         	    ->update([ 
    	 	            	'description'     => $request->description, 
    	         	    ]);
    	         	if ($update_infos){
    	         	  Session::flash('success');
    	         	  return redirect()->back();
    	         	}else{
    	         	  Session::flash('error');
    	         	  return redirect()->back();
    	         	} 
    	         }
    return view('admin.onsite.onsite_catering',compact('catering_info'));
    }

    public function our_menu_index()
    {
        $ourmenu = DB::table('on_ourmenu')->first();
        return view('admin.ourmenu.our_menu',compact('ourmenu'));
    }
        public function our_menu_update(Request $request)
        {
            $validate = $request->validate([ 
                        'our_menu_image' => 'mimes:jpeg,jpg,pdf', 
                    ]);

            $count_row = DB::table('on_ourmenu')->get()->count();
          if($count_row < 1){
              if ($request->our_menu_image !=''){
              $files = $request->file('our_menu_image');
              $extension = $files->getClientOriginalExtension();
              $fileName = 'food_menu'.".".$extension;
              $folderpath = 'Ecom/OurMenu/';
              $image_url = $folderpath.$fileName;
              $files->move($folderpath , $fileName);

              // update infos with logo//

            $update_infos = DB::table('on_ourmenu')->insert([
                'our_menu_image'      => $image_url, 
              ]);
          if ($update_infos){
            Session::flash('success',"Basic Infrmation Updated !!!");
          return redirect()->back();
          }else{
            Session::flash('error','Opps Something Wrong !!!');
          return redirect()->back();
          }
          }
          }else{
            if ($request->our_menu_image !=''){
                  $img_url = DB::table('on_ourmenu')->where('id',$request->id)->first();
                 $image_path = $img_url->our_menu_image;
                 $fav_image_path = $img_url->our_menu_image;
                 if($img_url !='' ){
                    unlink($image_path);
                }
              $files = $request->file('our_menu_image');
              $extension = $files->getClientOriginalExtension();
              $fileName = 'food_menu'.".".$extension;
              $folderpath = 'Ecom/OurMenu/';
              $image_url = $folderpath.$fileName;
              $files->move($folderpath , $fileName);

              // update infos with logo//

            $update_infos =  DB::table('on_ourmenu')->where('id', $request->id)
              ->update([
                'our_menu_image'      => $image_url,  
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
}
