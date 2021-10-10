<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Users;
use App\Models\Subscriber;
use App\Models\Paypal;
use App\Models\Stripe;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function index()
  {
    $data['title']='Dashboard Home';
    $data['allEventCategory']=Event::select('event.category_id','categories.title as category_title',DB::raw('count(*) as total'))
    ->join('categories', 'categories.id', '=', 'event.category_id')
    ->groupBy('category_id','categories.title')
    ->get();
    $data['allBlogCategory']=Blog::select('blog.category_id','blog_category.title as category_title',DB::raw('count(*) as total'))
    ->join('blog_category', 'blog_category.id', '=', 'blog.category_id')
    ->groupBy('category_id','blog_category.title')
    ->get();

    $data['allSubscriber']=Subscriber::select('*')->orderBy('created_at')->get();

    $data['allPaypalPayment']=Paypal::select('*')->sum('total');
    $data['allStripePayment']=Stripe::select('*')->sum('total');
    // ddd($data['allSalesByPaypal']);
    $data['Paypal10']=Paypal::select('total')->get();
    $data['Stripe10']=Stripe::select('total')->get();

    $data['allYearlyReport']=Event::select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
    ->whereYear('created_at', date('Y'))
    ->groupBy('monthname')
    ->get();

    $data['allMonthlyReport']=Event::select(DB::raw("(COUNT(*)) as count"),DB::raw("DATE(created_at) as day"))
    ->whereMonth('created_at', date('m'))
    ->whereYear('created_at', date('Y'))
      ->groupBy('day')
    ->get();

    $data['allEventCalender']=Event::select('date',DB::raw("(COUNT(*)) as count"))
     ->groupBy('date')
     ->get();

    $data['allUsers']=Users::select('*')->get();

    $data['allOngoing'] = Event::select('*')
    ->where('date','>',today())
    ->orderBy('date', 'desc')
    ->get();

    return view('backend.home')->with($data);
  }

  public function search(Request $request,$date)
  {
    $data['title']='Events By Date';
    $data['allEvent']=Event::select('*')
     ->Where('date', 'like', '%'.$date.'%')
    ->get();
  //  dd($data['allEvent']);
    return view('backend.search')->with($data);
  }
  public function unauthorized()
  {
    $data['title']='Unauthorized';
    return view('backend.unauthorized')->with($data);
  }

  public function cache()
  {
    $data['title']="Site Cache Clear";
    return view('backend.cache-clear')->with($data);
  }
  public function contact_list()
  {
    $data['title']="ContactList";
    $data['allContactList']=Users::select('*')
    ->where('role','>=',1)
    ->get();
    return view('backend.contact-list')->with($data);
  }
}
