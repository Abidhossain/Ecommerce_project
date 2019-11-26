<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductPhotos;
use App\Model\CelebrationCake;
use App\Model\CommonImage;
use App\Model\Slider;
use App\Model\Color;
use App\Model\FruitFill;
use App\Model\Banner;
use App\Model\Page;
use App\Model\Contact;
use App\Model\Location;
use App\Model\Flavour;
use App\Model\Size;
use App\Model\Gallery;
use App\Model\Sponge;
use App\Model\Cream;
use App\Model\StudioSample;
use App\Model\CustomerLogin;
use App\Model\StudioCakeSize;
use App\Model\StudioCakeBasicConfig;
use Session;
use DB;
class CakeController extends Controller
{
    public function flavour_price(Request $request)
    {
    	$select = $request->get('select');
    	$value = $request->get('value');
    	$dependent = $request->get('dependent');
    	return Flavour::where('id',$select)->select('flavour_price_per_kg')->get();
    }


    // --------------------Celebration Cake Method-----------------//
    public function cake($category_slug)
    {
      // dd($footer_banners);
     $celebration_cake = CelebrationCake::
                         with('celebration_cakes')
                         ->where('category_slug',$category_slug)
                         ->get();
                         // dd($celebration_cake ); 
       $product_tags = DB::table('celebration_cake_tag')
                       ->join('tags','tags.id','=','celebration_cake_tag.tag_id') 
                       ->get(); 
      $our_menu_show = DB::table('on_ourmenu')->first();

      $quick_show       = CelebrationCake::
                           with('celebration_cakes') 
                           ->get();
      return view('frontend.pages.celebrationcake',compact('celebration_cake','our_menu_show','product_tags','quick_show'));
    }

    // --------------------Single Celebration Cake Method-----------------//
    public function celebration_single_cake($product_slug)
    {
     $single_product_info = CelebrationCake::
                            with('celebration_cakes')
                            ->where('product_slug',$product_slug)
                            ->firstOrFail();
     $related_product = CelebrationCake::
                         with('celebration_cakes')
                         ->where('category_slug',$single_product_info->category_slug)
                         ->get();

      $quick_show       = CelebrationCake::
                           with('celebration_cakes') 
                           ->get();
     $flavours = Flavour::
                 where('publication_status','=','1')
                 ->get(); 
      $cake_pricing = DB::table('cake_pricing')->first();

     return view('frontend.pages.celebration_single_cake',compact('single_product_info','related_product','flavours','cake_pricing','quick_show'));
    }
    // ------------------------ Cake Studio ---------------------------//
    public function cake_studio_index()
    {
     //cake sponge query
     $first_layer_sponges =  Sponge::
                             where('sponge_layer_num',1)
                             ->where('publication_status','=',1)
                             ->orderBy('sponge_name')
                             ->get();
     $second_layer_sponges =  Sponge::
                              where('sponge_layer_num',2)
                              ->where('publication_status','=',1)
                              ->orderBy('sponge_name')
                              ->get();
     $third_layer_sponges =  Sponge::
                             where('sponge_layer_num',3)
                             ->where('publication_status','=',1)
                             ->orderBy('sponge_name')
                             ->get();
     //cake cream queery

     $first_layer_cream =  Cream::
                           where('cream_layer_num',1)
                           ->where('publication_status','=',1)
                           ->orderBy('cream_name')
                           ->get();
     $second_layer_cream =  Cream::
                           where('cream_layer_num',2)
                           ->where('publication_status','=',1)
                           ->orderBy('cream_name')
                           ->get();
      $fruit_flilling  = FruitFill::get();
     $page_description = StudioCakeBasicConfig::select('description')->first();
     $flavours = Flavour::where('publication_status','=','1')->get();

     return view('frontend.pages.cake_studio',compact('first_layer_sponges','second_layer_sponges','third_layer_sponges','first_layer_cream','second_layer_cream','flavours','page_description','fruit_flilling'));
    }

    public function custom_cake()
    {
      $custom_cakes = CelebrationCake::with('celebration_cakes')->get();

      $quick_show       = CelebrationCake::
                           with('celebration_cakes') 
                           ->get();

      foreach ($custom_cakes as $pro) { 
        $product_tags = DB::table('celebration_cake_tag')
                        ->join('tags','tags.id','=','celebration_cake_tag.tag_id')
                        ->where('celebration_cake_id',$pro->id)
                        ->get();
      }   
      $our_menu_show = DB::table('on_ourmenu')->first();
      return view('frontend.pages.custom_cake',compact('custom_cakes','new_product','our_menu_show','product_tags','quick_show'));
    }

    public function studio_step_two_normal(Request $request)
    {
      // dd($request->all());
      $cake_configuration = $request->all(); 
      $studio_cake_price_per_kg = StudioCakeBasicConfig::first();
      $studio_samples = StudioSample::with('studio_samples')->get();
      $color_info = Color::get();
      return view('frontend.pages.cake_studio_step_two_normal',compact('studio_samples','studio_cake_price_per_kg','cake_configuration','color_info'));
    }

    public function studio_step_two_printed(Request $request)
    {
      // dd($request->all());
      $cake_configuration = $request->all(); 
      $color_info = Color::get();
      $studio_cake_price_per_kg = StudioCakeBasicConfig::first();
      return view('frontend.pages.cake_studio_step_two_printed',compact('studio_cake_price_per_kg','cake_configuration','color_info'));
    }

   public function calculate(Request $request)
   {
    $layer = CelebrationCake::findOrFail($request->get('product'));
    $price = 0;
    foreach($request->get('ids') as $id){
      if(!empty($id)){
        $value = explode('-', $id);
        if($value[0]=='t'){
          $kg = $layer->top_layer;
        }else if($value[0]=='m'){
          $kg = $layer->middle_layer;
        }else if($value[0]=='b'){
          $kg = $layer->bottom_layer;
        }
        $flavour = Flavour::findOrFail($value[1]);
        $price += $flavour->flavour_price_per_kg*$kg;
      }
    }
    return $price;
   }
}
