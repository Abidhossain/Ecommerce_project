<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudioSample extends Model
{
    protected $fillable=['id','studio_sample_name'];

   public function studio_samples()
   {
       return $this->morphMany('App\Model\CommonImage', 'imageable');
   } 
}
