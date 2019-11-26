<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    protected $fillable = [
    	'id',
    	'full_name',
    	'customer_email',
    	'customer_phone',
    	'billing_name',
    	'billing_email',
    	'billing_phone',
    	'shipping_name',
    	'shipping_phone',
    	'shipping_address',
    	'password'
    ];
     public function orders()
      {
           return $this->hasMany(Order::class);
      }
}
