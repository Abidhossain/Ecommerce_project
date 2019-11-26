<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Size; 
use Session;
class SizeController extends Controller
{ 

    //------------------------ Size List Method -----------------------//

    public function index()
    {
        $sizes_info = Size::get();
        return view('admin.sizes.sizes_list',compact('sizes_info'));
    }  
    //------------------------ Size Store Method -----------------------//
    public function store(Request $request)
    {
        $check_validation = $request->validate([
            'size_name' => 'required|unique:sizes,size_name',
            'publication_status' => 'required'
        ]);
        $size_add = Size::create($request->all());
        if ($size_add) {
           Session::flash('success',"Size Added !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect()->back();
            }
    }   
    //------------------------ Size Edit Method -----------------------//
    public function edit($id)
    {
         $get_by_id = Size::where('size_id',$id)->first();
         return view('admin.sizes.size_edit',compact('get_by_id'));
    } 
    //------------------------ Size Update Method -----------------------//
    public function update(Request $request)
    {
         $check_validation = $request->validate([
            'size_name' => 'required',
            'publication_status' => 'required'
        ]);

     $size_update = Size::where('size_id',$request->size_id)
                    ->update([
                      'size_name' => $request->size_name,
                      'publication_status' => $request->publication_status
                    ]);
        if ($size_update) {
           Session::flash('success',"Size Updaetd !!!");
                return redirect('size-list');
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect('size-list');
            }
    } 
    //------------------------ Size Delete Method -----------------------//
    public function destroy($id)
    {
        $size_delete = Size::where('size_id',$id)->delete();
         if ($size_delete) {
           Session::flash('success',"Size Updaetd !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect()->back();
            }
    }
}
