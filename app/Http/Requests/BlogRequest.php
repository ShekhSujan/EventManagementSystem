<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
      'category_id' => 'required',
      'details' => 'required',
      "pic" => "mimes:jpg,jpeg,gif,png|max:1000",
    ];
  }
}
