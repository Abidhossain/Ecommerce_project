<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
    	'color_id','color_name','code'
    ];
}
