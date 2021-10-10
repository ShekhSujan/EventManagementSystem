<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\GalleryRequest;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
  public function index()
  {
  }
  public function create(Request $request)
  {
    $data['title']='Gallery';
  $data['allGallery'] = Gallery::select('gallery.*','categories.title as category_title')
    ->join('categories', 'categories.id', '=', 'gallery.category_id')
    ->orderBy('id', 'desc')
    ->get();
    $data['allCategory'] = Category::select('*')->orderBy('id', 'desc')->get();
    return view("backend.gallery.create")->with($data);
  }

  public function store(Request $request)
  {
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = "";
    }
    $arr = [
      "category_id" => $request->input("category_id"),
      'image' => $ext,
    ];
    // dd($arr);
    $id = Gallery::insertGetId($arr);
    if ($id) {
      if ($ext) {
        $photo->move("assets/images/gallery/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.gallery.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }


  public function edit(Request $request, $id)
  {
    $data['allGallery'] = Gallery::select('gallery.*','categories.title as category_title')
      ->join('categories', 'categories.id', '=', 'gallery.category_id')
      ->orderBy('id', 'desc')
      ->get();
        $data['allCategory'] = Category::select('*')->orderBy('id', 'desc')->get();
    $data['selected'] = Gallery::find($id);
    return view("backend.gallery.edit")->with($data);
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
      "category_id" => $request->input("category_id"),
      "status" => $request->input("status"),
      'image' => $ext,
    ];
    if (Gallery::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/gallery/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/gallery/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.gallery.create')->with("msg", "Update Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }
  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $path="assets/images/gallery/{$id}.{$ext}";
    if (Gallery::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      return redirect()->route('backend.gallery.create')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.gallery.create')->with("error", "Some Error Occurs");
  }

}
