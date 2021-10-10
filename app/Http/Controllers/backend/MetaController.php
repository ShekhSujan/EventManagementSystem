<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{

  public function edit(Request $request, $id)
  {
    $data['title']="Meta";
    $data['allMeta'] = Meta::select('*')
    ->orderBy('id', 'asc')
    ->get();
    $data['selected'] = Meta::find($id);
    return view("backend.meta.edit")->with($data);
  }
  public function update(Request $request)
  {
    $id = $request->input("id");
    $arr = [
      "url" => $request->input("url"),
      "keyword" => $request->input("keyword"),
      "description" => $request->input("description"),
    ];

    if(Meta::where('id', $id)->update($arr)){
      return redirect()->back()->with("msg", "Update Successfully");
    }
    return redirect()->back();
  }

}
