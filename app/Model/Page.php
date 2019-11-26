<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  protected $fillable = [
    'id','page_name','page_title','page_slug','page_description','page_position','publication_status'
  ];
}
