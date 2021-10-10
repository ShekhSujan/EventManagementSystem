<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
  protected $table = 'email_setting';
  protected $fillable = [
    'url','email','cc','bcc'
  ];
}
