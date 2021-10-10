@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Event Details</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('event')}}" title="">Event</a></li>
          <li class="breadcrumb-item active">Event Details</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-140 pb-120 position-relative">
    <div class="container">
      @foreach($allEvent as $value)
      <div class="event-detail w-100">
        <div class="event-detail-info w-100">

          <div class="row align-items-center">
            <div class="col-md-12 col-sm-12 col-lg-6">
              <span class="thm-clr d-block">Join Us <strong>{{ date('d ,M Y', strtotime($value->date)) }}</strong></span>
              <h2 class="mv-0">{{$value->title}}</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6">
              <div class="about-info-wrap w-100">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="about-info w-100">
                      <i class="thm-clr flaticon-tickets"></i>
                      <div class="about-info-inner">
                        <span>From:</span>
                        <p class="mb-0">${{$value->price}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="about-info w-100">
                      <i class="thm-clr far fa-calendar-alt"></i>
                      <div class="about-info-inner">
                        <span>Opening Times</span>
                        <p class="mb-0">{{$value->time}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="about-info w-100">
                      <i class="thm-clr flaticon-pin-1"></i>
                      <div class="about-info-inner">
                        <span>Venue</span>
                        <p class="mb-0">{{$value->venue}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="about-info w-100">
                      <i class="thm-clr flaticon-parking-square-signal"></i>
                      <div class="about-info-inner">
                        <span>Your Parking:</span>
                        <p class="mb-0">
                          @if($value->parking==1)
                          Available
                          @else
                          Not Available
                          @endif
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="event-detail-img position-relative w-100">
            <img class="img-fluid w-100" src="{{asset("assets/images/event/banner/{$value->id}-{$value->slug}.{$value->image}")}}" alt="Event Detail Image">
                <div class="social-links4 mt-20 d-flex flex-wrap text-center">
               <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
              </div>
          </div>
        </div>
        <div class="event-detail-content position-relative w-100">
          <div class="event-detail-desc position-relative w-100">
            <h4 class="mb-0">Overview</h4>
            <p class="mb-0">{!!$value->details!!}</p>
          </div>
          <div class="event-detail-speaker position-relative w-100">
            <h4 class="mb-0">Host</h4>
            <div class="speaker-inner pl-0 w-100">
              <div class="row mrg50">
                <div class="col-md-6 col-sm-6 col-lg-6">
                  <div class="speaker-box position-relative mb-40 w-100 overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset("assets/images/speaker-artist/{$value->host}.{$value->host_image}")}}" alt="Speaker Image 1">
                    <div class="speaker-info position-absolute">
                      <h3 class="mb-0 text-white"><a href="{{route("host_details", $value->host) }}">{{$value->host_name}}</a></h3>
                      <span class="d-block">{{$value->host_designation}}</span>
                    </div>
                    <h3 class="mb-0 text-white position-absolute">{{$value->host_name}}</h3>
                    <div class="speaker-social position-absolute">
                      <a href="javascript:void(0);" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <a class="position-absolute" href="{{route("host_details", $value->host) }}" title=""><i class="fas fa-expand-alt"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="event-detail-getintouch position-relative w-100">
            <h4 class="mb-0">Get In Touch</h4>
            <div class="event-detail-getintouch-inner w-100">

              <p class="mb-0">Deadline Registration {{ date('d ,M Y', strtotime($value->deadline_reg)) }}</p>
              @if($value->deadline_reg < today())
              <a class="thm-btn fill-btn" title="">Registration Closed <i class="flaticon-trajectory"></i><span></span></a>
              @else
              <a class="thm-btn fill-btn" href="{{route("event_registration", $value->id) }}" title="">Book Now <i class="flaticon-trajectory"></i><span></span></a>
              @endif

            </div>
            <div class="event-detail-loc mt-50 w-100">
              <iframe src="{{$value->map}}" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </div>
      @endforeach<!-- Event Detail -->
    </div>
  </div>
</section>
<section>
  <div class="w-100 pt-110 pb-90 gray-layer opc9 position-relative">
    <div class="fixed-bg patern-bg" style="background-image: url({{asset("assets/frontend/images/patter-bg1.jpg")}});"></div>
    <div class="container">
      <div class="sec-title btm-icn mb-50 w-100 text-center">
        <div class="sec-title-inner d-inline-block">
          <span class="d-block thm-clr">Pricing Plans</span>
          <h2 class="mb-0">Biggest Festivals</h2>
          <i class=""></i>
        </div>
      </div><!-- Sec Title -->
      <div class="event-grid-wrap w-100">
        <div class="row res-caro">
          @foreach($allEventCategory as $value)
          <div class="col-md-4 col-sm-6 col-lg-4">
            <div class="event-grid-box mb-30 w-100">
              <div class="event-grid-img w-100 overflow-hidden position-relative">
                <img class="img-fluid w-100" src="{{asset("assets/images/event/thumnails/{$value->id}-{$value->slug}.{$value->image}")}}" alt="Event Image 1">
                <span class="position-absolute"><a class="rounded-circle" href="javascript:void(0);" title=""><i class="fas fa-heart"></i></a></span>
                <a class="thm-btn fill-btn" href="{{ url('event-details/'.$value->id.'/'.$value->slug) }}" title="">{{($value->date < today()) ? 'Completed' : 'Book now' }}<span></span></a>
              </div>
              <div class="event-grid-info w-100">
                <h3 class="mb-0"><a href="{{ url('event-details/'.$value->id.'/'.$value->slug) }}" title="">{{$value->title}}</a></h3>
                <span class="event-date thm-clr d-block">{{ date('d ,M Y', strtotime($value->date)) }}</span>
                <ul class="event-grid-meta mb-0 list-unstyled d-flex flex-wrap">
                  <li><i class="far fa-clock"></i>Time: <strong>{{$value->time}}</strong></li>
                  <li><i class="fas fa-tags"></i>From: <strong>${{$value->price}}</strong></li>
                </ul>
                <span class="event-loc d-block"><i class="fas fa-map-pin"></i>{{$value->venue}}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- Event Grid Wrap -->
    </div>
  </div>
</section>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f77fe1179ff5b00124874b0&product=sop' async='async'></script>
@endsection
