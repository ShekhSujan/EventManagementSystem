@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Our Gallery</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item active">Gallery</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-140 pb-120 position-relative">
    <ul class="filter-links mb-0 list-unstyled d-flex flex-wrap justify-content-center w-100">
      <li class="active"><a data-filter="*" href="javascript:void(0);" title="">Show All</a></li>
      @foreach($allGalleryCategory as $value)
      <li><a data-filter=".{{strtolower(str_replace(' ','-',$value->category_title))}}" href="javascript:void(0);" title="">{{$value->category_title}}</a></li>
      @endforeach
    </ul>
    <div class="gallery-wrap w-100">
      <div class="row mrg masonry">
        @foreach($allGallery as $value)
        <div class="col-md-6 col-sm-6 col-lg-3 fltr-itm {{strtolower(str_replace(' ','-',$value->category_title))}}">
          <div class="gallery-item position-relative w-100">
            <img class="img-fluid w-100" src="{{asset("assets/images/gallery/{$value->id}.{$value->image}")}}" alt="Gallery Image 1">
            <a href="{{asset("assets/images/gallery/{$value->id}.{$value->image}")}}" data-fancybox="gallery" title=""><i class="flaticon-loupe"></i></a>
          </div>
        </div>
        @endforeach
      </div>
    </div><!-- Gallery Wrap -->
  </div>
</section>
@endsection
