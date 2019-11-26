<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable=[
    	'slider_id', 'slider_title', 'slider_image', 'slider_position','description', 'slider_slug'
    ];

    protected $primaryKey = 'slider_id';

}
