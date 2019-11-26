<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog_details(){
    	return view('frontend.blog.blog_details');
    }

    public function blog_fullwidth(){
    	return view('frontend.blog.blog_fullwidth');
    }


    public function blog_sidebar(){
    	return view('frontend.blog.blog_sidebar');
    }


    public function blog_nosidebar(){
    	return view('frontend.blog.blog_nosidebar');
    }


}
