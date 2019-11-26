<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use Session;
class BrandController extends Controller
{
      // ----------------------Brand Index Method----------------------//

    public function brand_index()
    {
    	$brand_infos = Brand::all();
    	return view('admin.brand.brand_list',compact('brand_infos'));
    }

      // ----------------------Brand Index Method----------------------//

    public function brand_add_process(Request $request)
    {  

      // dd($request->all());
    	// $check_validatoin = $request->validate([
    	//             'brand_name'         => 'required',
    	//             'brand_position'     => 'required',
    	//             'publication_status' => 'required',
    	//             'brand_image'        => 'image|mimes:jpeg,png,jpg'
    	//         ]);

    
    	  $brand_store = new Brand();
    	  $brand_store->name           = $request->name;
        $brand_store->phone           = $request->phone;
    	  $brand_store->email       = $request->email;
    	  $brand_store->address   = $request->address;

        // dd($brand_store);
    	  $brand_store->save();
            if ($brand_store){
                Session::flash('success',"Brand Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Brand Added Faield !!!');
                return redirect()->back();
            }
    	  
    }


      // ----------------------Brand Edit Method----------------------//

	public function brand_edit($id)
	{
        $get_by_id = Brand::where('id',$id)->first();
            return view('admin.brand.brand_edit',compact('get_by_id'));
	}

    // ----------------------Slider Update Method----------------------//

	public function brand_update(Request $request,$id)
    {
    	
        $brand_store = Brand::where('id',$id)->first();
        $brand_store->name           = $request->name;
        $brand_store->phone           = $request->phone;
        $brand_store->email       = $request->email;
        $brand_store->address   = $request->address;

        // dd($brand_store);
        $brand_store->save();
            if ($brand_store){
                Session::flash('success',"Brand Updated Successfully !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Brand Updated Faield !!!');
                return redirect()->back();
            }
	}

  //-----------------------Brand Delete Method------------------------//

     public function brand_delete($id)
    {
        

        $brand = Brand :: where('id',$id);
        if(!is_null($brand)){
         
        $brand->delete();

        }
        session()->flash('success','brand successsfully deleted.');
        return redirect()->back();


    }

}
