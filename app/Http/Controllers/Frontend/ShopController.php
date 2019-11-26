<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    


public function shop_fullwidth(){
	return view('frontend.shop.shop_fullwidth');
}

public function shop_fullwidth_list(){
	return view('frontend.shop.shop_fullwidth_list');
}

public function shop_right_sidebar(){
	return view('frontend.shop.shop_right_sidebar');
}


public function shop_right_sidebar_list(){
	return view('frontend.shop.shop_right_sidebar_list');
}


public function shop_list(){
	return view('frontend.shop.shop_list');
}



}
