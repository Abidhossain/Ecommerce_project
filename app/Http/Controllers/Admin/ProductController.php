<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Product;
use App\Model\Category;
use App\Model\Sub_category;
use App\Model\Brand;
use App\Model\Tag;
use App\Model\Size;
use App\Model\Color;
use App\Model\ProductImage;
use App\Model\Generic;
use DB;
class ProductController extends Controller
{
    public function index()
    { 
    $category_infos = Category::all();
    $brand_infos = Brand::all();
    $sub_category_infos = Sub_category::all();
    $generic_info = Generic::all();
    return view('admin.products.product_add',compact('category_infos','brand_infos','color_infos','sub_category_infos','generic_info'));
    }


    // ====================Product List Method =====================//
    public function product_list()
    { 
      $product_infos = Product::with('categories','sub_categories','brands')->get();
      $category_infos = Category::all();
      $brand_infos = Brand::all();
      $sub_category_infos = Sub_category::all();
      $product_image = Category::all();
       return view('admin.products.product_list',compact('product_infos','category_infos','brand_infos','sub_category_infos','product_image'));
    }

    // ----------------------Product Store Method ----------------------

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     return Category::where('parent_id',$select)->get();
    }

    public function StoreProduct(Request $request)
    {
          $this->validate($request,[
                  'product_name'   => 'required'
              ]);
        $product = new Product();
        $product->product_name     = $request->product_name;
        $product->product_slug     = str_slug($request->product_name);
        $product->price            = $request->price;
        $product->discount         = $request->discount;
        $product->description      = $request->description;
        $product->category_id      = $request->category_id;
        $product->sub_category_id  = $request->sub_category_id;
        $product->generic_id         = $request->generic_id;
        $product->home_page_visiblity         = $request->home_page_visiblity;
        $product->save();

         foreach ($request->product_image as $key => $product_image) {

          $extension = $product_image->getClientOriginalExtension();
          $remove_space = str_replace(" ","",$request->product_name);
          $trim = $remove_space.time().str_random(5);
          $fileName = $trim.".".$extension; 
          $folderpath = 'Pharmacy/Product/';
          $image_url = $folderpath.$fileName;
          $product_image->move($folderpath , $fileName);
          $filename = $image_url; 
          $stored_image = ProductImage::create([
            'product_id' => $product->id,
            'product_image' => $filename
          ]);
        }
         if ($stored_image){
                Session::flash('success',"Product Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Product Added Faield !!!');
                return redirect()->back();
            } 
    } 
    // --------------------Product Edit Method-----------------//

    public function product_edit($id)
    {
        $brands         = Brand::all();
        $product        = Product::with('brands')->where('id',$id)->first();
        $categories     = Category::all();
        $sub_categories = Sub_category::all();
        $generic_info = Generic::all(); 
        return view('admin.products.product_edit',compact('product','categories','brands','sub_categories','generic_info'));
    }
        // --------------------Product Update Method-----------------//
    public function product_update(Request $request,$id)
    {
      // dd($request->all());
       if($request->hasFile('product_image')) {
        //product info update
        $product_update = Product::find($id);
        $product_update->product_name  = $request->product_name;
        $product_update->product_slug  = str_slug($request->product_name);
        $product_update->price         = $request->price;
        $product_update->discount      = $request->discount;
        $product_update->description   = $request->description;
        $product_update->category_id   = $request->category_id;
        $product_update->sub_category_id   = $request->sub_category_id;
        $product_update->brand_id      = $request->brand_id;
        $product_update->generic_id         = $request->generic_id;
        $product_update->home_page_visiblity      = $request->home_page_visiblity;
        $product_update->save();
        //product image update
        $files = $request->file('product_image');
        $extension = $files->getClientOriginalExtension();
        $remove_space = str_replace(" ","",$request->product_name);
        $trim = $remove_space.time().str_random(5);
        $fileName = $trim.".".$extension;
        $folderpath = 'Pharmacy/Product/';
        $image_url = $folderpath.$fileName;
        $files->move($folderpath , $fileName);
        $product_image = new ProductImage;
        $product_image->product_id = $product_update->id;
        $product_image->product_image = $image_url;
        $product_image->save();
        if ($product_image){
      Session::flash('success',"Product Update Completed !!!");
      return redirect()->back();
      }else{
      Session::flash('error','Product Added Faield !!!');
      return redirect()->back();
      }
      }else{
        // dd($request->all());
        $product_update = Product::find($id);
        $product_update->product_name        = $request->product_name;
        $product_update->product_slug        = str_slug($request->product_name);
        $product_update->price               = $request->price;
        $product_update->discount            = $request->discount;
        $product_update->description         = $request->description;
        $product_update->category_id         = $request->category_id;
        $product_update->sub_category_id     = $request->sub_category_id;
        $product_update->brand_id            = $request->brand_id;
        $product_update->generic_id         = $request->generic_id;
        $product_update->home_page_visiblity = $request->home_page_visiblity;
        $product_update->save();
        if($product_update){
          Session::flash('success');
          return redirect()->back();
        }else{
          Session::flash('error');
          return redirect()->back();
         }
      }
  }
    // --------------------Single Image Delete Method-----------------//
    public function delete_single_image($id)
    {
         $product_images = ProductImage::where('id',$id)->first();
      // dd($product_images);
         if($product_images !=''){
              $image_path = $product_images->product_image;
            if(file_exists($image_path)){
              @unlink($image_path);
              $delete_images = ProductImage::where('id',$id)->delete();
              if ($delete_images){
                     Session::flash('deleted');
                     return redirect()->back();
                 }
            }
          }
    }
    // --------------------Product Delete Method-----------------//
      public function product_delete($id)
      {

         $product_image = ProductImage::where('product_id',$id)->get();
         if($product_image !=''){
            foreach($product_image as $url) {
              $image_path = $url->product_image;
            @unlink($image_path);
            $delete_images = ProductImage::where('product_id',$id)->delete();
          }
        }else{}
              $delete_product = Product::where('id',$id)->delete();
              if ($delete_product){
                     Session::flash('success',"Product Deleted Successfully !!!");
                     return redirect()->back();
                 }else{
                     Session::flash('error','Opps Something Wrong !!!');
                     return redirect()->back();
                 }

         }  
  }
