<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Tag;
class CelebrationCake extends Model
{
        protected $fillable = [
   		'id',
   		'cake_name', 
   		'product_code',
      'category_slug', 
      'product_slug', 
   		'price',
   		'delivery_charge',
   		'vat',
   		'discount', 
   		'long_description', 
   		'bottom_layer',
   		'middle_layer',
   		'top_layer', 
      'hot_trend',
      'additional_price',
      'min_size',
      'max_size',
      'tire_min_size',
      'tire_max_size',
      'fondant_price'
       ]; 

    // public function cake_images()
    // {
    //   return $this->hasMany(CelebrationCakeImage::class);
    // } 
     
    public function tags()
    {
      return $this->belongsToMany(Tag::class,'celebration_cake_tag');
    }    

    public function celebration_cakes()
    {
      return $this->morphMany('App\Model\CommonImage', 'imageable');
    }  
}
