<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TopCategory;
class TopCategoryController extends Controller
{
    public function index()
    {
    	// $top_categories = TopCategory::get();
    	return view('admin.');
    }
}
