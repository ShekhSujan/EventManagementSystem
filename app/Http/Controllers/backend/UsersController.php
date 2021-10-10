<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\UsersRequest;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
  public function index()
  {
    $data['title']="ALl Users";
    $data['allUsers'] = Users::select('*')
    ->where('role',0)
    ->orderBy('id', 'desc')
    ->get();

    return view("backend.users.index")->with($data);
  }
  public function create(Request $request)
  {
    $data['title']="Add Users";
    $data['allUsers'] = Users::select('*')
    ->where('role','>=',1)
    ->orderBy('id', 'desc')
    ->get();

    return view("backend.users.create")->with($data);
  }

  public function store(UsersRequest $request)
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
      "password" => Hash::make($request->input("password")),
      "role" => $request->input("role"),
      "p_insert" => $request->input("p_insert"),
      "p_update" => $request->input("p_update"),
      "p_delete" => $request->input("p_delete"),
      "p_approve" => $request->input("p_approve"),
      'image' => $ext,
    ];
    //ddd($arr);
    $id = Users::insertGetId($arr);
    if ($id) {
      if ($ext) {
        $photo->move("assets/images/users/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.users.create')->with("msg", "Save Successfully");
    }
    return redirect()->back();
  }
  public function edit(Request $request, $id)
  {
    $data['title']="Update Users";
    $data['selected'] = Users::find($id);
    //dd($data['selected']);
    return view("backend.users.edit")->with($data);
  }
  public function view(Request $request, $id)
  {
    $data['title']="View Users";
    $data['selected'] = Users::find($id);
    return view("backend.users.show")->with($data);
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
      "name" => $request->input("name"),
      "email" => $request->input("email"),
      "password" => Hash::make($request->input("password")),
      "role" => $request->input("role"),
      "phone" => $request->input("phone"),
      "address" => $request->input("address"),
      "details" => $request->input("details"),
      "p_insert" => $request->input("p_insert"),
      "p_update" => $request->input("p_update"),
      "p_delete" => $request->input("p_delete"),
      "p_approve" => $request->input("p_approve"),
      'image' => $ext,
    ];
    if (Users::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/users/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/users/", "{$id}.{$ext}");
      }
      return redirect()->route('backend.users.create')->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }
  public function destroy(Request $request)
  {
    $id = $request->input("id");
    $ext = $request->input("ext");
    $path="assets/images/users/{$id}.{$ext}";
    if (Users::where("id", $id)->delete()) {
      if(is_file($path)){
        unlink($path);
      }
      return redirect()->route('backend.users.create')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.users.create')->with("error", "Some Error Occurs");
  }
}
