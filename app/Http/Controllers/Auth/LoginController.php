<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('test');

        // if ( Auth::check() && Auth::user()->role->id == 1) {
        //     $this->redirectTo = route('dashboard');

        // }
        // elseif( Auth::check() && Auth::user()->role->id == 2) {
            
        //      $this->redirectTo = route('index');
        // }else{
        //     return redirect()->route('login');
        // }
        

        // $this->middleware('guest')->except('logout');
        if (Auth::check() && Auth::user()->role_id == 1) {
            $this->redirectTo = route('dashboard');
        } 
        $this->middleware('guest')->except('logout');

    }

    public function authenticated()
    {
        if(auth()->user()->role_id == 1)
        {
            return redirect('/dashboard');
        } 
        elseif(auth()->user()->role_id == 2)
        {
            return redirect('/');
        } 

        return redirect('/');
    }

public function admin_login_method(){
    return view('admin.login.login');
}


}
