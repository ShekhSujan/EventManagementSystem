<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\SpeakerArtist;
use App\Models\Paypal;
use App\Models\Stripe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class DateWiseDataController extends Controller
{
  public function index()
  {
    $data['title']='Event Info';
    $data['allPaypal10']=Paypal::where('created_at','>=',Carbon::now()->subdays(10))->get(['total','created_at']);
    // dd($data['allPaypal10']);
    return view("backend.components.js")->with($data);
  }

}
