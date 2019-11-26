<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use Session;


use Image;
use File;
use Carbon\Carbon;


class BannerController extends Controller
{
    // ----------------------banner Index Method----------------------//

    public function banner_index()
    {
    	$banner_infos = Banner::orderBy('banner_position')->get();
    	return view('admin.banner.banner_list',compact('banner_infos'));
    }

    // ----------------------banner Index Method----------------------//

    public function banner_add_process(Request $request)
    {
    	// dd($request->all());
    	$check_validatoin = $request->validate([
    	            'banner_image' => 'image|mimes:jpeg,png,jpg,gif'
    	        ]);

    	  if ($request->hasFile('banner_image')) {
          $files = $request->file('banner_image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'Pharmacy/Banner/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);

    	  $banner_store = new Banner();
    	  $banner_store->banner_title           = $request->banner_title;
    	  $banner_store->banner_slug       = str_slug($request->banner_slug); 
        $banner_store->banner_position       = $request->banner_position;
    	  $banner_store->publication_status   = $request->publication_status;
    	  $banner_store->banner_image          = $image_url;
    	  $banner_store->save();
            if ($banner_store){
                Session::flash('success',"Banner Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Banner Added Faield !!!');
                return redirect()->back();
            }
    	  }
        
        
         
    }


      // ----------------------banner Edit Method----------------------//

	public function banner_edit($id)
	{
        $get_by_id = Banner::where('id',$id)->first();
            return view('admin.banner.banner_edit',compact('get_by_id'));
	}

    // ----------------------Slider Update Method----------------------//

	public function banner_update(Request $request)
    {
    	// dd($request->all());  
       if ($request->banner_image !=''){
              $img_url = Banner::where('id',$request->id)->first();
             $image_path = $img_url->banner_image;
             if($img_url !='' && file_exists($image_path)){
                  @unlink($image_path);
            }
          $files = $request->file('banner_image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'Pharmacy/Banner/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);

          // update infos with logo//

        $update_infos =  Banner::where('id', $request->id)
          ->update([ 
            'banner_title'       => $request->banner_title,
            'banner_slug'        => $request->banner_slug?str_slug($request->banner_slug):'', 
            'banner_position'    => $request->banner_position,
            'publication_status' => $request->publication_status,
            'banner_image'       => $image_url,
          ]);
      if ($update_infos){
        Session::flash('success');
      return redirect('/banner-list');
      }else{
        Session::flash('error','Opps Something Wrong !!!');
      return redirect('/banner-list');
      }
      }else{ 
          // update infos with logo// 
        $update_infos =  Banner::where('id', $request->id)
          ->update([
            'banner_title'       => $request->banner_title,
            'banner_slug'        => $request->banner_slug?str_slug($request->banner_slug):'', 
            'banner_position'    => $request->banner_position,
            'publication_status' => $request->publication_status,
          ]);
      if ($update_infos){
        Session::flash('success',"banner  Updated !!!");
      return redirect('/banner-list');
      }else{
        Session::flash('error','Opps Something Wrong !!!');
      return redirect('/banner-list');
      }
      }
 
	}

  //-----------------------banner Delete Method------------------------//

     public function delete_banner($id)
    {
         $banner = Banner::where('id',$id)->first();
         $image_path = $banner->banner_image;
         if($banner !=''){
            unlink($image_path);
         }
         $banner_image = Banner::where('id',$id)->delete();
         if ($banner_image){
                Session::flash('success',"banner Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','banner Added Faield !!!');
                return redirect()->back();
            }

    }

}
