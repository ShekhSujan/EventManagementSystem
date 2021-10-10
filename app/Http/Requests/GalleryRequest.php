<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
        "pic" => "mimes:jpg,jpeg,gif,png|max:1000",
        "category_id" => "required"
      ];
  }
}
