<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
   protected $fillable=[
   		'size_id','size_name','publication_status'
   ]; 
}
