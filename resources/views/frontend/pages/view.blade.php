@extends('layouts.app')
@section('content')
<div class="archives layout3 post post1 ">
  <div class="container-fluid">
    <div class="row pl-5 br-design">
      <div class="col-12">
        @foreach($allSingleNews as $key=>$value)
        <div class="bridcrumb"> <a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i></a> /<a href="#">{{$value->category_title}}</a></div>
        @endforeach
      </div>
    </div>
    </div>
    <div class="container ">
    <div class="row">
      @include('frontend.components.viewpage-components.leftbar')
      @include('frontend.components.viewpage-components.rightbar')
    </div>
  </div>
</div>

<div class="space-100"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="xQpYAZ8l"></script>
@endsection
