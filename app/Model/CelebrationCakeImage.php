<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CelebrationCakeImage extends Model
{
       protected $fillable = [
   		'id',
   		'celebration_cake_id',
   		'celebration_cake_image'
   	];
   	
       public function celebration_cake_photos()
       {
           return $this->belongsTo(CelebrationCake::class);
       }
}
