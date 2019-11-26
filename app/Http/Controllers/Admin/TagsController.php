<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tag;
use Session;
class TagsController extends Controller
{
    // ----------------------Tags Index Method----------------------// 

   public function tags_index()
   {
   		$brand_infos = Tag::get();
   		return view('admin.brand.brand_list',compact('brand_infos'));
   }
    // ---------------------Tags Store Method----------------------// 

   public function tags_add_process(Request $request)
   {
   		$check_validation = $request->validate([
   			'tags_name' => 'required|unique:tags,tags_name'
   		]);
   		$tags_add = new Tag();
   		$tags_add->tags_name = $request->tags_name;
   		$tags_add->save();
   		 if ($tags_add){
                Session::flash('success',"Tags Added Successfully !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect()->back();
            }
   }
    // ----------------------Tags Edit Method----------------------// 

   public function tags_edit($tags_id)
   {
   		$get_by_id = Tag::where('id',$tags_id)->first();
        return view('admin.tags.tags_edit',compact('get_by_id'));
   } 

    // ----------------------Tags Update Method----------------------// 
   
   public function tags_update(Request $request)
   {
     $check_validation = $request->validate([
        'tags_name' => 'required'
     ]);
     $update_tags = Tag::where('id',$request->id)
                    ->update([
                      'tags_name' => $request->tags_name
                    ]);
        if ($update_tags){
             Session::flash('success',"Tags Deleted Successfully !!!");
             return redirect('tags-list');
         }else{
             Session::flash('error','Opps Something Wrong !!!');
             return redirect('tags-list');
         }
   }

    // ---------------------Tags Delete Method----------------------//

   public function tags_delete($tags_id)
   {
   		$tags_delete = Tag::where('id',$tags_id)->delete();
   		if ($tags_delete){
          Session::flash('success',"Tags Deleted Successfully !!!");
          return redirect()->back();
        }else{
          Session::flash('error','Opps Something Wrong !!!');
          return redirect()->back();
        }
   }
}
