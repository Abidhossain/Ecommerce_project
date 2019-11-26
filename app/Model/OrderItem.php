<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
     protected $guarded = [''];
      public function orders()
      { 
           return $this->belongsTo(Order::class);
      }
      public function item_images()
      {
      	return $this->morphMany(CommonImage::class);
      }
}
