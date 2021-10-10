<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $table = 'blog';
  protected $fillable = [
    'title','slug','category_id','details','image','status'
  ];
}
