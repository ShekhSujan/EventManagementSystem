
@extends('layouts.app')
@section('content')
<section>
          <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
      <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
              <div class="container">
                  <div class="page-title-inner d-inline-block">
                      <h1 class="mb-0">Terms & Privacy Policy</h1>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
                          <li class="breadcrumb-item active">Terms & Privacy Policy</li>
                      </ol>
                  </div>
              </div>
          </div><!-- Page Title Wrap -->
      </section>
      <section>
          <div class="w-100 pt-140 pb-120 position-relative">
              <div class="container">
                  <div class="about-wrap2 w-100">
                  @foreach($allPolicy as $value)
                      <div class="row align-items-center">
                      
                          <div class="col-md-12 col-sm-12 col-lg-12">
                              <div class="about-desc3 w-100">
                                  <div class="sec-title mb-25 w-100">
                                      <div class="sec-title-inner pt-0 d-inline-block">
                                          <span class="d-block thm-clr">Terms & Privacy Policy</span>
                                   
                                      </div>
                                  </div><!-- Sec Title -->
                                    <p class="mb-0"> {!!$value->details!!}</p>
                              </div>
                          </div>
                      </div>
                          @endforeach
                  </div><!-- About Wrap -->
     
              </div>
          </div>
      </section>
@endsection
