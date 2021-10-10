@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Event Host</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item active">Event Host</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-140 pb-120 position-relative">
    <div class="container">
      <div class="speakers-wrap w-100">
        <div class="row mrg45">
          @foreach($allHost as $value)
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="speaker-box mb-40 position-relative w-100 overflow-hidden">
              <img class="img-fluid w-100" src="{{asset("assets/images/speaker-artist/{$value->id}.{$value->image}")}}" alt="Speaker Image 1">
              <div class="speaker-info position-absolute">
                <h3 class="mb-0 text-white"><a href="{{route("host_details", $value->id) }}">{{$value->name}}</a></h3>
                <span class="d-block">{{$value->designation}}</span>
              </div>
              <h3 class="mb-0 text-white position-absolute">{{$value->name}}</h3>
              <div class="speaker-social position-absolute">
                <a href="{{$value->fb}}" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
              </div>
              <a class="position-absolute" href="#" title=""><i class="fas fa-expand-alt"></i></a>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- Speakers Wrap -->
      <div class="pagination-wrap mt-30 text-center w-100">
        <ul class="pagination justify-content-center align-items-center mb-0 list-unstyled">
          {{$allHost->links()}}
        </ul>
      </div><!-- Pagination Wrap -->
    </div>
  </div>
</section>
@endsection
