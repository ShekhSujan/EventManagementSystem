<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use Illuminate\Http\Request;

class EmailSettingController extends Controller
{

  public function edit(Request $request, $id)
  {
    $data['title']="Email Setting";
    $data['selected'] = EmailSetting::find($id);
    return view("backend.email-setting.edit")->with($data);
  }
  public function update(Request $request)
  {
    $id = $request->input("id");
    $arr = [
      "url" =>$request->input("url"),
      "email" =>$request->input("email"),
      "cc" =>$request->input("cc"),
      "bcc" =>$request->input("bcc"),
    ];

    if(EmailSetting::where('id', $id)->update($arr)){
      return redirect()->back()->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

}
