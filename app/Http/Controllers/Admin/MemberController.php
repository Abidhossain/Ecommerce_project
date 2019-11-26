<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Memberform;

class MemberController extends Controller
{
    
public function member_form(){
	return view('admin.member.member_form');
}

public function member_store(Request $request){

$member = new Memberform();
$member->executive_name = $request->executive_name;
$member->privilege_card_no = $request->privilege_card_no;
$member->name = $request->name;
$member->email = $request->email;
$member->cell_number = $request->cell_number;
$member->present_address = $request->present_address;
$member->permanent_address = $request->permanent_address;
$member->hospital_name = $request->hospital_name;
$member->doctors_name = $request->doctors_name;
$member->problem_type = $request->problem_type;
$member->attache_pharmacy = $request->attache_pharmacy;
$member->medicine_type = $request->medicine_type;
// dd($member);
$member->save();
return redirect()->route('member_list');

}

public function member_list(){
	$members = Memberform::all();

	return view('admin.member.member_list',compact('members'));
}

public function member_edit($id){
   $member = Memberform::find($id);
        if(!is_null($member)){
            return view('admin.member.member_edit',compact('member'));
        }else{
            return redirect()->route('member_list');
        }

}


public function member_update(Request $request,$id){

$member = Memberform::find($id);
$member->executive_name = $request->executive_name;
$member->privilege_card_no = $request->privilege_card_no;
$member->name = $request->name;
$member->email = $request->email;
$member->cell_number = $request->cell_number;
$member->present_address = $request->present_address;
$member->permanent_address = $request->permanent_address;
$member->hospital_name = $request->hospital_name;
$member->doctors_name = $request->doctors_name;
$member->problem_type = $request->problem_type;
$member->attache_pharmacy = $request->attache_pharmacy;
$member->medicine_type = $request->medicine_type;

$member->save();
return redirect()->route('member_list');

}


  public function member_delete($id){
        $member= Memberform :: find($id);
        if(!is_null($member)){
         
        $member->delete();
        }
        session()->flash('success','Member successsfully deleted.');
        return redirect()->back();
    }



}
