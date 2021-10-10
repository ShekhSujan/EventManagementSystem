<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
class CategoryController extends Controller
{
  public function index()
  {
  }

  public function create(Request $request)
  {
    $data['title']="Category";
    $data['allCategory'] = Category::select('*')
    ->orderBy('position', 'desc')
    ->get();
    return view("backend.category.create")->with($data);
  }
  public function store(CategoryRequest $request)
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
    $id = Category::insertGetId($arr);
    if ($id) {
      if ($ext) {
        $photo->move("assets/images/category/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.category.create')->with("msg", "Save Successfully");
    }
    return redirect()->back();
  }
  public function edit(Request $request, $id)
  {
    $data['title']="Category";
    $data['allCategory'] = Category::select('*')
    ->orderBy('position', 'asc')
    ->get();
    $data['selected'] = Category::find($id);
    return view("backend.category.edit")->with($data);
  }
  public function update(CategoryRequest $request)
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
    if (Category::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/category/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/category/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.category.create')->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $path="assets/images/category/{$id}.{$ext}";
    if (Category::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      return redirect()->route('backend.category.create')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.category.create')->with("error", "Some Error Occurs");
  }
}
