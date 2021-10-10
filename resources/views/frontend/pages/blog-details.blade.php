@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}});"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Blog Details</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('blog')}}" title="">Blog</a></li>
          <li class="breadcrumb-item active">Blog Details</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-140 pb-120 position-relative">
    <div class="container">
      <div class="page-wrap w-100">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-8">
            <div class="blog-detail w-100">
              @foreach($allBlog as $value)
              <div class="blog-detail-info w-100">
                <img class="img-fluid w-100" src="{{asset("assets/images/blog/banner/{$value->id}-{$value->slug}.{$value->image}")}}" alt="Blog Detail Image">
                <!-- ShareThis BEGIN -->
                <div class="sharethis-inline-reaction-buttons"></div>
                <!-- ShareThis END -->
                <h2 class="mb-0">{{$value->title}}</h2>
                <div class="post-meta2">
                  <span class="post-date thm-clr">{{ date('d ,M Y', strtotime($value->created_at)) }}</span>
                </div>
              </div>
              <div class="blog-detail-desc w-100">
                <p class="mb-0">{!!$value->details!!}</p>

              </div>
              @endforeach
              <div class="blog-detail-social-tags mt-55 w-100 gray-bg">
                <div class="blog-detail-tags-wrap d-flex flex-wrap align-items-center w-100">
                  <span>Tags:</span>
                  <div class="tagclouds">
                    @foreach($allTags as $key =>$value)
                    <a href="javascript:void(0);" title="">{{$value}}</a>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="detail-reviews mt-60 detail-meta d-inline-block w-100">
                <h3>Review</h3>
                <div class="comment-threads w-100">
                  <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width=""></div>
                
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-4">
            <aside class="sidebar-wrap w-100">
              <div class="widget-box w-100">
                <h3>Recent Blog</h3>
                <div class="articles-list w-100">
                  @foreach($allBlogSide as $key=> $value)
                  <div class="article-box d-flex flex-wrap w-100">
                    <i>{{$key+1}}.</i>
                    <div class="article-info">
                      <span class="post-date thm-clr">{{ date('M Y', strtotime($value->created_at)) }}</span>
                      <h4 class="mb-0"><a href="{{ url('blog-details/'.$value->id.'/'.$value->slug) }}" title="">{{$value->title}}</a></h4>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="widget-box w-100">
                <h3>Category</h3>
                <ul class="cate-list mb-0 list-unstyled w-100">
                  @foreach($allBlogCategory as $key=> $value)
                  <li><a href="javascript:void(0);" title="">{{$value->category_title}}</a><span>{{$value->total}}</span></li>
                  @endforeach
                </ul>
              </div>
            </aside><!-- Sidebar Wrap -->
          </div>
        </div>
      </div><!-- Page Wrap -->
    </div>
  </div>
</section>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="ZUNNUmTP"></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f77fe1179ff5b00124874b0&product=sop' async='async'></script>
@endsection
