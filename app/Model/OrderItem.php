<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
     protected $fillable = [
     	'id',
     	'order_id',
     	'product_id',
     	'item_name',
     	'item_qty',
      'item_image',
     	'item_price', 
     ];
      public function orders()
      { 
           return $this->belongsTo(Order::class);
      }
      public function item_images()
      {
      	return $this->morphMany(CommonImage::class);
      }
}
