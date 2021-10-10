<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
class SocialMediaController extends Controller
{

  public function edit(Request $request, $id)
  {
    $data['title']="SocialMedia";
    $data['allSocialMedia'] = SocialMedia::select('*')
    ->orderBy('id', 'asc')
    ->get();
    $data['selected'] = SocialMedia::find($id);
    return view("backend.social-media.edit")->with($data);
  }
  public function update(Request $request)
  {
    $id = $request->input("id");
    $arr = [
      "page" => $request->input("page"),
      "facebook" => $request->input("facebook"),
      "twitter" => $request->input("twitter"),
      "instagram" => $request->input("instagram"),
      "youtube" => $request->input("youtube"),
    ];

    if(SocialMedia::where('id', $id)->update($arr)){
      return redirect()->back()->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

}
