<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Sub_category;
use Session;

use Image;
use File;
use Carbon\Carbon;


class Sub_CategoryController extends Controller
{
    
      // ----------------------Category Index Method----------------------//

    public function sub_category_index()
    {
    	// $main_category = Category::where('parent_id',null)->get(); 
      $category_infos = Sub_category::paginate(20); 
      $main_category_infos = Category::all();
    	return view('admin.sub_category.sub_category_list',compact('category_infos','main_category_infos'));
    }

      // ----------------------Category Store Method----------------------//

    public function sub_category_store_process(Request $request)
    {
    	 // dd($request->all());
    	// $check_validation = $request->validate([ 
     //    'name' => 'required|unique:categories,name',
    	// 	'image'        => 'image|mimes:jpeg,png,jpg',  
    	// ]);


 
  

        $category_add = new Sub_category();
        $category_add->name         = $request->name;	
        $category_add->category_id         = $request->category_id;	
        $category_add->description      = $request->description;



          $category_add->save();
            if ($category_add){
                Session::flash('success',"Sub Category Added Successfully !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect()->back();
            }

    }
      // ----------------------Category Edit Method----------------------//

	public function sub_category_edit($id)
	{
       //  $main_category = Category::where('parent_id',null)->get(); 
    	  // $category_infos = Category::where('publication_status','=',1)->get();
        
         $main_category_infos = Category::all();
        $get_by_id = Sub_category::where('id',$id)->first();
            return view('admin.sub_category.sub_category_edit',compact('get_by_id','main_category_infos'));
	}
      // ----------------------Category Update Method----------------------//

	public function sub_category_update(Request $request,$id)
	{
		  // dd($request->all());
    
   

//         $category_update =  Sub_category::where('id',$id)->first();
//         $category_update->name         = $request->name;
//         $category_update->description      = $request->description;



//    if($request->image > 0){
//              //  Delete old image from folder
//               if(File::exists('img/category/'.$category_update->image)){
//                   File::delete('img/category/'.$category_update->image);
//               }
//             $currentDate = Carbon::now()->toDateString();
//             $image = $request->file('image');
//             $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
//             $location = public_path('img/category/'.$img);
//             Image:: make($image)->save($location);
//             $category_update->image = $img;

      
// // dd($category_update);
//           $category_update->save();
//             if ($category_update){
//                 Session::flash('success',"Category updated Successfully !!!");
                
//             }else{
//                 Session::flash('error','Opps Something Wrong !!!');
              
//             }
//             return redirect()->route('category-list');

// 	}

// dd($request->all());

        $category_edit = Sub_category::find($id);
        $category_edit->name         = $request->name; 
        $category_edit->category_id         = $request->category_id; 
        $category_edit->description      = $request->description;



          $category_edit->save();
            if ($category_edit){
                Session::flash('success',"Sub Category Added Successfully !!!");
                return redirect()->route('sub_category-list');
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect()->route('sub_category-list');
            }



}
	 //-----------------------Slider Delete Method------------------------//

     public function sub_category_delete($id)
    {

      $category = Sub_category::find($id);
         if(!is_null($category)){
         
            $category->delete();
    }

        session()->flash('success','Sub Category successsfully deleted.');
        return redirect()->route('sub_category-list');

  }
  
}
