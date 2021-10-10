@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Our Sponsor</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item active">Sponsor</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-50 pb-50 position-relative">
    <div class="container">
      <div class="sponsors-wrap w-100">
        <div class="sponsor-caro">
          @foreach($allSponsor as $value)
          <div class="sr-box text-center w-100">
            <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block" src="{{asset("assets/images/sponsor/{$value->id}.{$value->image}")}}" alt="Sponsor Image 1"></a>
          </div>
          @endforeach
        </div>
      </div><!-- Sponsors Wrap -->
    </div>
  </div>
</section>
@endsection
