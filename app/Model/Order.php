<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
     	'id',
     	'customer_id',
     	'order_date',
     	'order_take_deliver_time',
     	'order_by',
     	'receive_by',
     	'sub_total',
     	'delivery_charge',
     	'outlate',
     	'payment_status',
      'total_vat',
      'discount'
     ];

      public function order_items()
      {
           return $this->hasMany(OrderItem::class);
      }
      public function customer()
      {
           return $this->belongsTo(CustomerInfo::class);
      }
}