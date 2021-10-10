@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Contact Us</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item active">Contact Us</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-140 position-relative">
    <div class="container">
      <div class="contact-info-wrap text-center w-100">
        <div class="row">
          @foreach($allSetting as $value)
          <div class="col-md-4 col-sm-6 col-lg-4">
            <div class="contact-info-box mb-40 w-100">
              <i class="thm-clr rounded-circle fas fa-map-marker-alt"></i>
              <h4 class="mb-0">Location</h4>
              <p class="mb-0">{{$value->address}}</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-lg-4">
            <div class="contact-info-box mb-40 w-100">
              <i class="thm-clr rounded-circle flaticon-people"></i>
              <h4 class="mb-0">Call Now</h4>
              <p class="mb-0"><span class="d-block">Phone: {{$value->phone}}</span></p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-lg-4">
            <div class="contact-info-box mb-40 w-100">
              <i class="thm-clr rounded-circle fas fa-envelope-open"></i>
              <h4 class="mb-0">Mail Info</h4>
              <p class="mb-0"><a href="javascript:void(0);" title="">{{$value->email}}</a></p>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- Contact Info Wrap -->
      <div class="contact-map-wrap mt-65 style2 w-100">
        <div class="sec-title mb-45 w-100 text-center">
          <div class="sec-title-inner pt-0 d-inline-block">
            <span class="d-block thm-clr">Connect With Us</span>
            <h2 class="mb-0">If You Have Any Questions <br> Please Contact Us</h2>
          </div>
        </div><!-- Sec Title -->
        <div class="row align-items-center">
          <div class="col-md-12 col-sm-12 col-lg-6">
            <div class="contact-map w-100" id="contact-map">
              @foreach($allSetting as $value)
              <iframe src="{{$value->map}}"></iframe>
              @endforeach
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-6">
            <div class="contact-form-wrap p-0 w-100">
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if (session('msg'))
                    <div class="alert alert-success">
              {{ session('msg') }}
              </div>
              @endif
              <form class="w-100" action="{{route('contact_store')}}" method="post" id="email-form">
                @csrf
                <div class="form-group w-100">
                  <div class="response w-100"></div>
                </div>
                <div class="row mrg20">
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100 fname" type="text" name="name" placeholder="Enter Name" required>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100 email" type="email" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100 phone" type="number" name="phone" placeholder="Phone No" required>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100 phone" type="text" name="subject" placeholder="Subject" required>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <textarea class="w-100 contact_message" name="message" placeholder="Event Details" required></textarea>
                    <button class="thm-btn fill-btn" id="submit" type="submit">Start Discussion<span></span></button>
                  </div>
                </div>
              </form></br></br></br>
            </div>
          </div>
        </div>
      </div><!-- Contact With Map -->
    </div>
  </div>
</section>
@endsection
