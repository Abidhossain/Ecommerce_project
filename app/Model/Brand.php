<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
      protected $fillable = [
	  	'id',
	  	'name',
	  	'phone',
	  	'email',
	  	'address'
	]; 
	public function products()
	{
		return $this->belongsTo(Product::class,'brand_id');
	} 
}
