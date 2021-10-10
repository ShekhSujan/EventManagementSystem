<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\SpeakerArtist;
use App\Models\Paypal;
use App\Models\Stripe;
use App\Models\Setting;
use Illuminate\Http\Request;
use DB;

class EventStasticsController extends Controller
{
  public function index()
  {
    $data['title']='Event';
    $data['allEvent'] = event::select('event.*','categories.title as category_title','speaker_artist.name as host_name')
    ->join('categories', 'categories.id', '=', 'event.category_id')
    ->join('speaker_artist', 'speaker_artist.id', '=', 'event.host')
    ->where('date','>=',today())
    ->orderBy('date', 'desc')
    ->get();
    return view("backend.event-statistics.index")->with($data);
  }
  public function ongoing()
  {
    $data['title']='Completed Event';
    $data['allEvent'] = event::select('*')
    ->where('date','<',today())
    ->orderBy('date', 'desc')
    ->get();
    return view("backend.event-statistics.completed")->with($data);
  }
  public function completed()
  {
    $data['title']='Completed Event';
    $data['allEvent'] = event::select('*')
    ->where('date','<',today())
    ->orderBy('date', 'desc')
    ->get();
    return view("backend.event-statistics.completed")->with($data);
  }

  public function info($id)
  {
    $data['title']='Event Info';
        $data['selected'] = Event::find($id);
    $data['allParticipentByPaypal'] = Paypal::select('*')->where('event_id',$id)->get();
    $data['allParticipentByStripe'] = Stripe::select('*')->where('event_id',$id)->get();
    $data['allPaypalPaymentCount']=Paypal::select('*')->where('event_id',$id)->count();

    $data['allPaypalPaymentByUser']=Paypal::select('*')->where('event_id',$id)->count();
    $data['allStripePaymentByUser']=Stripe::select('*')->where('event_id',$id)->count('user_id');

    $data['allPaypalPaymentSum']=Paypal::select('*')->where('event_id',$id)->sum('total');
    $data['allStripePaymentSum']=Stripe::select('*')->where('event_id',$id)->sum('total');

    $data['allPaypalTicket']=Paypal::select('*')->where('event_id',$id)->sum('qty');
    $data['allStripeTicket']=Stripe::select('*')->where('event_id',$id)->sum('qty');

    $data['allSetting']=Setting::select('*')->get();
    //dd($data['allPaypalPaymentByUser']);
    return view("backend.event-statistics.event-info")->with($data);
  }

  public function paypal_reg($id)
  {
    $data['title']='Reg Details';
    $data['allPaypal'] = Paypal::select('paypal_transaction.*','event.image as event_image','event.slug as event_slug','event.details as event_details',
    'event.date as event_date','event.time as event_time','event.venue as event_venue','event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','paypal_transaction.event_id')
    ->join('users','users.id','=','paypal_transaction.user_id')
    ->where('paypal_transaction.id',$id)
    ->get();
    //dd($data['allPaypal']);
       $data['allSetting']=Setting::select('*')->get();
    return view("backend.event-statistics.paypal-reg")->with($data);
  }

    public function stripe_reg($id)
  {
    $data['title']='Reg Details';
    $data['allStripe'] = Stripe::select('stripe_transaction.*','event.image as event_image','event.slug as event_slug','event.details as event_details',
   'event.date as event_date','event.time as event_time','event.venue as event_venue','event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','stripe_transaction.event_id')
    ->join('users','users.id','=','stripe_transaction.user_id')
    ->where('stripe_transaction.id',$id)
    ->get();
    //dd($data['allStripe']);
     $data['allSetting']=Setting::select('*')->get();
    return view("backend.event-statistics.stripe-reg")->with($data);
  }

}
