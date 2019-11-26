<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Faq;
use Session;
class FaqController extends Controller
{
    //----------------Faq List Method--------------------//
    public function faq_index()
    {
      $faq_infos = Faq::get();
      return view('admin.faq.faq_list',compact('faq_infos'));
    }

    //----------------Faq Store Method--------------------//
    public function faq_add_process(Request $request)
    {
      $check_validation = $request->validate([
        'faq_question' => 'required',
        'faq_answer' => 'required'
      ]);
      $faq_add = Faq::create($request->all());
      if ($faq_add){
            Session::flash('success',"Faq Added Successfully!!!");
            return redirect()->back();
        }else{
            Session::flash('error','Opps Something Wrong!!!');
            return redirect()->back();
        }
    }

    //------------------------ Size Edit Method -----------------------//
    public function faq_edit($faq_id)
    {
         $get_by_id = Faq::where('id',$faq_id)->first();
         return view('admin.faq.faq_edit',compact('get_by_id'));
    }
    //------------------------ Size Update Method -----------------------//
    public function faq_update(Request $request)
    {
         $check_validation = $request->validate([
            'faq_question' => 'required',
            'faq_answer' => 'required'
        ]);

     $size_update = Faq::where('id',$request->faq_id)
                    ->update([
                      'faq_question' => $request->faq_question,
                      'faq_answer' => $request->faq_answer
                    ]);
        if ($size_update) {
           Session::flash('success',"Size Updaetd !!!");
                return redirect('faq-list');
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect('faq-list');
            }
    }
    //------------------------ Faq Delete Method -----------------------//
    public function faq_delete($faq_id)
    {
        $faq_delete = Faq::where('id',$faq_id)->delete();
         if ($faq_delete) {
           Session::flash('success',"Faq Deleted");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect()->back();
            }
    }
}
