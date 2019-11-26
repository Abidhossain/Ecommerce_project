<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['branch_name','google_map_code','branch_address','branch_phone_number','start_time','end_time'];
}
