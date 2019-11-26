<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\ProductType;
use Session;  
use DB;
class CategoryController extends Controller
{
      // ----------------------Category Index Method----------------------//

    public function category_index()
    {
    	// $main_category = Category::where('parent_id',null)->get();  
      $product_type_infos = ProductType::all();
      // $category_infos =  DB::table('categories') 
      //                     ->join('product_types','product_types.id','=','categories.product_type_id')
      //                     ->select('categories.*','product_types.*')
      //                     ->get();
      $category_infos = Category::with('product_types')->get();
        // dd($category_infos);
    	return view('admin.category.category_list',compact('category_infos','product_type_infos'));
    }

      // ----------------------Category Store Method----------------------//

    public function category_store_process(Request $request)
    {  
 
      $check_validatoin = $request->validate([
                  'name' => 'required|unique:categories,name',
                  'image' => 'image|mimes:jpeg,png,jpg,gif'
              ]); 
        
        $category_add                   = new Category();
        $category_add->name             = $request->name;
        $category_add->product_type_id  = $request->product_type_id;
        $category_add->description      = $request->description; 
        $category_add->show_on_category      = $request->show_on_category ? 1 : 0;
        //store  image
        if ($request->hasFile('image')) {
          $files = $request->file('image');
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'Pharmacy/Category/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);
          $category_add->image = $image_url; 
        } 
        $category_add->save();
        if ($category_add){
            Session::flash('success',"Category Added Successfully !!!");
            return redirect()->back();
        }else{
            Session::flash('error','Opps Something Wrong !!!');
            return redirect()->back();
        }

    }
      // ----------------------Category Edit Method----------------------//

	public function category_edit($id)
	{
       //  $main_category = Category::where('parent_id',null)->get(); 
    	  // $category_infos = Category::where('publication_status','=',1)->get();
         $product_type_infos = ProductType::all(); 
        $get_by_id = Category::where('id',$id)->first();
            return view('admin.category.category_edit',compact('get_by_id','product_type_infos'));
	}
      // ----------------------Category Update Method----------------------//

	public function category_update(Request $request,$id)
	{

		  // dd($request->all()); 
 
          if ($request->image !=''){
            $img_url = Category::where('id',$request->id)->first();
            $image_path = $img_url->image;
            if($img_url !='' ){
            unlink($image_path);
          }
          $files = $request->file('image');
          $extension = $files->getClientOriginalExtension(); 
          $fileName = preg_replace('/\s+/', '',strtolower($request->name)).time().".".$extension;
          $folderpath = 'Pharmacy/Category/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);

          // update infos with logo//

        $update_infos =  Category::where('id', $request->id)
          ->update([
            'image'              => $image_url,
            'name'               => $request->name,  
            'description'        => $request->description,  
            'show_on_category' => $request->show_on_category ? 1 : 0
          ]);
            if ($update_infos){
              Session::flash('success',"Category Updated !!!");
              return redirect('category-list');
            }else{
              Session::flash('error','Opps Something Wrong !!!');
              return redirect('category-list');
            }
      }else{
        // update infos with logo// 
        $update_infos =  Category::where('id', $request->id)
          ->update([
          'name'               => $request->name,  
          'description'        => $request->description,  
          'show_on_category' => $request->show_on_category ? 1 : 0
        ]);
          if ($update_infos){
            Session::flash('success',"Category Updated !!!");
            return redirect('category-list');
          }else{
            Session::flash('error','Opps Something Wrong !!!');
            return redirect('category-list');
          }  
      }
}
	 //-----------------------Slider Delete Method------------------------//

     public function category_delete($id)
    {

      $category = Category::find($id);
         if(!is_null($category)){
         
            // delete slider image
            if(File::exists('img/category/'.$category->image)){
                File::delete('img/category/'.$category->image);
            }

            $category->delete();

        session()->flash('success','Category successsfully deleted.');
        return redirect()->back();

    }
  }
  
}
