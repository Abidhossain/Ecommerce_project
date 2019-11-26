<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $fillable=[
    	'id', 'category_id', 'name', 'description'
    ];

    public function products()
	{
		return $this->belongsTo(Product::class,'product_id');
	}

   public function category()
	{
		return $this->belongsTo(Category::class);
	}

}
