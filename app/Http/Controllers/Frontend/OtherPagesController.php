<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherPagesController extends Controller
{
    

public function cart(){
	return view('frontend.shop.other_pages.cart');
}

public function wishlist(){
	return view('frontend.shop.other_pages.wishlist');
}

public function checkout(){
	return view('frontend.shop.other_pages.checkout');
}

public function my_account(){
	return view('frontend.shop.other_pages.my_account');
}



// for product type
public function product_details(){
	return view('frontend.shop.product_type.product_details');
}

public function product_sidebar(){
	return view('frontend.shop.product_type.product_sidebar');
}
public function product_grouped(){
	return view('frontend.shop.product_type.product_group');
}

public function product_variable(){
	return view('frontend.shop.product_type.product_variable');
}

public function product_countdown(){
	return view('frontend.shop.product_type.product_countdown');
}




}
