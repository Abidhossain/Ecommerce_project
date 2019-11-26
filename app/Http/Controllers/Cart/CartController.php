<?php
namespace App\Http\Controllers\Cart;
use App\Model\Product;
use App\Model\ProductImage; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class CartController extends Controller
{
//product cart
    public function addCart($id)
    {  
        $product = Product::
                   with('product_images')
                   ->where('id', $id)
                   ->select('id','product_name','price')
                   ->first();
        
            foreach($product->product_images->take(1) as $photo){
                $product_image = $photo->product_image;
            } 
            Cart::add([
                 'id'       => $product->id,
                 'name'     => $product->product_name,
                 'price'    => $product->price,
                 'qty'      => 1,
                 'weight'   => 0,
                 'options'  => [ 
                 'images'     => $product_image, 
                 ],
             ]); 
         return response()->json($product); 
    } 
    public function addItem(Request $request)
    {  
        $product = Product::
                   with('product_images')
                   ->where('id', $request->id)
                   ->select('id','product_name','price')
                   ->first();
        
            foreach($product->product_images->take(1) as $photo){
                $product_image = $photo->product_image;
            } 
            Cart::add([
                 'id'       => $product->id,
                 'name'     => $product->product_name,
                 'price'    => $product->price,
                 'qty'      => $request->qty?$request->qty:1,
                 'weight'   => 0,
                 'options'  => [ 
                 'images'     => $product_image, 
                 ],
             ]); 
         return response()->json($product); 
    } 
    //Cart Update Method
    public function cart_update($qty,$rowId)
    {
        $update = Cart::update($rowId , $qty); 
        return response()->json();
    }
    //Cart Remove Method
    public function cart_destroy($id)
    {
        Cart::remove($id); 
        return response()->json();
    }

    public function shoppingCart()
    { 
        $redirect_to_home = Cart::content();
        if(count($redirect_to_home)<1){
           return redirect('/');
        }else{
           return view('frontend.pages.cart');
        }
    }
}
