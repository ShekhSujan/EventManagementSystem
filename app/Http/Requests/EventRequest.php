<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
      'title' => 'required',
      'slug' => 'required',
      "category_id" => "required",
      "date" => "required",
      'time' => 'required',
      "host" => "required",
      "venue" => "required",
      "parking" => "required",
      'price' => 'required',
      "map" => "required",
      "deadline_reg" => "required",
      'details' => 'required',
      "pic" => "mimes:jpg,jpeg,gif,png|max:1000"
    ];
  }
}
