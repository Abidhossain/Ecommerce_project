<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Attribute;
use Session;
class AttributeController extends Controller
{
    //-------------------------Attribute Index Method----------------------//

    public function attribute_index()
    {
    	$attribute_infos = Attribute::get();
    	return view('admin.attributes.attribute_list',compact('attribute_infos'));
    }

    //-------------------------Attribute Store Method----------------------//

    public function attribute_add_process(Request $request)
    {
    	$check_validation = $request->validate([
    		'attribute_name'     => 'required',
    		'product_size'       => 'required',
    		'publication_status' => 'required'
    	]);
    	$attribute_add                     = new Attribute();
    	$attribute_add->attribute_name     = $request->attribute_name;
    	$attribute_add->product_size       = $request->product_size;
    	$attribute_add->publication_status = $request->publication_status;
    	$attribute_add->save();
    	 if ($attribute_add){
                Session::flash('success',"Attribute Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect()->back();
            }
    }

      // ----------------------Brand Edit Method----------------------// 

	public function attribute_edit($attribute_id)
	{ 
        $get_by_id = Attribute::where('attribute_id',$attribute_id)->first();
            return view('admin.attributes.attribute_edit',compact('get_by_id')); 
	}
     // ----------------Attribute Update Method---------------------//

    public function attribute_update(Request $request)
    {
         $update_infos =  Attribute::where('attribute_id', $request->attribute_id) 
          ->update([
            'attribute_name'       => $request->attribute_name, 
            'product_size'         => $request->product_size, 
            'publication_status'   => $request->publication_status
          ]);
            if ($update_infos){
                Session::flash('success',"Manufacture Updated Successfully!!!");
            return redirect('/attributes-list');
            }else{
                Session::flash('error','Opps Something Wrong !!!');
            return redirect('/attributes-list');
            } 
    }

     // ----------------Attribute Delete Method---------------------//

    public function attribute_delete($attribute_id)
    {
    	 $attribute_delete = Attribute::where('attribute_id',$attribute_id)->delete(); 
    	 if ($attribute_delete){
                Session::flash('success',"Attribute Deleted Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect()->back();
            }

    }
}
