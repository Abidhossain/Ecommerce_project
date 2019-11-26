<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $fillable=['id','purchase_id','color_id','size_id','purchase_quantity'];
}
