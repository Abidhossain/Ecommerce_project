<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Sponge;
use App\Model\Cream;
use App\Model\StudioSample;
use App\Model\CommonImage;
use App\Model\StudioCakeBasicConfig;
use Session;
use DB;
class CakeStudioController extends Controller
{

	 //-----------------------Studio Cake Size Method------------------------//
	public function studio_cake_basic()
	{
		$studio_cake_config = StudioCakeBasicConfig::first();
		return view('admin.cake_studio_config.studio_cake_config',compact('studio_cake_config'));
	}

	 //-----------------------Studio Cake Size Method------------------------//
	public function studio_cake_basic_update(Request $request)
	{
		// dd($request->all());

    	$count_row = StudioCakeBasicConfig::get()->count();
        if($count_row < 1){
            $update_infos =  StudioCakeBasicConfig::insert([
	            'min_size'     => $request->min_size,
	            'max_size'     => $request->max_size,
	            'studio_cake_price_per_kg'     => $request->studio_cake_price_per_kg,
	            'additional_cost_for_printed'     => $request->additional_cost_for_printed,
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
        	$update_infos =  StudioCakeBasicConfig::where('id', $request->id)
        	    ->update([
		            'min_size'     => $request->min_size,
		            'max_size'     => $request->max_size,
	            	'studio_cake_price_per_kg'     => $request->studio_cake_price_per_kg,
	            	'additional_cost_for_printed'     => $request->additional_cost_for_printed,
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
		return view('admin.cake_studio_config.studio_cake_config',compact('studio_cake_config'));
	}
	 //-----------------------Studio Cake Price Per Kg Method------------------------//
	public function studio_cake_price_per_kg()
	{
		$studio_cake_price = StudioCakePrice::first();
		return view('admin.cake_studio_config.studio_cake_price_per_kg',compact('studio_cake_price'));
	}

	 //-----------------------Studio Cake Price Per Kg Method------------------------//
	public function studio_cake_price_per_kg_update(Request $request)
	{
		// dd($request->all());

    	$count_row = StudioCakePrice::get()->count();
        if($count_row < 1){
            $update_infos =  StudioCakePrice::insert([
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
        	$update_infos =  StudioCakePrice::where('id', $request->id)
        	    ->update([
		            'studio_cake_price_per_kg' => $request->studio_cake_price_per_kg,
        	    ]);
        	if ($update_infos){
        	  Session::flash('success');
        	  return redirect()->back();
        	}else{
        	  Session::flash('error');
        	  return redirect()->back();
        	}
        }
		return view('admin.cake_studio_config.studio_cake_size',compact('studio_cake_size'));
	}

	 //-----------------------Sponge  Method------------------------//

 	public function cake_sponge_index()
	 {
	 	$sponge_info = Sponge::orderBy('sponge_layer_num')->get();
	  	return view('admin.cake_studio_config.cake_sponge_list',compact('sponge_info'));
	 }

	 //-----------------------Sponge Store Method------------------------//

 	public function cake_sponge_store(Request $request)
	 {
 	 	// dd($request->all());
 	 	$check_validatoin = $request->validate([
 	 	            'sponge_name'        => 'required',
 	 	            'sponge_image'        => 'image|mimes:jpeg,png,jpg'
 	 	        ]);
		$sponge_store = $request->all();

 	 	  if ($request->hasFile('sponge_image')) {
 	       $files = $request->file('sponge_image');
 	       $extension = $files->getClientOriginalExtension();
 	       $fileName = str_random(5).".".$extension;
 	       $folderpath = 'Ecom/Cakes/Sponge/';
 	       $image_url = $folderpath.$fileName;
 	       $files->move($folderpath , $fileName);


 	 	  $sponge_store['sponge_image'] = $image_url;
 	 	  $sponge_add = Sponge::create($sponge_store);
 	         if ($sponge_add){
 	             Session::flash('success',"Banner Added Completed !!!");
 	             return redirect()->back();
 	         }else{
 	             Session::flash('error','Banner Added Faield !!!');
 	             return redirect()->back();
 	         }
 	 	  }
	 }

	 //-----------------------Sponge Delete Method------------------------//

	    public function sponge_delete($id)
	   {
        $sponge = Sponge::where('id',$id)->first();
        $image_path = $sponge->sponge_image;
        if($sponge !=''){
           unlink($image_path);
        }
        $sponge_image = Sponge::where('id',$id)->delete();
        if ($sponge_image){
               Session::flash('success',"banner Added Completed !!!");
               return redirect()->back();
           }else{
               Session::flash('error','banner Added Faield !!!');
               return redirect()->back();
           }

	   }


   	//-----------------------Cream Method------------------------//

    	public function cake_cream_index()
   	{
   	 	$cream_info = Cream::orderBy('cream_layer_num')->get();
   	  	return view('admin.cake_studio_config.cake_cream_list',compact('cream_info'));
   	}

	 //-----------------------Cream Store Method------------------------//

	 public function cake_cream_store(Request $request)
	 {
 	 	//dd($request->all());
 	 	$check_validatoin = $request->validate([
 	 		'cream_name'        => 'required',
 	 	     'cream_image'        => 'image|mimes:jpeg,png,jpg'
 	 	        ]);
		$cream_store = $request->all();

 	 	  if ($request->hasFile('cream_image')) {
 	       $files = $request->file('cream_image');
 	       $extension = $files->getClientOriginalExtension();
 	       $fileName = str_random(5).".".$extension;
 	       $folderpath = 'Ecom/Cakes/Cream/';
 	       $image_url = $folderpath.$fileName;
 	       $files->move($folderpath , $fileName);


 	 	  $cream_store['cream_image'] = $image_url;
 	 	  $cream_add = Cream::create($cream_store);
 	         if ($cream_add){
 	             Session::flash('success',"Banner Added Completed !!!");
 	             return redirect()->back();
 	         }else{
 	             Session::flash('error','Banner Added Faield !!!');
 	             return redirect()->back();
 	         }
 	 	  }
	 }

	  //-----------------------Cream Delete Method------------------------//

	    public function cream_delete($id)
	   {
	        $cream = Cream::where('id',$id)->first();
	        $image_path = $cream->cream_image;
		      if($cream !=''){
		         unlink($image_path);
		      }
	        $cream_delete  = Cream::where('id',$id)->delete();
	        if ($cream_delete ){
	               Session::flash('success',"banner Added Completed !!!");
	               return redirect()->back();
	           }else{
	               Session::flash('error','banner Added Faield !!!');
	               return redirect()->back();
	           }

	   }

	  //-----------------------Cake Studio Method------------------------//
	   public function studio()
	   {
	   	$studio_info = StudioSample::with('studio_samples')->get();
	   	// dd($studio_info);
	   		return view('admin.cake_config.studio',compact('studio_info'));
	   }

	   public function studio_store(Request $request)
	   {
	 	 	// dd($request->all());
	 	 	$check_validatoin = $request->validate([
	 	 	            'studio_sample_name'        => 'required',
	 	 	            'studio_images'        => 'image|mimes:jpeg,png,jpg'
	 	 	        ]);

	 	 	  if ($request->hasFile('studio_images')) {
	 	       $files = $request->file('studio_images');
	 	       $extension = $files->getClientOriginalExtension();
	 	       $remove_space = str_replace(" ","",$request->studio_sample_name);
	 	       $trim = $remove_space.time().str_random(5);
	 	       $fileName = $trim.".".$extension;
	 	       $folderpath = 'Ecom/Cakes/StudioSample/';
	 	       $image_url = $folderpath.$fileName;
	 	       $files->move($folderpath , $fileName);
	 	 	  // $sponge_store['studio_images'] = $image_url;
	 	       $data = $request->all();
	 	 	  $sponge_add = StudioSample::create($data);

	 	 	  //insert to morph table
	 	 	  $common_image = new CommonImage;
	 	 	  $common_image->image_path = $image_url;
	 	 	  $common_image->imageable()->associate($sponge_add);
	 	 	  $common_image->save();

	 	         if ($common_image){
	 	             Session::flash('success',"Banner Added Completed !!!");
	 	             return redirect()->back();
	 	         }else{
	 	             Session::flash('error','Banner Added Faield !!!');
	 	             return redirect()->back();
	 	         }
	 	 	  }
	   }
	    public function studio_delete($id)
	   	   {
	   	        $cream = CommonImage::with('imageable')->where('imageable_id',$id)->first();
	   	        // dd($cream);
	   	        $image_path = $cream->image_path;
	   		      if($cream !=''){
	   		         unlink($image_path);

	   	        $delete_image = CommonImage::where('imageable_id',$id)->delete();
	   		      }
	   	        $cream_delete  = StudioSample::where('id',$id)->delete();
	   	        if ($cream_delete ){
	   	               Session::flash('success',"banner Added Completed !!!");
	   	               return redirect()->back();
	   	           }else{
	   	               Session::flash('error','banner Added Faield !!!');
	   	               return redirect()->back();
	   	           }

	   	   }

}
