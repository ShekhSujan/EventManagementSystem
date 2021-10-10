<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{

  public function edit(Request $request, $id)
  {
    $data['title']="Policy";
    $data['allPolicy'] = Policy::select('*')
    ->orderBy('id', 'asc')
    ->get();
    $data['selected'] = Policy::find($id);
    return view("backend.policy.edit")->with($data);
  }
  public function update(Request $request)
  {
    $id = $request->input("id");
    $arr = [
      "details" => $request->input("details"),
    ];

    if(Policy::where('id', $id)->update($arr)){
      return redirect()->back()->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

}
