<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
  public function edit(Request $request, $id)
  {
    $data['title']="Update Setting";
    $data['allSetting'] = Setting::select('*')
    ->orderBy('id', 'desc')
    ->get();
    $data['selected'] = Setting::find($id);
    return view("backend.setting.edit")->with($data);
  }
  public function update(Request $request)
  {
    $id = $request->input("id");
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext =$request->input("ext");
    }
    $photo2 = $request->file("pic2");
    if ($photo2) {
      $ext2 = strtolower($photo2->getClientOriginalExtension());
    } else {
      $ext2 =$request->input("ext2");
    }
    $arr = [
      "email" => $request->input("email"),
      "phone" => $request->input("phone"),
      "address" => $request->input("address"),
      "schedule" => $request->input("schedule"),
      "slogan" => $request->input("slogan"),
      "editor" => $request->input("editor"),
      "details" => $request->input("details"),
      "map" => $request->input("map"),
      "logo" => $ext,
      "flogo" => $ext2,

    ];
    //dd($arr);
    if (Setting::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/logo/{$id}.{$ext}";
      $extn2=$request->input("$ext2");
      $path2="assets/images/flogo/{$id}.{$ext2}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }

        $photo->move("assets/images/logo/", "{$id}.{$ext}");
      }
      if($photo2){
        if(is_file($path2)){
          unlink($path2);
        }
        $photo2->move("assets/images/flogo/", "{$id}.{$ext2}");
      }
      return back()->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }
}
