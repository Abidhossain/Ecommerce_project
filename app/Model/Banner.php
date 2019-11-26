<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable =[
    'banner_title',
    'banner_image',
    'banner_slug',
    'site_slug',
    'banner_position',
    'publication_status'
	];
}
