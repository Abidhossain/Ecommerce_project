<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommonImage extends Model
{
	protected $guarded = [''];
    public function imageable()		
    {
      return $this->morphTo();
    }
}
