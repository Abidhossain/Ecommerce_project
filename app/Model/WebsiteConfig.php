<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebsiteConfig extends Model
{
     protected $fillable = [
     	'company_name','company_logo','phone_1','phone_2','company_address','google_map_code','social_link'
     ];
} 