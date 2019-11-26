<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudioCakeSize extends Model
{
    protected $fillable = [
    	'id',
    	'min_size',
    	'max_size',
    ];
}
