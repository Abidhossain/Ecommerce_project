<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Product;
use App\Model\ProductPhotos;
use Session;
class SingleProductController extends Controller
{
	public function FunctionName($product_id)
	{
		$top_selling = Product::with('productPhotos')->where('id',$product_id)->get();
		   return view('frontend.pages.single_product');
	}
}
