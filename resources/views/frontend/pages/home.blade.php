@extends('layouts.app')
@section('content')
@include('frontend.components.homepage-components.slider')

<section>
  <div class="w-100 pt-120 pb-120 gray-layer opc9 position-relative">
    <div class="fixed-bg patern-bg" style="background-image: url({{asset("assets/frontend/images/patter-bg1.jpg")}});"></div>
    <div class="container">
      @include('frontend.components.homepage-components.about')
      @include('frontend.components.homepage-components.category')

    </div>
  </div>
</section>
@include('frontend.components.homepage-components.schedule')
@include('frontend.components.homepage-components.events')
@include('frontend.components.homepage-components.blog')
@include('frontend.components.homepage-components.sponsor')
@include('frontend.components.homepage-components.news-letter')

@endsection
