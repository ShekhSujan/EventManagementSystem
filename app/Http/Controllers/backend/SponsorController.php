<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\SponsorRequest;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
  public function index()
  {
  }

  public function create(Request $request)
  {
    $data['title']="Sponsor";
    $data['allSponsor'] = Sponsor::select('*')
    ->orderBy('id', 'desc')
    ->get();
    return view("backend.sponsor.create")->with($data);
  }
  public function store(SponsorRequest $request)
  {
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = "";
    }
    $arr = [
      "title" => $request->input("title"),
      'image' => $ext,
    ];
    //ddd($arr);
    $id = Sponsor::insertGetId($arr);
    if ($id) {
      if ($ext) {
        $photo->move("assets/images/sponsor/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.sponsor.create')->with("msg", "Save Successfully");
    }
    return redirect()->back();
  }
  public function edit(Request $request, $id)
  {
    $data['title']="Sponsor";
    $data['allSponsor'] = Sponsor::select('*')
    ->orderBy('id', 'asc')
    ->get();
    $data['selected'] = Sponsor::find($id);
    return view("backend.sponsor.edit")->with($data);
  }
  public function update(SponsorRequest $request)
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
      "status" => $request->input("status"),
      'image' => $ext,
    ];
    //ddd($arr);
    if (Sponsor::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/sponsor/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/sponsor/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.sponsor.create')->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $path="assets/images/sponsor/{$id}.{$ext}";
    if (Sponsor::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      return redirect()->route('backend.sponsor.create')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.sponsor.create')->with("error", "Some Error Occurs");
  }
}
