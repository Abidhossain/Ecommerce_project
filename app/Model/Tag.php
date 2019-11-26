<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model; 
class Tag extends Model
{
    protected $fillable = [
    	'id','tags_name'
    ];


    public function products()
      {
          return $this->belongsToMany(Product::class,'product_tag');
      } 
    public function celebration_cakes()
      {
          return $this->belongsToMany(CelebrationCake::class,'celebration_cake_tag');
      } 
}
