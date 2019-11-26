<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   protected $fillable = ['id', 'menu_name','menu_type','menu_link','position','publication_status'];
}
