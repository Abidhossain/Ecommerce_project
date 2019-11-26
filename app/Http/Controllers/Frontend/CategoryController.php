<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\ProductImage;

class CategoryController extends Controller
{
    public function index(){
    	
	$products = Product::all();
	$product_image = ProductImage::all();
    	return view('frontend.category.index',compact('products','product_image'));
    }

public function frequently_question(){
	return view('frontend.category.frequently_question');
}

}
