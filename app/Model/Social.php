<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
     protected $fillable=[
   		'id','social_name','social_link','publication_status'
   ];
}
