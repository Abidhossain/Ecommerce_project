<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable=[
    	'id', 'Prescription_Medicine', 'OTC_Medicine', 'Non-Pharmaceuticals_Items'
    ];

	public function categories()
	{
		return $this->belongsTo(Category::class);
	}
   
}
