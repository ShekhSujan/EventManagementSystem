<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

  public function edit(Request $request, $id)
  {
    $data['title']="About";
    $data['allAbout'] = About::select('*')
    ->orderBy('id', 'asc')
    ->get();
    $data['selected'] = About::find($id);
    return view("backend.about.edit")->with($data);
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
    $arr = [
      "title" => $request->input("title"),
      "about" => $request->input("about"),
          'image' => $ext,
    ];
    if (About::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/about/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/about/", "{$id}.{$ext}");
      }
      return redirect()->back()->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

}
