<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Gallery;
class GalleryController extends Controller
{
    public function gallery_index()
    {
    	$gallery_pictures = Gallery::get();
    	return view('admin.gallery.gallery_list',compact('gallery_pictures'));
    }
     // ----------------------banner Index Method----------------------//

    public function gallery_add_process(Request $request)
    {
    	// dd($request->all());
    	$check_validatoin = $request->validate([ 
    	            'gallery_image'        => 'image|mimes:jpeg,png,jpg,gif'
    	        ]);

    	  if ($request->hasFile('gallery_image')) {
          $files = $request->file('gallery_image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'Ecom/Gallery/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);

    	  $banner_store = new Gallery(); 
    	  $banner_store->gallery_image          = $image_url;
    	  $banner_store->publication_status   = $request->publication_status;
    	  $banner_store->save();
            if ($banner_store){
                Session::flash('success',"Gallery Added Successfylly !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Gallery Added Faield !!!');
                return redirect()->back();
            }
    	  }
    }
   // ----------------------banner Edit Method----------------------//

	public function gallery_edit($id)
	{
        $get_by_id = Gallery::where('id',$id)->first();
            return view('admin.gallery.gallery_edit',compact('get_by_id'));
	}

    // ----------------------Slider Update Method----------------------//

	public function gallery_update(Request $request)
    { 
     
    	 if ($request->gallery_image !=''){
              $img_url = Gallery::where('id',$request->id)->first();
             $image_path = $img_url->gallery_image;
             if($img_url !=''){
                unlink($image_path);
            }
          $files = $request->file('gallery_image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'Ecom/Gallery/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);

          // update infos with logo//

        $update_infos =  Gallery::where('id', $request->id)
          ->update([ 
          	'publication_status'  => $request->publication_status,
          	'gallery_image'         => $image_url,
          ]);
			if ($update_infos){
				Session::flash('success',"Gallery  Updated !!!");
			return redirect('/gallery-list');
			}else{
				Session::flash('error','Opps Something Wrong !!!');
			return redirect('/gallery-list');
			}
    	}else{

    		  // update infos with logo//

        $update_infos =  Gallery::where('id', $request->id)
          ->update([ 
          	'publication_status'  => $request->publication_status
          ]);
			if ($update_infos){
				Session::flash('success',"Gallery  Updated !!!");
			return redirect('/gallery-list');
			}else{
				Session::flash('error','Opps Something Wrong !!!');
			return redirect('/gallery-list');
			}
    	}
	}


     //-----------------------banner Delete Method------------------------//

     public function delete_gallery($id)
    {
         $gallery = Gallery::where('id',$id)->first();
         $image_path = $gallery->gallery_image;
         if($gallery !=''){
            unlink($image_path);
         }
         $banner_image = Gallery::where('id',$id)->delete();
         if ($banner_image){
                Session::flash('success',"banner Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','banner Added Faield !!!');
                return redirect()->back();
            }

    }
}
