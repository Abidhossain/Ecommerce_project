<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\Model\Color;
use App\Model\Size;
use App\Model\Product;
use App\Model\ProductPurchase;
use App\Model\PurchaseDetails;
class ProductPurchaseController extends Controller
{

  //------------------------ Purchase Index Mothod-----------------------//

    public function purchase_index()
    {
      $color_infos = Color::get();
      $size_infos = Size::where('publication_status','=',1)->get();
      return view('admin.product_store.product_purchase',compact('color_infos','size_infos'));
    }


    //------------------------ Autocomplete Mothod-----------------------//

    public function autocomplete(Request $request)
    {
       $search = $request->get('products');
       $result = Product::where('product_name', 'LIKE', '%'. $search. '%')->get();
          return response()->json($result);
    }

  //------------------------ Purchase Store Mothod-----------------------//

    public function product_purchase(Request $request)
    {
      dd($request->all());

    if ($purchase_details)
    {
        Session::flash('success',"Product Purchased Completly !!!");
        return redirect()->back();
    }else{
        Session::flash('error','Opps Something Wrong !!!');
        return redirect()->back();
        }

    }
     //------------------------ Purchase List Mothod-----------------------//

     public function purchase_list()
     {
       $purchase_list  = DB::table('product_purchases')
                      ->join('purchase_details','purchase_details.purchase_id','=','product_purchases.id')
                      ->get();
        return view('admin.product_store.purchase_list',compact('purchase_list'));
     }
}
