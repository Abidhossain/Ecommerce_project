<?php
namespace App\Http\Controllers\Frontend;
use App\Model\Cupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB;
use Session; 
use App\Model\DeliveryCahrgeAndVat;
use App\Model\Order;
use App\Model\OrderItem;  
use App\Model\CustomerInfo; 
use App\Model\Shipping; 
use App\Model\Prescription; 
class OrderController extends Controller
{
    public function index()
    {
    	$cart_contents         = Cart::content(); 
    	$delivery_charge       = DeliveryCahrgeAndVat::first(); 
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
            $check_validatoin = $request->validate([
                    'prescription' => 'image|mimes:jpeg,png,jpg,pdf,'
                ]);

      // dd($request->all());
       $customer_info = CustomerInfo::
                        where('id',$request->customer_id)
                        ->first();
                        // dd($customer_info); 
            //regisstered customer info update
            $customer = CustomerInfo::
                        where('id', $customer_info->id)
                        ->update(['full_name' => $customer_info->full_name]);
            //insert order
            $get_order_info=[];
            $get_order_info['customer_id']           = $customer_info->id;
            $get_order_info['order_date']            = date('m/d/Y');
            $get_order_info['order_by']              = $request->billing_name;
            $get_order_info['sub_total']             = $request->sub_total;
            $get_order_info['delivery_charge']       = $request->delivery_charge;
            $get_order_info['discount']              = $request->discount;   
            $get_order_info['payment_info']          = $request->check_method;   
            $get_order_info['order_notes']          = $request->order_note;   
            $order_store = Order::create($get_order_info);

            //upload prescription 
                  if ($request->hasFile('prescription')) {
                      $files = $request->file('prescription');
                      $extension = $files->getClientOriginalExtension();
                      $fileName = str_random(5).".".$extension;
                      $folderpath = 'Pharmacy/Prescription/';
                      $image_url = $folderpath.$fileName;
                      $files->move($folderpath , $fileName); 
                      $prescription = new Prescription;
                      $prescription->order_id = $order_store->id;
                      $prescription->prescription = $image_url;
                      $prescription->save();
                  }
            //check shipping info and craete or update  

            if(!empty($shipping)){
                $customer = Shipping::where('id', $customer_info->id)->update([
                'customer_id' => $request->customer_id, 
                'billing_name' => $request->billing_name, 
                'billing_email' => $request->billing_email, 
                'billing_phone' => $request->billing_phone, 
                'billing_address' => $request->billing_address, 
                'shipping_name' => $request->shipping_name, 
                'shipping_email' => $request->shipping_email, 
                'shipping_phone' => $request->shipping_phone, 
                'shipping_address' => $request->shipping_address, 
                ]);
            }else{
                $data = $request->all();
                $shipping = Shipping::create($data);
            }
            //insert order items
            foreach ($request->item_name as $key => $order_items) {
                $items = OrderItem::create([
                    'order_id'     => $order_store->id,
                    'product_id'   => $request->product_id[$key],
                    'item_name'    => $request->item_name[$key],
                    'item_image'   => $request->item_image[$key], 
                    'item_qty'     => $request->item_qty[$key],
                    'item_price'   => $request->item_price[$key], 
                ]); 
            }
            if ($items = true) {
                Cart::destroy();
                // return redirect('cart/place-order');
                return 'Order Complete';
            } 
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
