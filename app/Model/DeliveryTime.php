<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    protected $fillable=[
      		'id','recieved_time','delivered_time'
      ]; 
}
