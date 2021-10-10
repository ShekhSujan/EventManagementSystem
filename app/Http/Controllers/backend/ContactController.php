<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    $data['title']="Contact";
    $data['allContact'] = Contact::select('*')
    ->orderBy('id', 'desc')
    ->get();
    return view("backend.contact.index")->with($data);
  }
  public function constore(ContactRequest $request)
  {
    $arr = [
      "name" => $request->input("name"),
      "email" => $request->input("email"),
      "phone" => $request->input("phone"),
      "subject" => $request->input("subject"),
      "message" => $request->input("message"),

    ];
    // dd($arr);
    if(Contact::create($arr)){
      return back()->with("msg", "Message Submitted Successfully");
    }
    return redirect()->back()->withErrors($validate)->withInput();
  }
  public function view(Request $request, $id)
  {
    $data['title']="Contact";
    $data['selected'] = Contact::find($id);
    return view("backend.contact.show")->with($data);
  }

  public function destroy(Request $request)
  {
    $id = $request->input("id");
    if(Contact::where("id", $id)->delete()){
      return redirect()->route('backend.contact.index')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.contact.index')->with("error", "Some Error Occurs");
  }
}
