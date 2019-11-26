<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Auth;
use DB;
use App\User; 
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/create-user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'user_role_id' => ['required', 'string', 'max:255'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //   // dd($data);
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'user_role_id' => $data['user_role_id'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
    //---------------------User List Method------------------//
    public function user_list()
    {   
       return view('admin.login.user_list');
    }

    public function create()
    {
        // $user_role = UserRole::get();
        // $roles = Role::get();
        return view('admin.login.admin_register');
    }

    //---------------------User Create Method------------------//
    // public function employee_register()
    // {
    //     $user_role = UserRole::get();
    //     return view('admin.login.admin-register',compact('user_role'));
    // } 
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
            'roles' => 'required', 
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input); 
        return redirect('user-list');
    }

   
    //---------------------User Delete Method------------------//
    public function user_delete($user_id)
    {
       $user_delete = User::where('id',$user_id)->delete();
       if ($user_delete){
           Session::flash('success',"User Deleted Successfully !!!");
           return redirect()->back();
       }else{
           Session::flash('error','Opps Something Wrong !!!');
           return redirect()->back();
       }
    }
    //  public function user_profile()
    // {
    //     // $user_role = UserRole::get();
    //     return view('admin.login.user_profile',compact('user_role'));
    // }
    public function user_profile_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'roles' => 'required'
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->save();
        if ($user){
            Session::flash('success',"User Information Updated Successfully");
            return redirect('my-profile');
        }else{
            Session::flash('error','Opps Something Wrong !!!');
            return redirect('my-profile');
        }
    } 
    // public function show($id)
    // {
    //     $user_infos = User::get();
    //     return view('admin.login.user_list',compact('user_infos'));
    // }

    //---------------------User Edit Method------------------//
    public function user_edit($user_id)
    { 
       $get_by_id =  User::where('id',$user_id)->first();
       return view('admin.login.user_edit',compact('get_by_id'));
    }

    //---------------------User Update Method------------------//
    public function user_update(Request $request)
    {
          $user_update = User::where('id',$request->id)->update([
                'name'     =>  $request->name,
                'email'    => $request->email,
                'role_id' => $request->role_id, 
        ]);
           if ($user_update){
                Session::flash('success',"User Information Updated Successfully");
                return redirect('user-list');
            }else{
                Session::flash('error','Opps Something Wrong !!!');
                return redirect('user-list');
            }
    }

    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     $roles = Role::get(); 
    //     return view('admin.login.user_edit',compact('user','roles'));
    // }

    //  public function update(Request $request)
    // {
      
    //     $input = $request->all(); 
    //     $user = User::find($request->id);
    //     $user->update($input);
    //     DB::table('model_has_roles')->where('model_id',$request->id)->delete(); 
    //      $role_permission = $user->assignRole($request->input('roles')); 
    //     if ($role_permission){
    //         Session::flash('success',"User Information Updated Successfully");
    //         return redirect()->back(); 
    //     }else{
    //         Session::flash('error','Opps Something Wrong !!!');
    //         return redirect()->back();
    //     }

    // }
    

}
