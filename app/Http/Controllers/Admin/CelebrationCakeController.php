<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\CelebrationCake;
use App\Model\CommonImage;
use App\Model\CelebrationCakeCategory;
use App\Model\Tag;
use DB;
class CelebrationCakeController extends Controller
{
   // --------------------Cake Add Method-----------------//
   public function cake_add()
   {
   	$tags_infos = Tag::get();
    $category_infos = CelebrationCakeCategory::where('publication_status','=',1)->get();
    return view('admin.cake.celebration_cake_add',compact('tags_infos','category_infos'));
   }

   // --------------------Cake List Method-----------------//
   public function cele_cake_list()
   {

   		$cake_info = CelebrationCake::with('celebration_cakes')->get();
   		return view('admin.cake.celebration_cake_list',compact('cake_info'));
   }

   // --------------------Cake Store Method-----------------//
      public function celebration_cake_add(Request $request)
   {
   		// dd($request->all());

        $celebration_cake = $request->all();
        $celebration_cake['product_slug'] = str_slug($request->cake_name);
        $celebration_cake['top_layer'] = $request->top_layer ? 1 : 0;
        $celebration_cake['middle_layer'] = $request->middle_layer ? 1 : 0;
        $celebration_cake['bottom_layer'] = $request->bottom_layer ? 1 : 0;
        $cake = CelebrationCake::create($celebration_cake);

        $cake->tags()->sync($request->tag_id,false);

        foreach ($request->celebration_cake_image as $key => $celebration_cake_image) {

        //product images and color store
          $extension = $celebration_cake_image->getClientOriginalExtension();
          $remove_space = str_replace(" ","",$request->cake_name);
          $trim = $remove_space.time().str_random(5);
          $fileName = $trim.".".$extension;
          $folderpath = 'Ecom/Cake/';
          $image_url = $folderpath.$fileName;
          $celebration_cake_image->move($folderpath , $fileName);
          $filename = $image_url;


          $common_image = new CommonImage;
          $common_image->image_path = $filename;
          $common_image->imageable()->associate($cake);
          $common_image->save();

          // $store_celebration_cake = CelebrationCakeImage::create([
          //   'celebration_cake_id' => $cake->id,
          //   'celebration_cake_image' => $filename
          // ]);
        }
        if ($common_image){
              Session::flash('success',"Celebration Cake Stored Successfully !!!");
              return redirect()->back();
            }else{
              Session::flash('error','Opps Something Wrong !!!');
              return redirect()->back();
        }
   }
   // --------------------Cake Edit Method-----------------//
	 public function cele_cake_edit($id)
	 {
    	 	$tags_infos = Tag::get();
            $category_infos = CelebrationCakeCategory::get();
    	 	$get_by_id = CelebrationCake::with('celebration_cakes')->where('id',$id)->firstOrFail();
    	 	return view('admin.cake.celebration_cake_edit',compact('tags_infos','get_by_id','category_infos'));
	 }

	 // --------------------Single Image Delete Method-----------------//
	 public function cele_cake_update(Request $request)
	 {
	 	      // dd($request->all());
	 	     if($request->hasFile('celebration_cake_image')) {
	 	      $files = $request->file('celebration_cake_image');
	 	      $extension = $files->getClientOriginalExtension();
              $remove_space = str_replace(" ","",$request->cake_name);
              $trim = $remove_space.time().str_random(5);
              $fileName = $trim.".".$extension;
	 	      $folderpath = 'Ecom/Cake/';
	 	      $image_url = $folderpath.$fileName;
	 	      $files->move($folderpath , $fileName);

	 	  	  // $single_image_store = new CelebrationCakeImage();
	 	  	  // $single_image_store->celebration_cake_id     = $request->id;
	 	  	  // $single_image_store->celebration_cake_image  = $image_url;
	 	  	  // $single_image_store->save();

	 	      $update_infos =  CelebrationCake::where('id', $request->id)
	 	        ->update([
	 	          'cake_name'          => $request->cake_name,
	 	          'product_code'       => $request->product_code,
              'category_slug'      => $request->category_slug,
	 	          'product_slug'       => str_slug($request->cake_name),
	 	          'price'              => $request->price,
	 	          'vat'    		         => $request->vat,
	 	          'discount'    	     => $request->discount,
	 	          'long_description'   => $request->long_description,
	 	          'bottom_layer'       => $request->bottom_layer ? 1 : 0,
	 	          'middle_layer'       => $request->middle_layer ? 1 : 0,
	 	          'top_layer'    	     => $request->top_layer ? 1 : 0,
              'tire_min_size'      => $request->tire_min_size,
              'tire_max_size'      => $request->tire_max_size,
              'hot_trend'          => $request->hot_trend,
              'additional_price'   => $request->additional_price,
              'min_size'           => $request->min_size,
              'max_size'           => $request->max_size,
              'fondant_price'      => $request->fondant_price,
	 	        ]);

            $common_image = new CommonImage;
            $common_image->image_path = $image_url;
            $common_image->imageable()->associate(CelebrationCake::where('id', $request->id)->first());
            $common_image->save();

           CelebrationCake::findOrFail($request->id)->tags()->sync($request->tag_id);
	 	      if ($update_infos){
	 	      	Session::flash('updated');
	 	        return redirect()->back();
	 	      }else{
	 	      	Session::flash('error');
	 	        return redirect()->back();
	 	      }
	 		 }else{
	 	     $update_infos =  CelebrationCake::where('id', $request->id)
	 	       ->update([
	 	          'cake_name'          => $request->cake_name,
	 	          'product_code'       => $request->product_code,
              'category_slug'      => $request->category_slug,
	 	          'product_slug'       => str_slug($request->cake_name),
	 	          'price'              => $request->price,
	 	          'vat'    		         => $request->vat,
	 	          'discount'    	     => $request->discount,
	 	          'long_description'   => $request->long_description,
	 	          'bottom_layer'       => $request->bottom_layer,
	 	          'middle_layer'       => $request->middle_layer,
	 	          'top_layer'    	     => $request->top_layer,
              'additional_price'   => $request->additional_price,
              'min_size'           => $request->min_size,
              'max_size'           => $request->max_size,
              'fondant_price'      => $request->fondant_price,
	 	       ]);
           CelebrationCake::findOrFail($request->id)->tags()->sync($request->tag_id);
	 	     if ($update_infos){
	 	      	Session::flash('updated');
	 	        return redirect()->back();
	 	      }else{
	 	      	Session::flash('error');
	 	        return redirect()->back();
	 	      }
	 	   }
	 }
	 // --------------------Single Image Delete Method-----------------//
	 public function delete_single_cele($id)
	 {
	      $cele_cake = CommonImage::where('id',$id)->first();
        // dd($cele_cake);
	      if($cele_cake !=''){
	           $image_path = $cele_cake->image_path;
	         unlink($image_path);
	         $delete_images = CommonImage::where('id',$id)->delete();
	         if ($delete_images){
	                Session::flash('deleted');
	                return redirect()->back();
	            }
	       }
	 }
   // --------------------Cake Delete Method-----------------//

       public function cele_cake_delete($id)
       {
        $celebration_cake_image = CommonImage::where('imageable_id',$id)->get();
        if($celebration_cake_image !=''){
           foreach($celebration_cake_image as $url) {
             $image_path = $url->image_path;
           unlink($image_path);
           $delete_images = CommonImage::where('imageable_id',$id)->delete();
         }
       }else{}
             $delete_cake = CelebrationCake::where('id',$id)->delete();
             if ($delete_cake){
                    Session::flash('success',"Cake Deleted Successfully !!!");
                    return redirect()->back();
                }else{
                    Session::flash('error','Opps Something Wrong !!!');
                    return redirect()->back();
                }

        }




        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////Calebration cake category////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function cele_cat_index()
    {
    	$category_infos = CelebrationCakeCategory::get();
    	return view('admin.cake_config.celebration_cat',compact('category_infos'));
    }

   // --------------------Cake Category Store Method-----------------//
    public function cele_cat_add(Request $request)
    {
      // dd($request->all());
        $validatedData = $request->validate([
        'category_name' => 'required|unique:celebration_cake_categories,category_name',
        'category_slug' => 'required|unique:celebration_cake_categories,category_slug'
      ]);
    	$store_cake_cat = $request->all();
    	$store_cake_cat['category_slug'] = str_slug($request->category_slug);
    	$store_cele_cat = CelebrationCakeCategory::create($store_cake_cat);
    	if ($store_cele_cat){
    	       Session::flash('success',"Cake Deleted Successfully !!!");
    	       return redirect()->back();
    	   }else{
    	       Session::flash('error','Opps Something Wrong !!!');
    	       return redirect()->back();
    	   }
    }

   // --------------------Cake Category Edit Method-----------------//
    public function cele_cat_edit($id)
	{
        $get_by_id = CelebrationCakeCategory::where('id', $id)->first();
            return view('admin.cake_config.celebration_cat_edit',compact('get_by_id'));
	}

   // --------------------Cake Category Update Method-----------------//
    public function cele_cat_update(Request $request)
	{

     // return $request->all();

    $data = [
      'category_name'        => $request->category_name,
      'category_slug'     => str_slug($request->category_slug),
      'category_keyword'  => $request->category_keyword,
      'publication_status' => $request->publication_status,
      'show_on_top' => $request->show_on_top ? 1 : 0
   ];
         $update_infos =  CelebrationCakeCategory::where('id', $request->id)
           ->update($data);


         if ($update_infos){
          	Session::flash('updated');
            return redirect('celebration-cat-list');
          }else{
          	Session::flash('error');
            return redirect()->back();
          }
       }
   // --------------------Cake Category Delete Method-----------------//
    public function cele_cat_delete($id)
    {
    	$store_cele_delete = CelebrationCakeCategory::where('id',$id)->delete();
    	if ($store_cele_delete){
    	       Session::flash('success',"Cake Deleted Successfully !!!");
    	       return redirect()->back();
    	   }else{
    	       Session::flash('error','Opps Something Wrong !!!');
    	       return redirect()->back();
    	   }
    }
}
