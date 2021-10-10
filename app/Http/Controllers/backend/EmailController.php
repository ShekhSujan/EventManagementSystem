<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Setting;
use App\Models\Event;
use App\Models\Paypal;
use App\Models\Stripe;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use DB;

class EmailController extends Controller {
  public function email(Request $request) {
    $id=$request->input("id");
    $requestUrl=$request->input("req");
    $arr = [
      'name' => $request->input("name"),
      "email" => $request->input("email"),
      "title" =>$request->input("title"),
      "date" =>$request->input("date"),
    ];


    $name = $request->input("name");
    $title = $request->input("title");
    $date = date_create($request->input("date"));
    $evdate=date_format($date,"d M Y");
    $to = $request->input("email");
    $subject = $title;

    $site_phone="";
    $SiteSetting=Setting::select('*')->get();
    foreach($SiteSetting as $set){
      $site_phone=$set->phone;
    }

    $fromEmail='';
    $url='';
    $cc='';
    $bcc='';
    $Setting=EmailSetting::select('*')->get();
    foreach($Setting as $set){
      $fromEmail=$set->email;
      $url=$set->url;
      $cc=$set->cc;
      $bcc=$set->bcc;
    }
    $link="$url/account";
   
 $PaypalUrl="$url/art-dashboard/paypal-reg/$id";
    $StripeUrl="$url/art-dashboard/stripe-reg/$id";

    if($requestUrl==$PaypalUrl){
                DB::table('paypal_transaction')->where('id',$id)->update(['status'=> 1]);
                     }
    if($requestUrl==$StripeUrl){
     DB::table('stripe_transaction')->where('id',$id)->update(['status'=> 1]);
    }
    //dd($id,$StripeUrl,$requestUrl,$PaypalUrl);


    $message = "
    <!DOCTYPE html>
    <head>
    <title>Positive Bangladesh</title>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,600&amp;display=swap' rel='stylesheet'>
    <style>
    body{
      width: 650px;
      font-family: work-Sans, sans-serif;
      background-color: #f6f7fb;
      display: block;
      margin:0 auto ;
      padding-top:50px;
    }
    </style>
    </head>
    <p>Dear {$name},<br/>
    Thank you for registering to EVENT {$title}. Your registration and payment has been received.<br/>
    If you would like to view your registration details, you can login at the following link:
    <a href='{$link}'>My Account</a><br/>
    You registered with this email: {$to}.<br/>
    If you have any questions leading up to the event, feel free to reply to this email.<br/><br/>
    We look forward to seeing you on {$evdate}!<br/>
    Kind Regards,<br/>
    Event Staff<br/>
    {$fromEmail}<br/>
    {$site_phone}<br/>
    </p>
    ";
    
    
    
    if ($arr) {
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      // More headers
      $headers .= 'From: Enternals Event <' . $fromEmail . '>' . "\r\n";
      $headers .= 'Cc:  '.$cc.'' . "\r\n";
      $headers .= 'Bcc: '.$bcc.'' . "\r\n";
      mail($to, $subject, $message, $headers);
      return back()->with("msg", "Mail Submitted Successfully");
    }
    return redirect()->back()->with("error", "Error");
  }
}
