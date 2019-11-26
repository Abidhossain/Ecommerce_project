<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cream extends Model
{
    protected $fillable=[
      		'id','cream_name','cream_layer_num','cream_image','publication_status'
      ]; 
}
