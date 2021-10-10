<?php

namespace App\Models;
use Cache;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  protected $table='users';
  protected $fillable=[
     'name','email','password'
  ];
  public function isOnline(){
  return Cache::has('user-is-online-' .$this->id);
}
}
