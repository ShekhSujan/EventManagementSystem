<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
  Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

// ################## Frontend Page Route #######################
Route::get('/', 'frontend\BaseController@index')->name('home');
Route::get('/about', 'frontend\BaseController@about')->name('about');
Route::get('/account', 'frontend\BaseController@account')->name('account')->middleware("auth");
Route::get('/event-schedule', 'frontend\BaseController@event_schedule')->name('event_schedule');
Route::get('/event', 'frontend\BaseController@event')->name('event');
Route::get('/event-details/{id}/{slug}', 'frontend\BaseController@event_details')->name('event_details');
Route::get('/event-category/{id}', 'frontend\BaseController@event_category')->name('event_category');
Route::get('/event-registration/{id}', 'frontend\EventRegistrationController@event_registration')->name('event_registration')->middleware("auth");
Route::get('/host', 'frontend\BaseController@host')->name('host');
Route::get('/host-details/{id}', 'frontend\BaseController@host_details')->name('host_details');
Route::get('/sponsor', 'frontend\BaseController@sponsor')->name('sponsor');
Route::get('/gallery', 'frontend\BaseController@gallery')->name('gallery');
Route::get('/blog', 'frontend\BaseController@blog')->name('blog');
Route::get('/blog-details/{id}/{slug}', 'frontend\BaseController@blog_details')->name('blog_details');
Route::get('/policy', 'frontend\BaseController@policy')->name('policy');
Route::get('/contact', 'frontend\BaseController@contact')->name('contact');

Route::post('/update-profile', 'frontend\BaseController@update_profile')->name('update_profile');
Route::get('/event-ticket-paypal/{id}', 'frontend\BaseController@event_ticket_paypal')->name('event_ticket_paypal');
Route::get('/event-ticket-stripe/{id}', 'frontend\BaseController@event_ticket_stripe')->name('event_ticket_stripe');
// #############  Payment  ###################
Route::post('/checkout', 'frontend\EventRegistrationController@checkout')->name('checkout');
Route::post('/ipnpaypal', 'frontend\EventRegistrationController@ipnpaypal')->name('ipn.paypal');
Route::post("/pay-stripe", "frontend\EventRegistrationController@pay_stripe")->name("pay_stripe");
Route::fallback(function () {
  $data['title']="404";
  return view("frontend.pages.blank")->with($data);
});
//-##################- Front Pages Store ####################-->
Route::post("/contact-store", "backend\ContactController@constore")->name("contact_store");
Route::post("/subscriber-store", "backend\SubscriberController@subscriberstore")->name("subscriber_store");
//-##################- Front Pages Store ####################-->

// ################## Frontend Page Route #######################
Route::get('/res', 'backend\DashboardController@res')->name('res');
// ################## Backend Page Route #######################
Route::get('/art-dashboard', 'backend\DashboardController@index')->name('dashboard')->middleware("auth");

//-##################- Dashboard CRUD  Route ####################
  Route::prefix("/art-dashboard")->name("backend.")->middleware("auth")->group(function() {
  Route::get('/cache-clear', 'backend\DashboardController@cache')->name('cache_clear');
  Route::get('/contact-list', 'backend\DashboardController@contact_list')->name('contact_list');
  Route::get('/unauthorized', 'backend\DashboardController@unauthorized')->name('unauthorized');
  Route::get('/search/{date}', 'backend\DashboardController@search')->name('search');
  Route::get('/paypal-reg/{id}', 'backend\EventStasticsController@paypal_reg')->name('paypal_reg');
  Route::get('/stripe-reg/{id}', 'backend\EventStasticsController@stripe_reg')->name('stripe_reg');
  Route::post('/email', 'backend\EmailController@email')->name('email');

  $arr = [
    "social-media" => "backend\SocialMediaController",
    "contact" => "backend\ContactController",
    "subscriber" => "backend\SubscriberController",
    "policy" => "backend\PolicyController",
    "about" => "backend\AboutController",
    "setting" => "backend\SettingController",
    "meta" => "backend\MetaController",
    "users" => "backend\UsersController",
    "category" => "backend\CategoryController",

    "blog" => "backend\BlogController",
    "blog-category" => "backend\BlogCategoryController",
    "speaker-artist" => "backend\SpeakerArtistController",
    "gallery" => "backend\GalleryController",
    "sponsor" => "backend\SponsorController",
    "event" => "backend\EventController",
    "slider" => "backend\SliderController",
    "event-statistics" => "backend\EventStasticsController",
 "email-setting" => "backend\EmailSettingController",

  ];
  foreach ($arr as $key => $value) {
    Route::get("/{$key}", "{$value}@index")->name("{$key}.index");
    Route::get("/{$key}/create", "{$value}@create")->name("{$key}.create");
    Route::post("/{$key}", "{$value}@store")->name("{$key}.store");
    Route::get("/{$key}/edit/{id}", "{$value}@edit")->name("{$key}.edit");
    Route::post("/{$key}/update", "{$value}@update")->name("{$key}.update");
    Route::get("/{$key}/view/{id}", "{$value}@view")->name("{$key}.view");
    Route::post("/{$key}/delete", "{$value}@destroy")->name("{$key}.destroy");
    Route::get("/{$key}/completed", "{$value}@completed")->name("{$key}.completed");
    Route::get("/{$key}/info/{id}", "{$value}@info")->name("{$key}.info");
  }
  });
//-##################- Dashboard CRUD  Route ####################



// ################## Backend Page Route #######################

// ################## Frontend Master Route #######################
// Frontend Route
// ################## Frontend Master Route #######################

// ##################  Master Route #######################
// Backend Route


View::composer(['backend.components.topbar','backend.components.js'], function($views){
  $Profile=App\Models\Users::all();
  $views->with('Profile',$Profile);

  $PaypalReg=App\Models\Paypal::all()->where('status',0)->count();
  $views->with('PaypalReg',$PaypalReg);

  $StripeReg=App\Models\Stripe::all()->where('status',0)->count();
  $views->with('StripeReg',$StripeReg);
});
View::composer(['backend.components.leftbar','backend.components.js','layouts.dashboard','layouts.app','auth.login',
'frontend.components.master-components.menubar1','frontend.components.master-components.menubar2','frontend.components.master-components.footer'], function($views){
  $Setting=App\Models\Setting::all();
  $views->with('Setting',$Setting);

  $Meta=App\Models\Meta::all();
  $views->with('Meta',$Meta);

  $Social=App\Models\SocialMedia::all();
  $views->with('Social',$Social);
});


View::composer(['frontend.components.master-components.menubar'], function($views){
  $Category=App\Models\Category::all()->sortBy('position');
  $views->with('Category',$Category);

  $Category2=App\Models\Category::all()->sortBy('position')->skip(6);
  $views->with('Category2',$Category2);

});

Route::get('/data-10days', 'backend\DatewiseDataController@index')->name('data_10days');

// ##################  Master Route ####################### -->
//-##################- Site Cache Clean ####################-->
Route::get('/clear-cache', function() {
  Artisan::call('cache:clear');
  return "Cache is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 500);</script>";
});

Route::get('/route-cache', function() {
  Artisan::call('route:clear');
  return "Route is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 500);</script>";
});

Route::get('/config-cache', function() {
  Artisan::call('config:clear');
  return "Config is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 500);</script>";
});

Route::get('/view-cache', function() {
  Artisan::call('view:clear');
  return "View is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 500);</script>";

});
//-##################- Site Cache Clean ####################-->
