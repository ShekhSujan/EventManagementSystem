<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  protected $table = 'settings';
  protected $fillable = [
    'email','to_email','phone','details','slogan','editor','address','schedule','logo','flogo'
  ];
}
