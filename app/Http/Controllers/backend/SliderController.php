<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\SliderRequest;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
  public function index()
  {
  }

  public function create(Request $request)
  {
    $data['title']="Slider";
    $data['allSlider'] = Slider::select('*')->orderBy('id', 'desc')->get();
    return view("backend.slider.create")->with($data);
  }
  public function store(SliderRequest $request)
  {
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = "";
    }
    $arr = [
      "title" => $request->input("title"),
      "short_details" => $request->input("short_details"),
      'image' => $ext,

    ];
    //ddd($arr);
    $id = Slider::insertGetId($arr);
    if ($id) {
      if ($ext) {
        $photo->move("assets/images/slider/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.slider.create')->with("msg", "Save Successfully");
    }
    return redirect()->back();
  }
  public function edit(Request $request, $id)
  {
    $data['title']="Slider";
    $data['allSlider'] = Slider::select('*')
    ->orderBy('id', 'desc')
    ->get();
    $data['selected'] = Slider::find($id);
    return view("backend.slider.edit")->with($data);
  }
  public function update(SliderRequest $request)
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
        "short_details" => $request->input("short_details"),
      "status" => $request->input("status"),
      'image' => $ext,
    ];
    //ddd($arr);
    if (Slider::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/slider/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/slider/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.slider.create')->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $path="assets/images/slider/{$id}.{$ext}";
    if (Slider::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      return redirect()->route('backend.slider.create')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.slider.create')->with("error", "Some Error Occurs");
  }
}
