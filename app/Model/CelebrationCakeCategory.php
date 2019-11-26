<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CelebrationCakeCategory extends Model
{
    protected $fillable = [
    	'id',
    	'category_name',
    	'show_on_top',
    	'category_keyword',
    	'category_slug',
    	'publication_status'
    ];
}
