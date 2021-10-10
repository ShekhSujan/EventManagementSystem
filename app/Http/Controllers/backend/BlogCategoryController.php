<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\BlogCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
  public function index()
  {

  }

  public function create(Request $request)
  {
    $data['title']="Category";
    $data['allBlogCategory'] = BlogCategory::select('*')
    ->orderBy('id', 'asc')
    ->get();

    return view("backend.blog-category.create")->with($data);
  }
  public function store(BlogCategoryRequest $request)
  {
    $arr = [
      "title" => $request->input("title"),
    ];

    if(BlogCategory::create($arr)){
      return redirect()->route('backend.blog-category.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }
  public function edit(Request $request, $id)
  {
    $data['title']="Category";
    $data['allBlogCategory'] = BlogCategory::select('*')
    ->orderBy('id', 'asc')
    ->get();
    $data['selected'] = BlogCategory::find($id);
    return view("backend.blog-category.edit")->with($data);
  }
  public function update(BlogCategoryRequest $request)
  {
    $id = $request->input("id");
    $arr = [
    "title" => $request->input("title"),
      "status" => $request->input("status"),
    ];
// dd($arr);
    if(BlogCategory::where('id', $id)->update($arr)){
      return redirect()->route('backend.blog-category.create')->with("msg", "Update Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }

  public function destroy(Request $request)
  {
    $id = $request->input("id");
    if(BlogCategory::where("id", $id)->delete()){
      return redirect()->route('backend.blog-category.create')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.blog-category.create')->with("error", "Some Error Occurs");
  }
}
