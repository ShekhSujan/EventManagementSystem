<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\SpeakerArtist;
use Illuminate\Http\Request;
use Image;
use File;
class EventController extends Controller
{
  public function index()
  {
    $data['title']='Event';
    $data['allEvent'] = Event::select('event.*','categories.title as category_title','speaker_artist.name as host_name')
    ->join('categories', 'categories.id', '=', 'event.category_id')
    ->join('speaker_artist', 'speaker_artist.id', '=', 'event.host')
    ->orderBy('id', 'desc')
    ->get();
    return view("backend.event.index")->with($data);
  }
  public function create(Request $request)
  {
    $data['title']='Event';
    $data['allEvent'] = Event::select('event.*','categories.title as category_title','speaker_artist.name as host_name')
    ->join('categories', 'categories.id', '=', 'event.category_id')
    ->join('speaker_artist', 'speaker_artist.id', '=', 'event.host')
    ->orderBy('id', 'desc')
    ->get();
    $data['allCategory'] = Category::select('*')->orderBy('id', 'desc')->get();
    $data['allHost'] = SpeakerArtist::select('*')->orderBy('id', 'desc')->get();
    return view("backend.event.create")->with($data);
  }

  public function store(EventRequest $request)
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
      "date" => $request->input("date"),
      "time" => $request->input("time"),
      "host" => $request->input("host"),
      "venue" => $request->input("venue"),
      "parking" => $request->input("parking"),
      "price" => $request->input("price"),
      "map" => $request->input("map"),
      "deadline_reg" => $request->input("deadline_reg"),
      "details" => $request->input("details"),
      'image' => $ext,
    ];
    //ddd($arr);
    $id = Event::insertGetId($arr);
    $slug=preg_replace('/\s+/u', '-', trim($request->input("slug")));
    if ($id && $photo){
      Image::make($photo)->resize(370,249)->save("assets/images/event/thumnails/".$id.'-'.$slug.'.'.$ext);
      Image::make($photo)->resize(1170,530)->save("assets/images/event/banner/".$id.'-'.$slug.'.'.$ext);
      return redirect()->route('backend.event.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }
  public function view(Request $request,$id)
  {
    $data['title']='Event';
    $data['allEvent'] = Event::select('event.*','categories.title as category_title','speaker_artist.name as host_name')
    ->join('categories', 'categories.id', '=', 'event.category_id')
    ->join('speaker_artist', 'speaker_artist.id', '=', 'event.host')
    ->orderBy('id', 'desc')
    ->get();
    $data['allCategory'] = Category::select('*')->orderBy('id', 'desc')->get();
    $data['allHost'] = SpeakerArtist::select('*')->orderBy('id', 'desc')->get();
    $data['selected'] = Event::find($id);
    return view('backend.event.show')->with($data);
  }

  public function edit(Request $request, $id)
  {
    $data['title']='Event';
    $data['allEvent'] = Event::select('event.*','categories.title as category_title','speaker_artist.name as host_name')
    ->join('categories', 'categories.id', '=', 'event.category_id')
    ->join('speaker_artist', 'speaker_artist.id', '=', 'event.host')
    ->orderBy('id', 'desc')
    ->get();
    $data['allCategory'] = Category::select('*')->orderBy('id', 'desc')->get();
    $data['allHost'] = SpeakerArtist::select('*')->orderBy('id', 'desc')->get();
    $data['selected'] = Event::find($id);
    return view("backend.event.edit")->with($data);
  }

  public function update(EventRequest $request)
  {
    $id = $request->input("id");
    $slug_eve=Event::select('id','slug')->where('id', '=', $id)->get();
    foreach ($slug_eve as $value) {
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
      "date" => $request->input("date"),
      "time" => $request->input("time"),
      "host" => $request->input("host"),
      "venue" => $request->input("venue"),
      "parking" => $request->input("parking"),
      "price" => $request->input("price"),
      "map" => $request->input("map"),
      "deadline_reg" => $request->input("deadline_reg"),
      "details" => $request->input("details"),
      "status" => $request->input("status"),
      'image' => $ext,
    ];
    //ddd($arr);

    if (Event::where('id', $id)->update($arr)) {
      $req_slug=preg_replace('/\s+/u', '-', trim($request->input("slug")));
      $path1=("assets/images/event/thumnails/".$id.'-'.$slug.'.'.$ext);
      $move_path1=("assets/images/event/thumnails/".$id.'-'.$req_slug.'.'.$ext);
      $path2=("assets/images/event/banner/".$id.'-'.$slug.'.'.$ext);
      $move_path2=("assets/images/event/banner/".$id.'-'.$req_slug.'.'.$ext);
      //ddd($slug,$req_slug,$path1,$path2,$ext);
      if($photo){
        if(is_file($path1)){
          unlink($path1);
        }
        if(is_file($path2)){
          unlink($path2);
        }
        Image::make($photo)->resize(370,249)->save("assets/images/event/thumnails/".$id.'-'.$req_slug.'.'.$ext);
        Image::make($photo)->resize(1170,530)->save("assets/images/event/banner/".$id.'-'.$req_slug.'.'.$ext);
      }else{
        if(is_file($path1)){
          File::move($path1, $move_path1);
        }
        if(is_file($path2)){
          File::move($path2, $move_path2);
        }
      }
      return redirect()->route('backend.event.index')->with("msg", "Update Successfully");
    }
    return redirect()->back()->with("msg", "Some Error occur");
  }
  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $slug_eve=Event::select('id','slug')->where('id', '=', $id)->get();
    foreach ($slug_eve as $value) {
      $slug=$value->slug;
      //  echo $slug;
    }
    $path="assets/images/event/thumnails/".$id.'-'.$slug.'.'.$ext;
    $path2="assets/images/event/banner/".$id.'-'.$slug.'.'.$ext;
    if (Event::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      if(is_file($path2)){
        unlink($path2);
      }
      return redirect()->route('backend.event.index')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.event.index')->with("error", "Some Error Occurs");
  }

}
