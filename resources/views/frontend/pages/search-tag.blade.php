@extends('layouts.app')
@section('content')
<div class="archives layout3 post post1">
  <div class="container-fluid">

    <div class="space-20"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-12">

          <div class="business3 padding20 white_bg border-radious5">
            @foreach($allNews as $key=>$value)
            <div class="single_post post_type12 type20">
              <div class="post_img border-radious5">
                <div class="img_wrap">
                  <a href="{{ url('news/view/'.$value->id.'/'.$value->title) }}">
                    <img src="{{asset("assets/images/news/{$value->id}.{$value->image}")}}" alt="">
                  </a>
                </div>
              </div>
              <div class="single_post_text">
                <h4><a href="{{ url('news/view/'.$value->id.'/'.$value->title) }}">{{$value->title}}</a></h4>
                <div class="row">
                  <div class="col-6 align-self-center">
                    <div class="meta_col">
                      <p>{{ date('d M Y', strtotime($value->created_at)) }}</p>
                    </div>
                  </div>

                </div>
                <p class="post-p">{!! substr(($value->details),0,900)!!}…</p>
                <div class="space-10"></div> <a href="{{ url('news/view/'.$value->id.'/'.$value->title) }}" class="readmore3">Read more <img src="{{asset("assets/frontend/img//icon/arrow3.png")}}" alt=""></a>
                <div class="space-10"></div>
                <div class="border_black"></div>
                <div class="space-15"></div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-12">
              <div class="padding5050">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
