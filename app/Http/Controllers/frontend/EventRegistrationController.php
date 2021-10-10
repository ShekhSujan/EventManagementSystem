<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sponsor;
use App\Models\Blog;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\SpeakerArtist;
use App\Models\Event;
use App\Models\Slider;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\Charge;
use DB;
use Auth;

class EventRegistrationController extends Controller
{
  public function event_registration(Request $request,$id)
  {
    $data['title']='Events Registration';
    $data['selected'] = Event::find($id);
    return view('frontend.pages.event-registration')->with($data);
  }

  public function checkout(Request $request){
    if($request->input('payment_method') == 1){
      $data = [
        "user_id" => Auth::user()->id,
        "event_id" =>$request->input("id"),
        "qty" =>$request->input("qty"),
        "amount" =>$request->input("price"),
        "total" =>$request->input("price")*$request->input("qty"),
        "token" => time() . rand(100, 999),
        "name" =>$request->input("name"),
        "phone" =>$request->input("phone"),
        "email" =>$request->input("email"),
        "address" =>$request->input("address"),
      ];
      DB::table("paypal_transaction")->insert($data);

      $payment_data = array(
        "quantity" => $request->input("qty"),
        "amount" => $request->input("price"),
        "account" => "b.97825@gmail.com",
        "track" => $data['token'],
        "url" => "https://www.sandbox.paypal.com/cgi-bin/webscr" //(Demo Account)
        //"url" => "https://secure.paypal.com/cgi-bin/webscr" (Live Account)
      );

      return view("frontend.pages.paypal")->with($payment_data);

    }
    else if($request->input('payment_method') == 2){
      $tempArr = array(
        "user_id" => Auth::user()->id,
        "event_id" =>$request->input("id"),
        "qty" =>$request->input("qty"),
        "amount" =>$request->input("price"),
        "total" =>$request->input("price")*$request->input("qty"),
        "name" =>$request->input("name"),
        "phone" =>$request->input("phone"),
        "email" =>$request->input("email"),
        "address" =>$request->input("address"),
        "stripe_trx"=> time() . rand(1111, 9999)
      );
      $request->session()->put($tempArr);
      return view("frontend.pages.stripe")->with($tempArr);
    }
  }

  public function pay_stripe(Request $request){
    Stripe::setApiKey("sk_test_UAIIz3JPvfaPZKqwGE101Me1007XoHjTFG");
    $token = $request->input("stripeToken");
    $evid = $request->input("event_id");
    $name = $request->input("name");
    $email = $request->input("email");
    $phone = $request->input("phone");
    $address = $request->input("address");
    //echo $token;
    try{
      $customer = \Stripe\Customer::create([
        'email' => "sujanmahmudovi@gmail.com",
        'source' => $token
      ]);
      $charge = \Stripe\Charge::create([
        'amount' => floor($request->input("amount") * 100),
        'currency' => 'usd',
        'description' => 'Event Subscribed',
        'customer' => $customer->id
      ]);
    }catch (Card $card) {
      return redirect()->back()->with([
        "error" => $card->getMessage()
        ])->withInput();
      }
      $tempArr = array(
        "user_id" => Auth::user()->id,
        "qty" => $request->input("qty"),
        "total" =>$request->input("qty")*$charge['amount']/100,
        "name" =>$name,
        "phone" =>$phone,
        "email" =>$email,
        "address" =>$address,
        "event_id" =>$evid,//variable ar maddhome insert $pacid = $request->input("package_id");//
        "status"=>0,
        "customerid" => $customer->id,
        "amount" => $charge['amount']/100,
      );
      //dd($tempArr);
      DB::table("stripe_transaction")->insertGetId($tempArr);
      return redirect("/");
    }
    public function ipnpaypal() {
      $raw_post_data = file_get_contents('php://input');
      $raw_post_array = explode('&', $raw_post_data);
      $myPost = array();
      foreach ($raw_post_array as $keyval) {
        $keyval = explode('=', $keyval);
        if (count($keyval) == 2)
        $myPost[$keyval[0]] = urldecode($keyval[1]);
      }

      $req = 'cmd=_notify-validate';
      if (function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
      }
      foreach ($myPost as $key => $value) {
        if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
          $value = urlencode(stripslashes($value));
        } else {
          $value = urlencode($value);
        }
        $req .= "&$key=$value";
      }
      $paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
      //$paypalURL = "https://secure.paypal.com/cgi-bin/webscr";
      $ch = curl_init($paypalURL);
      if ($ch == FALSE) {
        return FALSE;
      }
      curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
      curl_setopt($ch, CURLOPT_SSLVERSION, 6);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
      // Set TCP timeout to 30 seconds
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
      $res = curl_exec($ch);
      $tokens = explode("\r\n\r\n", trim($res));
      $res = trim(end($tokens));

      //if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {
      $receiver_email = $_POST['receiver_email'];
      $mc_currency = $_POST['mc_currency'];
      $mc_gross = $_POST['mc_gross'];
      $token = $_POST['custom'];
      $pm = DB::table("paypal_transaction")->where("token", "=", $token)->first();
      if ($receiver_email == "b.97825@gmail.com" && $mc_currency == "USD" && $mc_gross == $pm->amount && $pm->status == 0) {
        $upd = array("status"=>1);
        DB::table("paypal_transaction")->where("id", $pm->id)->update($upd);
        mail("sujanmahmudovi@gmail.com", "Payment receive from Paypal", "You have receive USD: {$mc_gross} from your website");
      }

    }



  }
