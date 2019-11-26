<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
	  	'id',
	  	'product_type_id',
	  	'name',
	  	'image',
	  	'description'
	];
	 // protected $primaryKey = 'category_id';


	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function sub_categories()
	{
		return $this->hasMany(Sub_category::class);
	} 
	public function product_types()
	{
		return $this->hasMany(ProductType::class ,'id','product_type_id');
	}
}
