<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrintedCake extends Model
{
    protected $fillable=['id','printed_cake_id'];

    public function printed_cakes()
    {
        return $this->morphMany('App\Model\CommonImage', 'imageable');
    }
}
