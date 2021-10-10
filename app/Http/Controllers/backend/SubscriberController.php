<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\SubscriberRequest;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
  public function index()
  {
    $data['title']="Subscriber";
    $data['allSubscriber'] = Subscriber::select('*')
    ->orderBy('id', 'desc')
    ->get();
    return view("backend.subscriber.index")->with($data);
  }
  public function subscriberstore(SubscriberRequest $request)
  {
    $arr = [
      "email" => $request->input("email"),
    ];
     //ddd($arr);
    if(Subscriber::create($arr)){
      return back()->with("msg", "Subscribed Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occurs");
  }
  public function destroy(Request $request)
  {
    $id = $request->input("id");
    if(Subscriber::where("id", $id)->delete()){
      return redirect()->route('backend.subscriber.index')->with("msg", "Delete Successfully");
    }
    return redirect()->route('backend.subscriber.index')->with("error", "Some Error Occurs");
  }
}
