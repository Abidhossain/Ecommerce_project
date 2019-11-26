<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sponge extends Model
{
       protected $fillable=[
   		'id','sponge_name','sponge_layer_num','sponge_image','publication_status'
   ]; 
}
