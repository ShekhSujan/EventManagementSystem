<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Image;
use File;
class BlogController extends Controller
{
  public function index()
  {
    $data['title']='Blog';
    $data['allBlog'] = Blog::select('blog.*','blog_category.title as category_title')
    ->join("blog_category", "blog_category.id", "=", "blog.category_id")
     ->orderBy('blog.id', 'desc')
    ->get();
    //dd($data['allBlog']);
    return view("backend.blog.index")->with($data);
  }
  public function create(Request $request)
  {$data['title']='Blog';
    $data['allBlog'] = Blog::select('*' )
    ->orderBy('id', 'desc')
    ->get();
    $data['allBlogCategory'] = BlogCategory::select('*' )
    ->orderBy('id', 'desc')
    ->get();
    return view("backend.blog.create")->with($data);
  }

  public function store(BlogRequest $request)
  {
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = "";
    }

    $arr = [
      "title" => $request->input("title"),
        "slug" => preg_replace('/\s+/u', '-', trim($request->input("slug"))),
      "category_id" => $request->input("category_id"),
      "details" => $request->input("details"),
      "tag" => $request->input("tag"),
      'image' => $ext,
    ];
    // dd($arr);
    $id = Blog::insertGetId($arr);
    $slug=preg_replace('/\s+/u', '-', trim($request->input("slug")));
    if ($id && $photo){
      Image::make($photo)->resize(440,240)->save("assets/images/blog/thumnails/".$id.'-'.$slug.'.'.$ext);
      Image::make($photo)->resize(770,420)->save("assets/images/blog/banner/".$id.'-'.$slug.'.'.$ext);
      return redirect()->route('backend.blog.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }


  public function view(Request $request, $id)
  {$data['title']='Blog';
    $data['allBlog'] = Blog::select('*')->get();
    $data['allBlogCategory'] = BlogCategory::select('*' )->get();
    $data['selected'] = Blog::find($id);
    $tag=$data['selected']->tag;
    $data['allTags'] = explode(',', $tag);
    return view("backend.blog.show")->with($data);
  }
  public function edit(Request $request, $id)
  {$data['title']='Blog';
    $data['allBlog'] = Blog::select('*' )
    ->orderBy('id', 'desc')
    ->get();
    $data['allBlogCategory'] = BlogCategory::select('*' )
    ->orderBy('id', 'desc')
    ->get();
    $data['selected'] = Blog::find($id);
    return view("backend.blog.edit")->with($data);
  }

  public function update(BlogRequest $request)
  {
    $id = $request->input("id");
    $slug_blog=Blog::select('id','slug')->where('id', '=', $id)->get();
    foreach ($slug_blog as $value) {
      $slug=$value->slug;
      //  echo $slug;
    }
    $photo = $request->file("pic");
    if ($photo) {
      $ext =strtolower($photo->getClientOriginalExtension());
    } else {
      $ext =$request->input("ext");
    }
    $arr = [
      "title" => $request->input("title"),
        "slug" => preg_replace('/\s+/u', '-', trim($request->input("slug"))),
      "category_id" => $request->input("category_id"),
      "details" => $request->input("details"),
      "tag" => $request->input("tag"),
      "status" => $request->input("status"),
      'image' => $ext,
    ];
    if (Blog::where('id', $id)->update($arr)) {
      $req_slug=preg_replace('/\s+/u', '-', trim($request->input("slug")));
      $path1=("assets/images/blog/thumnails/".$id.'-'.$slug.'.'.$ext);
      $move_path1=("assets/images/blog/thumnails/".$id.'-'.$req_slug.'.'.$ext);
      $path2=("assets/images/blog/banner/".$id.'-'.$slug.'.'.$ext);
      $move_path2=("assets/images/blog/banner/".$id.'-'.$req_slug.'.'.$ext);
      //ddd($slug,$req_slug,$path1,$path2,$ext);
      if($photo){
        if(is_file($path1)){
          unlink($path1);
        }
        if(is_file($path2)){
          unlink($path2);
        }
        Image::make($photo)->resize(440,240)->save("assets/images/blog/thumnails/".$id.'-'.$req_slug.'.'.$ext);
        Image::make($photo)->resize(770,420)->save("assets/images/blog/banner/".$id.'-'.$req_slug.'.'.$ext);
      }else{
        if(is_file($path1)){
          File::move($path1, $move_path1);
        }
        if(is_file($path2)){
          File::move($path2, $move_path2);
        }
      }
      return redirect()->route('backend.blog.index')->with("msg", "Update Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }
  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $slug_eve=Blog::select('id','slug')->where('id', '=', $id)->get();
    foreach ($slug_eve as $value) {
      $slug=$value->slug;
      //  echo $slug;
    }
    $path="assets/images/blog/thumnails/".$id.'-'.$slug.'.'.$ext;
    $path2="assets/images/blog/banner/".$id.'-'.$slug.'.'.$ext;
    if (Blog::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      if(is_file($path2)){
        unlink($path2);
      }
      return redirect()->route('backend.blog.index')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.blog.index')->with("error", "Some Error Occurs");
  }

}
