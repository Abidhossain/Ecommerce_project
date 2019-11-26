<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Model\CustomerInfo;
use App\Model\Order;
use Session;
use DB;
class CustomerController extends Controller
{

    public function index()
    {
         if(Session::get('id')){
            return redirect('/');
        }else{
        return view('frontend.pages.login_register');
        }
    }
    public function create()
    {
        if(Session::get('id')){
            return redirect('/index');
        }else{
            return view('frontend.pages.login_register');
        }
    }
    public function store(Request $contact)
    {
         $check_validation = $contact->validate([
           'full_name'      => 'required',
           'customer_email' => 'unique:customer_infos|max:255',
           'customer_phone' => 'unique:customer_infos',
           'password'       => 'required',
         ]);
          $customer_store = $contact->all();
          $customer_store['password'] = md5($contact->password);
          $customer_store = CustomerInfo::create($customer_store);
          if($customer_store){
              Session::flash('success');
            return redirect()->back();
          }else{
            Session::flash('error');
            return redirect()->back();
          }
    }
    public function customer_login(Request $login)
    {
        $check_validation = $login->validate([
           'customer_email' => 'required',
           'password'  => 'required',
         ]);
        $found_customer = CustomerInfo::
                         where('customer_email',$login->customer_email)
                        ->where('password',md5($login->password))
                        ->first();
        if($found_customer){
             Session::put('id', $found_customer->id);
             Session::put('full_name', $found_customer->full_name);
             Session::put('customer_email', $found_customer->customer_email);
             Session::put('customer_phone', $found_customer->customer_phone);
             Session::put('password', $found_customer->password);

               Session::flash('login_success');
               return redirect('/');
            }else{
             Session::flash('error');
             return redirect()->back();
            }
    }
    public function logout()
      {
//          $customer_id = Session::get('id');
          session()->flush();
          return redirect()->route('customer.index')->with('customer_logout');

      }
      public function customer_profile()
      {
       if(Session::get('id')){
         $customer_profile = CustomerInfo::
                             where('id',Session::get('id'))
                             ->firstOrFail();
        $order_history = Order::
                         where('customer_id',Session::get('id'))
                         ->get();
         return view('frontend.pages.customer_profile',compact('customer_profile','order_history'));
       }else{
         return redirect('customer-login');
       }
      }

      //----------------------------update all informations-----------------------------//

      public function personal_info_update(Request $request)
       {
           $update_infos = CustomerInfo::where('id', $request->id)
             ->update([
               'full_name'       => $request->full_name,
               'customer_email'  => $request->customer_email,
               'customer_phone'  => $request->customer_phone,
             ]);
         if ($update_infos){
           Session::flash('success');
         return response()->json();
         }else{
           Session::flash('error');
         return response()->json();
         }
       }
      public function billing_info_update(Request $request)
       {
           $update_infos = CustomerInfo::where('id', $request->id)
             ->update([
               'billing_name'    => $request->billing_name,
               'billing_email'   => $request->billing_email,
               'billing_phone'   => $request->billing_phone,
             ]);
         if ($update_infos){
           Session::flash('success');
         return response()->json();
         }else{
           Session::flash('error');
         return response()->json();
         }
       }
      public function shipping_info_update(Request $request)
       {
           $update_infos = CustomerInfo::where('id', $request->id)
             ->update([
               'shipping_name'    => $request->shipping_name,
               'shipping_phone'   => $request->shipping_phone,
               'shipping_address' => $request->shipping_address,
             ]);
         if ($update_infos){
           Session::flash('success');
         return response()->json();
         }else{
           Session::flash('error');
         return response()->json();
         }
       }

}
