<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
      'id','faq_question','faq_answer'
    ];
}