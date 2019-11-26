<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    protected $fillable = ['id','flavour_name','flavour_price_per_kg','publication_status'];
}
