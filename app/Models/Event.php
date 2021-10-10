<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $table = 'event';
  protected $fillable = [
    'title','category_id','slug','date','time','host','venue','parking','price','map','deadline_reg','details','image','status'
  ];
}
