@extends('layouts.app')
@section('content')
<section>
          <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
      <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
              <div class="container">
                  <div class="page-title-inner d-inline-block">
                      <h1 class="mb-0">About Us</h1>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
                          <li class="breadcrumb-item active">About Us</li>
                      </ol>
                  </div>
              </div>
          </div><!-- Page Title Wrap -->
      </section>
      <section>
          <div class="w-100 pt-140 pb-120 position-relative">
              <div class="container">
                  <div class="about-wrap2 w-100">
                        @foreach($allAbout as $value)
                      <div class="row align-items-center">
                          <div class="col-md-12 col-sm-12 col-lg-6">
                              <div class="about-img style2">
                                  <img class="img-fluid w-100" src="{{asset("assets/images/about/{$value->id}.{$value->image}")}}" alt="About Image 5">
                              </div>
                          </div>
                          <div class="col-md-12 col-sm-12 col-lg-6">
                              <div class="about-desc3 w-100">
                                  <div class="sec-title mb-25 w-100">
                                      <div class="sec-title-inner pt-0 d-inline-block">
                                          <span class="d-block thm-clr">About The Event</span>
                                      <h3 class="mb-0">{{$value->title}}</h3>
                                      </div>
                                  </div><!-- Sec Title -->
                                    <p class="mb-0">{{$value->about}}</p>
                              </div>
                          </div>
                      </div>
                          @endforeach
                  </div><!-- About Wrap -->
                  <div class="facts-wrap mt-70 style2 text-center w-100">
                      <div class="row mrg justify-content-center">
                          <div class="col-md-6 col-sm-6 col-lg-3">
                              <div class="fact-box mt-30 w-100">
                                  <h3 class="mb-0"><span class="counter">{{App\Models\Event::all()->count()}}</span></h3>
                                  <span class="d-block">Organize Events</span>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-lg-3">
                              <div class="fact-box mt-30 w-100">
                                  <h3 class="mb-0"><span class="counter">{{App\Models\SpeakerArtist::all()->count()}}</span></h3>
                                  <span class="d-block">Event Speakers</span>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-lg-3">
                              <div class="fact-box mt-30 w-100">
                                  <h3 class="mb-0"><span class="counter">{{App\Models\Blog::all()->count()}}</span></h3>
                                  <span class="d-block">Success Stories</span>
                              </div>
                          </div>
                      </div>
                  </div><!-- Facts Wrap -->
              </div>
          </div>
      </section>
@endsection
