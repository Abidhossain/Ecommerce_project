<?php
namespace App\Http\Controllers\Frontend;
use App\Model\WebsiteConfig;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product; 
use App\Model\ProductImage;
use App\Model\Slider;
use App\Model\Banner;
use App\Model\Page;  
use App\Model\CustomerInfo;
use Session;
use DB;
class FrontEndController extends Controller
{

   // --------------------Home page Method-----------------//
   public function index()
   {  
      $categories= Category::with('products')->get(); 
      $features_product = Product::with('product_images')->where('home_page_visiblity','=',9999)->get();
      $category = Category::where('show_on_category','=','1')->select('id')->get(); 
      // dd($aa); 
      $category_product = Category::where('show_on_category','=','1')
                          ->select('name','id')
                          ->get(); 
                          // dd($category_product); 
   		return view('frontend.pages.index',compact('features_product','product_with_cat_wise','category_product'));
   } 
   // --------------------Product List Method-----------------// 
   public function product_list($id)
   {
    $category = Category::where('id',$id)->first();

    $product_list = Product::with('product_images')->where('category_id',$id)->orWhere('sub_category_id',$id)->paginate(24);
    $feature_product = Product::with('product_images')->where('home_page_visiblity','=',9999)->orWhere('sub_category_id',$id)->take(5)->get();
     return view('frontend.pages.product_list',compact('product_list','category','feature_product'));
   }
   //---------------------Contact Us ----------------------//
   public function contact()
   {
      return view('frontend.pages.contact_us');
   } 
   //---------------------Prescription Method ----------------------//
   public function prescription()
   {
      return view('frontend.pages.prescription');
   }
   //------------------- Product Details Method --------------------//
   public function product_details($banner_slug)
   {
    $product_details = Product::with('product_images','categories','sub_categories')->where('product_slug',$banner_slug)->firstOrFail(); 
    // dd($product_details);
    $related_products = Product::
                        with('product_images')
                        ->where('category_id',$product_details->category_id)
                        ->orWhere('sub_category_id',$product_details->sub_category_id)
                        ->get();
      // dd($related_products);
    return view('frontend.pages.product_details',compact('product_details','related_products'));
   }
}
