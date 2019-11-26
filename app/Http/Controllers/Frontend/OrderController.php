<?php
namespace App\Http\Controllers\Frontend;
use App\Model\Cupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB;
use Session;
use App\Model\Location;
use App\Model\DeliveryTime;
use App\Model\WebsiteConfig;
use App\Model\DeliveryCahrgeAndVat;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\CommonImage;
use App\Model\OrderItemDetail;
use App\Model\CustomerInfo;
use App\Model\ShippingArea;
class OrderController extends Controller
{
    public function index()
    {
    	$cart_contents         = Cart::content(); 
    	$delivery_charge       = DeliveryCahrgeAndVat::first();
    	$delivery_time         = DeliveryTime::get();
    	$location              = Location::get();
      $ship_area             = ShippingArea::get();
      $customer_information  = Session::get('id');
      $customer_info         = CustomerInfo::where('id',$customer_information)->first();
      $redirect_to_home = Cart::content();
     if(count($redirect_to_home)<1){
        return redirect('/');
     }else{
      return view('frontend.pages.checkout',compact('cart_contents','delivery_charge','delivery_time','customer_info','ship_area'));
     } 
    }
    public function get_order_info(Request $request)
    {
      dd($request->all());
    }
    //-------------------Discount Method---------------------//
    public function discount_method($cupon_code){
        $discount_data = Cupon::where('cupon_code',$cupon_code)->first();
            $balance = 0;

        if($discount_data->discount_type == 1){
            // $total = Cart::content();
            $discount = $discount_data->discount_amount;
            Session::put('discount_amount', number_format($discount));
            Session::put('cupon_code',$cupon_code);
            return response()->json();
        }elseif($discount_data->discount_type == 2){
            $total = Cart::content();
             foreach($total as $data){
                 $balance += ($data->price*$data->qty);
             } 
             $parsent_amount = (($balance*$discount_data->discount_amount)/100); 
            Session::put('discount_amount', number_format($parsent_amount));
            Session::put('cupon_code',$cupon_code);
            return response()->json();
        }
    }
    //------------------custoemer login-------------------//

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
               return redirect()->back();
            }else{
             Session::flash('error');
             return redirect()->back();
            }
    }
}
