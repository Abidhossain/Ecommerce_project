<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use Session;


use Image;
use File;
use Carbon\Carbon;


class SliderController extends Controller
{

      // ----------------------Slider Index Method----------------------// 

     public function slider_index()
    {
    	$slider_infos = Slider::get();  
    	return view('admin.sliders.slider_list',compact('slider_infos'));
    }

     // ----------------------Slider Store Method----------------------// 

    public function slider_add_process(Request $request)
    {
 
            $check_validatoin = $request->validate([  
                'slider_image'   => 'image|mimes:jpeg,png,jpg,gif'
            ]);  

            $files = $request->file('slider_image');
            $extension = $files->getClientOriginalExtension();
            $fileName = str_random(5).".".$extension;
            $folderpath = 'Pharmacy/Slider/';
            $image_url = $folderpath.$fileName;
            $files->move($folderpath , $fileName);   

            $slider = new Slider();
            $slider->slider_title     = $request->slider_title;
            $slider->slider_slug      = $request->slider_slug;
            $slider->slider_position  = $request->slider_position; 
            $slider->description      = $request->description; 
            $slider->slider_image     = $image_url;  
    	    $slider->save();

            if ($slider){
                Session::flash('success',"Slider Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Slider Added Faield !!!');
                return redirect()->back();
            }

            
    	  }
    

    // ----------------------Slider Edit Method----------------------// 
    public function slider_edit($slider_id)
    {
		$get_by_id = Slider::where('slider_id',$slider_id)->first();
		return view('admin.sliders.slider_edit',compact('get_by_id'));
    }
     
    // ----------------------Slider Update Method----------------------// 

    public function slider_update(Request $request)
    {   
      // dd($request->all());  
        $update_infos = Slider::where('slider_id',$request->slider_id)->first();
        // dd($update_infos);
        $update_infos->slider_title      = $request->slider_title;
        $update_infos->slider_slug       = $request->slider_slug;
        $update_infos->slider_position   = $request->slider_position; 
        $update_infos->description       = $request->description; 
 

           if(file_exists($request->slider_image)){
             $files = $request->file('slider_image');
             $extension = $files->getClientOriginalExtension();
             $fileName = str_random(5).".".$extension;
             $folderpath = 'Pharmacy/Slider/';
             $image_url = $folderpath.$fileName;
             $files->move($folderpath , $fileName);   
            if(File::exists($update_infos->slider_image)){
                 File::delete($update_infos->slider_image);
             } 
             $update_infos->slider_image = $image_url;
           }
    
        $update_infos->save(); 
        if ($update_infos){
        Session::flash('success',"Slider Updated !!!");
        return redirect()->route('slider-list');
        }else{
        Session::flash('error','Opps Something Wrong !!!');
        return redirect()->route('slider-list');
        } 

    }
	
   //-----------------------Slider Delete Method------------------------//

     public function slider_delete($slider_id)
    {  
         // $slider = Slider::where('slider_id',$slider_id)->first();
         // $image_path = $slider->slider_image;
         // if($slider !=''){
         //    unlink($image_path);
         // }
         // $slider_delete = Slider::where('slider_id',$slider_id)->delete();
         // if ($slider_delete){
         //        Session::flash('success',"Slider Deleted Completed !!!");
         //        return redirect()->back();
         //    }else{
         //        Session::flash('error','Opps Something Wrong!!!');
         //        return redirect()->back();
         //    }
         //    
         
          $slider = Slider :: find($slider_id);
        if(!is_null($slider)){
         
            // delete slider image
            if(File::exists('img/slider/'.$slider->slider_image)){
                File::delete('img/slider/'.$slider->slider_image);
            }
        $slider->delete();
        }
        session()->flash('success','Slider successsfully deleted.');
        return redirect()->back();
    }
        
    
}
