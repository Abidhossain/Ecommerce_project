<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
     	'id',
     	'customer_id',
      'shipping_id',
     	'order_date',
     	'order_take_deliver_time',
     	'order_by',
     	'receive_by',
     	'sub_total',
     	'delivery_charge',
     	'outlate',
     	'payment_status',
      'total_vat',
      'discount',
      'payment_info',
      'order_notes'
     ];

      public function order_items()
      {
           return $this->hasMany(OrderItem::class);
      }
      public function customer()
      {
           return $this->belongsTo(CustomerInfo::class);
      }
      public function shipping()
      {
           return $this->belongsTo(Shipping::class);
      }
}
