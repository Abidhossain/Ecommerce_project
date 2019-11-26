<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserRole;
use Session;
class UserRoleManagemanet extends Controller
{

  //------------------User Role Method---------------------//
    public function user_role_list()
    { 
        $role_infos = UserRole::get();
    	return view('admin.user_role.user_role_list',compact('role_infos'));
    }

  //------------------User Role Read Method---------------------//
     public function user_role_read()
    {
       $role_infos =  UserRole::get();
       return view('admin.user_role.role_read',compact('role_infos'));
    }

  //------------------User Role Store Method---------------------//
    public function role_add_process(Request $request)
    {
		$check_validation = $request->validate([
		'user_role_name' => 'required|unique:user_roles,user_role_name', 
		]);
      $add_role = UserRole::create($request->all());
      if ($add_role){ 
            return response()->json($add_role);
        }else{ 
            return response()->json($add_role);
      }
    }

  //------------------User Role Edit Method---------------------//
     public function user_role_edit($role_id)
    {
       $role_infos =  UserRole::where('id',$role_id)->first();
       return response()->json($role_infos);
    }

  //------------------User Role Update Method---------------------//
     public function user_role_update(Request $request)
    {
       $role_infos =  UserRole::where('id',$request->id)
                    ->update([
                      'user_role_name' => $request->user_role_name
                    ]);
       return response()->json($role_infos);
    }
  //------------------User Role Delete Method---------------------//
     public function user_role_delete($role_id)
    {
       $role_delete =  UserRole::where('id',$role_id)->delete();
       if ($role_delete){
                Session::flash('success',"User Role Deleted !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect()->back();
            }
    }

    public function set_user_permission($user_id)
    {
        return view('admin.user_role.user_role',compact('user_id'));
    }
}
