<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
        'name' => 'required|regex:/^[a-zA-Z0-9\'\s]+$/',
        'email' => 'required',
        'password' => 'required|min:3',
        'role' => 'required',
        "pic" => "mimes:jpg,jpeg,gif,png|max:1000"
      ];
  }
}
