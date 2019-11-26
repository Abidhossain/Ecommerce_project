<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class ForgotPasswordController extends Controller
{
    public function change_password(){
    	return view('admin.login.forgotpassword');
    }
//    public function forgot_password_process($reset_id)
//    {
// //       dd($request->all());
//    		  $check_pass = User::where('id',$reset_id)->first();
//    		  $check_pass->password == Hash::make('123456aA'); 
//    }
    public function updateAuthUserPassword(Request $request)
    {
        $this->validate($request, [
            'current' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->current, $user->password)) {
            Session::flash('error','Opps Something Wrong !!!');
            return redirect()->back();
        }

        $user->password = Hash::make($request->password);
        $user->save();
        if ($user){
            Session::flash('success',"Password Updated Successfully");
            return redirect()->back();
        }else{
            Session::flash('error','Opps Something Wrong !!!');
            return redirect()->back();
        } 
    } 

}
