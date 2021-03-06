<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=[
    	'id',
    	// 'customer_id',  
    	'billing_name',
    	'billing_phone',
    	'billing_email',
    	'billing_address',
    	'shipping_name',
    	'shipping_phone',
    	'shipping_email',
    	'shipping_address',
    ];


      public function order()
      {
           return $this->hasOne(Order::class);
      }
}