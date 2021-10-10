<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpeakerArtistRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
        'name' => 'required',
        "pic" => "mimes:jpg,jpeg,gif,png|max:1000"
      ];
  }
}
