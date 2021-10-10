<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakerArtist extends Model
{
  protected $table = 'speaker_artist';
  protected $fillable = [
    'name','email','phone','designation','details','fb','twitter','instagram','image','status'
  ];
}
