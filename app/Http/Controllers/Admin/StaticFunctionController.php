<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Product;
use App\Model\Size;
use App\Model\UserRole;
class StaticFunctionController extends Controller
{
    public static function getName($id){
      $result = Product::select('product_name')->where('id', $id)->first();
       return $result->product_name;
     // return "must change !!!!!!";
    }
    public static function getSize($id){
      $result = Size::select('size_name')->where('size_id', $id)->first();
       return $result->size_name;
     // return "must change !!!!!!";
    }
    public static function getRole($id){
      $result = UserRole::select('user_role_name')->where('id', $id)->first();
       return $result->user_role_name;
     // return "must change !!!!!!";
    }
}
