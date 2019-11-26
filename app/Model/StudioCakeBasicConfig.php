<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudioCakeBasicConfig extends Model
{
     protected $fillable = [
    	'id',
    	'min_size',
    	'max_size',
    	'studio_cake_price_per_kg',
    	'studio_cake_description'
    ];
}
