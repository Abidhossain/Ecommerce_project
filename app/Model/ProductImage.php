<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $guarded=[''];
     public function products(){
        return $this->belongsTo(Product::class);
    }
}
