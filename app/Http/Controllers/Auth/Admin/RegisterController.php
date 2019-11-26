<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;

class RegisterController extends Controller
{
    

    
public function admin_register(){
    return view('admin.login.admin_register');
}

  public function admin_store(Request $request)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => ['required', 'string', 'min:8', 'confirmed'], 
        //     'roles' => 'required', 
        // ]);
        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        // $user = User::create($input); 
        // return redirect('user-list')->with(['Success','User Created Successfylly']);
    
 $validatedData = $request->validate([
           'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);
        
         
         $user = new User;
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // dd($user);
        $user->save();
        return redirect()->route('user_login');

    }
      public function user_list()
    {
        return view('admin.login.user_list');
    }


   


}
