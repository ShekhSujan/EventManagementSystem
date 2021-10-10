@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Event</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item active">Event</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-140 pb-120 position-relative">
    <div class="container">
      <div class="event-grid-wrap w-100">
        <div class="row">
          @foreach($allEvent as $value)
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="event-grid-box mb-30 w-100">
              <div class="event-grid-img w-100 overflow-hidden position-relative">
                <img class="img-fluid w-100" src="{{asset("assets/images/event/thumnails/{$value->id}-{$value->slug}.{$value->image}")}}" alt="Event Image 1">
                <span class="position-absolute"><a class="rounded-circle" href="javascript:void(0);" title=""><i class="fas fa-heart"></i></a></span>
                <a class="thm-btn fill-btn" href="{{ url('event-details/'.$value->id.'/'.$value->slug) }}" title="">  {{($value->date < today()) ? 'Completed' : 'Book now' }}<span></span></a>
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
      <div class="pagination-wrap d-inline-block mt-40 text-center w-100">
        <ul class="pagination justify-content-center align-items-center mb-0 list-unstyled">
          {{$allEvent->links()}}
        </ul>
      </div><!-- Pagination Wrap -->
    </div>
  </div>
</section>
@endsection
