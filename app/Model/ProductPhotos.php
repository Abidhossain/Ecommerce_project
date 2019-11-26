<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductPhotos extends Model
{
   protected $fillable = ['product_id','product_image'];

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
}
