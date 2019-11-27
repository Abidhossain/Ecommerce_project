<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\OrderItemDetail;
use App\Model\WebsiteConfig;
use Auth;
class OrderController extends Controller
{
    public function index()
    {
    	$order_info = Order::with('customer')->where('order_status','=','0')->get();
//        return $order_info;
        return view('admin.order.new_order',compact('order_info'));
    }
    public function order_details($id)
    {
        $web_data = WebsiteConfig::firstOrFail();
    	$order_details = Order::
                         with('customer','order_items','shipping')
                         ->where('id',$id)
                         ->first();
       // dd($order_details);
    	$product_order = OrderItem::
                         where('order_id',$order_details->id) 
                         ->get();
   	// return $product_order;
        return view('admin.order.order_view',compact('web_data','order_details','product_order'));
    }
    //accept order
    public function accept_order($id){
        $admin_name = Auth::user()->name;
        $accept_order = Order::where('id',$id)
                        ->update([
                            'receive_by' => $admin_name,
                            'order_status' => 1,
                        ]);
        if ($accept_order){
            Session::flash('success');
            return redirect()->back();
        }
    }
    //received order
    public function received_order(){
        $order_info = Order::
                      with('customer','order_items','shipping')
                      ->where('order_status','=','1')->get();
       //    	dd($order_info);
        return view('admin.order.received_order',compact('order_info'));
    }

    //cancel order
    public function cancel_order($id){
        $cancel_order = Order::where('id',$id)
            ->update([
                'order_status' => 3,
            ]);
        if ($cancel_order){
            Session::flash('cancel');
            return redirect()->back();
        }
    }
    //received order view
    public function received_order_view($id)
    {
        $web_data = WebsiteConfig::firstOrFail();
        $order_details = Order::
                      with('customer','order_items','shipping')
                         ->where('id',$id)
                         ->first();
        $product_order = OrderItem::
                        where('order_id',$order_details->id) 
                        ->get();
        // dd($product_order);
        return view('admin.order.receive_order_view',compact('web_data','order_details','product_order'));
    }

//go for shipping
public function go_for_ship(Request $request){
//        dd($request->all());
        $go_for_ship = Order::where('id',$request->id)
                      ->update([
                          'delivered_by' => $request->delivered_by,
                          'order_status' => 2
                      ]);
            if($go_for_ship){
                Session::flash('success');
                return redirect()->back();
            }else{
                Session::flash('error');
                return redirect()->back();
            }
        }
    //on_shipping_processing
    public function on_shipping_processing(){
        $order_info = Order::where('order_status','=','2')->get();
        return view('admin.order.on_shipping_list',compact('order_info'));
    }
    //on ship view
    public function on_shipping_view($id){
        $web_data = WebsiteConfig::firstOrFail();
        $order_details = Order::
        with('customer','order_items')
            ->where('id',$id)
            ->first();
        $product_order = OrderItem::
        where('order_id',$order_details->id)
            ->join('common_images','common_images.imageable_id','=','order_items.id')
            ->where('imageable_type','App\Model\OrderItem')
            ->get();
        // dd($product_order);
        return view('admin.order.on_ship_view',compact('web_data','order_details','product_order'));
    }
    //shipping confirm
    public function on_shipping_confirm($id){
        $go_for_ship = Order::where('id',$id)
            ->update([
                'order_status' => 4
            ]);
        if($go_for_ship){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }

    //deliverd order view
    public function deliverd_order(){
        $order_info = Order::where('order_status','=','4')->get();
        return view('admin.order.delivered_list',compact('order_info'));
    }
    public function deliverd_order_view($id){
        $web_data = WebsiteConfig::firstOrFail();
        $order_details = Order::
        with('customer','order_items')
            ->where('id',$id)
            ->first();
        $product_order = OrderItem::
        where('order_id',$order_details->id)
            ->join('common_images','common_images.imageable_id','=','order_items.id')
            ->where('imageable_type','App\Model\OrderItem')
            ->get();
        // dd($product_order);
        return view('admin.order.delivered_view',compact('web_data','order_details','product_order'));
    }
    //canceled order view
    public function cancel_order_view(){
        $order_info = Order::where('order_status','=','3')->get();
        return view('admin.order.new_order',compact('order_info'));
    }

}
