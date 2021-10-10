@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Host Details</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('host')}}" title="">Host</a></li>
          <li class="breadcrumb-item active">Host Details</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-140 pb-120 position-relative">
    <div class="container">
      <div class="speaker-detail-wrap w-100">
        <div class="row justify-content-center">
          @foreach($allHost as $value)
          <div class="col-md-12 col-sm-12 col-lg-10">
            <div class="speaker-detail-info-wrap">
              <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-6">
                  <img class="img-fluid w-100" src="{{asset("assets/images/speaker-artist/{$value->id}.{$value->image}")}}" alt="Speaker Detail Image">
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                  <div class="speaker-detail-info w-100">
                    <h2 class="mb-0">{{$value->name}}</h2>
                    <span class="thm-clr d-block">{{$value->designation}}</span>
                    <ul class="speaker-info-list mb-0 list-unstyled w-100">
                      <li><i class="fas fa-phone thm-clr"></i>{{$value->phone}}</li>
                      <li><i class="far fa-envelope-open thm-clr"></i><a href="javascript:void(0);" title="">{{$value->email}}</a></li>
                    </ul>
                    <div class="social-links4 d-flex flex-wrap">
                      <a class="facebook" href="{{$value->fb}}" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                      <a class="instagram" href="{{$value->instagram}}" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                      <a class="twitter" href="{{$value->twitter}}" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="speaker-detail-desc w-100">
              <p class="mb-0">{!!$value->details!!}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- Speaker Detail Wrap -->
    </div>
  </div>
</section>
@endsection
