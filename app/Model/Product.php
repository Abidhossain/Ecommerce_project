<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Tag;
use App\Model\ProductPhotos;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'sub_category_id',
        'brand_id',
        'image',
        'price',
        'discount',
        'description'
    ]; 
    // public function productPhotos()
    // {
    //     return $this->hasMany(ProductPhotos::class);
    // }

  public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    } 

    public function brands()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    } 
      public function sub_categories()
     {
         return $this->belongsTo(Sub_category::class,'sub_category_id','id');
     }
       public function product_images()
     {
         return $this->hasMany(ProductImage::class);
     }

    public function products()
    {
        return $this->morphMany('App\Model\CommonImage', 'imageable');
    }   
}
