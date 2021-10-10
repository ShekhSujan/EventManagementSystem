<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\SpeakerArtistRequest;
use App\Http\Controllers\Controller;
use App\Models\SpeakerArtist;
use Illuminate\Http\Request;

class SpeakerArtistController extends Controller
{
  public function index()
  {
    $data['title']='Speaker Artist';
    $data['allSpeakerArtist'] = SpeakerArtist::select('*')
    ->orderBy('id', 'desc')
    ->get();
    return view("backend.speaker-artist.index")->with($data);
  }
  public function create(Request $request)
  {
    $data['title']='Speaker Artist';
    return view("backend.speaker-artist.create")->with($data);
  }

  public function store(SpeakerArtistRequest $request)
  {
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext = "";
    }
    $arr = [
      "name" => $request->input("name"),
      "email" => $request->input("email"),
      "phone" => $request->input("phone"),
      "designation" => $request->input("designation"),
      "fb" => $request->input("fb"),
      "twitter" => $request->input("twitter"),
      "instagram" => $request->input("instagram"),
      "details" => $request->input("details"),
      'image' => $ext,
    ];
     //dd($arr);
    $id = SpeakerArtist::insertGetId($arr);
    if ($id) {
      if ($ext) {
        $photo->move("assets/images/speaker-artist/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.speaker-artist.create')->with("msg", "Save Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }


  public function view(Request $request, $id)
  {
    $data['title']='Speaker Artist';
    $data['selected'] = SpeakerArtist::find($id);
    return view("backend.speaker-artist.show")->with($data);
  }
  public function edit(Request $request, $id)
  {
    $data['title']='Speaker Artist';
    $data['selected'] = SpeakerArtist::find($id);
    return view("backend.speaker-artist.edit")->with($data);
  }

  public function update(SpeakerArtistRequest $request)
  {
    $id = $request->input("id");
    $photo = $request->file("pic");
    if ($photo) {
      $ext = strtolower($photo->getClientOriginalExtension());
    } else {
      $ext =$request->input("ext");
    }
    $arr = [
      "name" => $request->input("name"),
      "email" => $request->input("email"),
      "phone" => $request->input("phone"),
      "designation" => $request->input("designation"),
      "fb" => $request->input("fb"),
      "twitter" => $request->input("twitter"),
      "instagram" => $request->input("instagram"),
      "details" => $request->input("details"),
      'image' => $ext,
      "status" => $request->input("status"),
    ];
    if (SpeakerArtist::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/speaker-artist/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/speaker-artist/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.speaker-artist.index')->with("msg", "Update Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }
  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $path="assets/images/speaker-artist/{$id}.{$ext}";
    if (SpeakerArtist::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      return redirect()->route('backend.speaker-artist.index')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.speaker-artist.index')->with("error", "Some Error Occurs");
  }

}
