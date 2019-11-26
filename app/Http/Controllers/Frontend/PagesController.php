<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Page;
use Illuminate\Http\Request; 

class PagesController extends Controller
{ 
    public function page_show($page_slug)
    {
        $page_information = Page::where('page_slug', $page_slug)->firstOrFail();
        // dd($page_information);
        return view('frontend.pages.page', compact('page_information'));
    } 
}
