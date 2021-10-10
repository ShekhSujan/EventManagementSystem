@extends('layouts.app')
@section('content')
<section>
          <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
              <div class="container">
                  <div class="page-title-inner d-inline-block">
                      <h1 class="mb-0">404 Error</h1>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index-2.html" title="">Home</a></li>
                          <li class="breadcrumb-item active">404 Error</li>
                      </ol>
                  </div>
              </div>
          </div><!-- Page Title Wrap -->
      </section>
      <section>
          <div class="w-100 pt-160 pb-150 position-relative">
              <div class="container">
                  <div class="error-wrap text-center w-100">
                      <div class="error-inner d-inline-block">
                          <h1 class="mb-0">4<span class="thm-clr">0</span>4</h1>
                          <h3 class="mb-0"><span>Ooops,</span>Page Not Found</h3>
                          <p class="mb-0">Sorry, the page you were looking for does not <br> exist or is not available.</p>
                          <a class="thm-btn wid-btn lft-icon fill-btn" href="{{route('home')}}" title=""><i class="fas fa-home"></i> Back To Home<span></span></a>
                      </div>
                  </div><!-- Error Wrap -->
              </div>
          </div>
      </section>
@endsection
