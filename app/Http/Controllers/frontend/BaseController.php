<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sponsor;
use App\Models\Blog;
use App\Models\About;
use App\Models\Policy;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\SpeakerArtist;
use App\Models\Event;
use App\Models\Slider;
use App\Models\Users;
use App\Models\Paypal;
use App\Models\Stripe;
use Auth;
use DB;

class BaseController extends Controller
{
  public function index()
  {
    $data['title']='Home Page';
    $data['allAbout']=About::Select('*')->get();
    $data['allCategory']=Category::Select('*')->where('status',1)->orderBy('position')->get();
    $data['allSponsor']=Sponsor::Select('*')->where('status',1)->orderBy('id','desc')->get();
    $data['allBlog']=Blog::Select('*')->where('status',1)->orderBy('id','desc')->get();

    $data['allSlider']=Slider::Select('*')->where('status',1)->get();
    $data['allEvent']=Event::select('*')->where('status',1)->orderBy('date','desc')->limit(3)->get();

    $data['allEventDate']=Event::select('date')->where('status',1)->where('date','>=',today())->groupBy('date')->paginate(3);
    $data['allEventByDate']=Event::select('*')->where('status',1)->where('date','>=',today())->get();

    return view('frontend.pages.home')->with($data);

  }

  public function event_schedule()
  {
    $data['title']='Event Schedule';
    $data['allEvent']=Event::select('date')->where('status',1)->where('date','>=',today())->groupBy('date')->get();
    $data['allEventByDate']=Event::select('*')->where('status',1)->where('date','>=',today())->get();
    return view('frontend.pages.event-schedule')->with($data);
  }
  public function event()
  {
    $data['title']='Events';
    $data['allEvent']=Event::select('*')->where('status',1)->orderBy('date','desc')->paginate(3);
    return view('frontend.pages.event')->with($data);
  }
  public function event_details(Request $request,$id,$slug)
  {
    $data['title']='Events Details';
    $data['allEvent'] = Event::select('event.*','categories.title as category_title',
    'speaker_artist.name as host_name','speaker_artist.designation as host_designation',
    'speaker_artist.image as host_image')
    ->join('categories', 'categories.id', '=', 'event.category_id')
    ->join('speaker_artist', 'speaker_artist.id', '=', 'event.host')
    ->orderBy('id', 'desc')
    ->where('event.id',$id)
    ->get();
    $data['cat'] = Event::find($id);
    $cats=$data['cat']->category_id;
    $data['allEventCategory'] = Event::select('*')
    ->where('event.category_id','!=',$cats)
    ->where('status',1)->orderBy('date','desc')
    ->get();
    //dd(  $data['allEventCategory'] );
    return view('frontend.pages.event-details')->with($data);
  }
  public function event_category(Request $request,$id)
  {
    $data['title']='Events Category';
    $data['allEventCategory'] = Event::select('*')
    ->where('category_id',$id)
    ->paginate(6);
    return view('frontend.pages.event-category')->with($data);
  }
  public function host()
  {
    $data['title']='Events Host';
    $data['allHost']=SpeakerArtist::select('*')->where('status',1)->paginate(3);
    return view('frontend.pages.host')->with($data);
  }
  public function host_details(Request $request,$id)
  {
    $data['title']='Host Details';
    $data['allHost']=SpeakerArtist::select('*')->where('id',$id)->get();
    return view('frontend.pages.host-details')->with($data);
  }
  public function sponsor()
  {
    $data['title']='Our Sponsor';
    $data['allSponsor']=Sponsor::select('*')->where('status',1)->get();
    return view('frontend.pages.sponsor')->with($data);
  }
  public function gallery()
  {
    $data['title']='Our Gallery';
    $data['allGallery'] = Gallery::select('gallery.*','categories.title as category_title')
    ->join('categories', 'categories.id', '=', 'gallery.category_id')
    ->where('gallery.status',1)
    ->orderBy('id', 'desc')
    ->groupBy()
    ->get();
    $data['allGalleryCategory'] = Gallery::select('category_id','categories.title as category_title')
    ->join('categories', 'categories.id', '=', 'gallery.category_id')
    ->groupBy('category_id','category_title')
    ->get();
    return view('frontend.pages.gallery')->with($data);
  }
  ############################  Blog    ########################
  public function blog()
  {
    $data['title']='Our Blog';
    $data['allBlog']=Blog::select('*')->where('status',1)->paginate(3);
    $data['allBlogSide']=Blog::select('*')->where('status',1)->limit(5)->orderBy('id','desc')->get();

    $data['allBlogCategory']=Blog::select('category_id','blog_category.title as category_title',DB::raw('count(*) as total'))
    ->join('blog_category', 'blog_category.id', '=', 'blog.category_id')
    ->where('blog.status',1)
    ->groupBy('category_id','blog_category.title')

    ->get();
    return view('frontend.pages.blog')->with($data);
  }
  ############################  Blog    ########################
  public function blog_details(Request $request,$id,$slug)
  {
    $data['title']='Blog Details';
    $data['allBlog']=Blog::select('*')->where('id',$id)->get();
    $data['allBlogSide']=Blog::select('*')->limit(5)->orderBy('id','desc')->get();

    $data['allBlogCategory']=Blog::select('category_id','blog_category.title as category_title',DB::raw('count(*) as total'))
    ->join('blog_category', 'blog_category.id', '=', 'blog.category_id')
    ->groupBy('category_id','blog_category.title')
    ->get();
    $data['selected'] = Blog::find($id);
    $tag=$data['selected']->tag;
    $data['allTags'] = explode(',', $tag);
    return view('frontend.pages.blog-details')->with($data);
  }
  ############################  Blog Details End   ########################
  public function about()
  {
    $data['title']='About Us';
    $data['allAbout']=About::select('*')->get();
    return view('frontend.pages.about')->with($data);
  }
  public function account()
  {
    $data['title']='Account';
    $data['allPaypal'] = Paypal::select('paypal_transaction.*','event.image as event_image','event.slug as event_slug','event.date as event_date',
    'event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','paypal_transaction.event_id')
    ->join('users','users.id','=','paypal_transaction.user_id')
    ->where('paypal_transaction.user_id','=',Auth::user()->id)
    ->where('event.date','<',today())
    ->get();
    $data['allStripe'] = Stripe::select('stripe_transaction.*','event.image as event_image','event.slug as event_slug','event.date as event_date',
    'event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','stripe_transaction.event_id')
    ->join('users','users.id','=','stripe_transaction.user_id')
    ->where('stripe_transaction.user_id','=',Auth::user()->id)
    ->where('event.date','<',today())
    ->get();

    $data['allPaypalOngoing'] = Paypal::select('paypal_transaction.*','event.image as event_image','event.slug as event_slug','event.date as event_date',
    'event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','paypal_transaction.event_id')
    ->join('users','users.id','=','paypal_transaction.user_id')
    ->where('paypal_transaction.user_id','=',Auth::user()->id)
    ->where('event.date','>=',today())
    ->get();
    $data['allStripeOngoing'] = Stripe::select('stripe_transaction.*','event.image as event_image','event.slug as event_slug','event.date as event_date',
    'event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','stripe_transaction.event_id')
    ->join('users','users.id','=','stripe_transaction.user_id')
    ->where('stripe_transaction.user_id','=',Auth::user()->id)
    ->where('event.date','>=',today())
    ->get();
    return view('frontend.pages.account')->with($data);
  }
  public function event_ticket_paypal(Request $request,$id)
  {
    $data['title']='Ticket Details';
    $data['allPaypal'] = Paypal::select('paypal_transaction.*','event.image as event_image','event.date as event_date',
    'event.time as event_time','speaker_artist.name as event_host',
    'event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','paypal_transaction.event_id')
    ->join('speaker_artist','speaker_artist.id','=','event.host')
    ->join('users','users.id','=','paypal_transaction.user_id')
    ->where('paypal_transaction.id','=',$id)
    ->get();
    return view('frontend.pages.event-ticket-paypal')->with($data);
  }
  public function event_ticket_stripe(Request $request,$id)
  {
    $data['title']='Ticket Details';
    $data['allStripe'] = Stripe::select('stripe_transaction.*','event.image as event_image','event.date as event_date',
    'event.time as event_time','speaker_artist.name as event_host',
    'event.title as event_title','users.image as user_image')
    ->join('event','event.id','=','stripe_transaction.event_id')
    ->join('speaker_artist','speaker_artist.id','=','event.host')
    ->join('users','users.id','=','stripe_transaction.user_id')
    ->where('stripe_transaction.id','=',$id)
    ->get();
    return view('frontend.pages.event-ticket-stripe')->with($data);
  }
  // ################## Frontend ###################
  public function update_profile(Request $request)
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
      "phone" => $request->input("phone"),
      "address" => $request->input("address"),
      'image' => $ext,
    ];
    //  dd($arr);
    if (Users::where('id', $id)->update($arr)) {
      $extn=$request->input("$ext");
      $path="assets/images/users/{$id}.{$ext}";
      if($photo){
        if(is_file($path)){
          unlink($path);
        }
        $photo->move("assets/images/users/", "{$id}.{$ext}");
      }
      return redirect()->back()->with("msg", "Update Successfully");
    }
    return redirect()->back()->with("error", "Some Error Occured");
  }
  public function policy()
  {
    $data['title']='Privacy Policy';
    $data['allPolicy']=Policy::select('*')->get();
    return view('frontend.pages.policy')->with($data);
  }
  public function contact()
  {
    $data['title']='ContactUs';
    $data['allSetting']=Setting::select('*')->get();
    return view('frontend.pages.contact')->with($data);
  }
}
