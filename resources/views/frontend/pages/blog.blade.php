@extends('layouts.app')
@section('content')
    <section>
      <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
          <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
          <div class="container">
              <div class="page-title-inner d-inline-block">
                  <h1 class="mb-0">Our Blog</h1>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
                      <li class="breadcrumb-item active">Blog</li>
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
                                  <div class="blog-wrap w-100">
                                    @foreach($allBlog as $value)
                                      <div class="post-style1 big-img mb-65 w-100 position-relative">
                                          <div class="post-meta">
                                              <span class="post-date thm-clr">{{ date('d', strtotime($value->created_at)) }}<i class="d-block">{{ date('M Y', strtotime($value->created_at)) }}</i></span>
                                          </div>
                                          <div class="post-img overflow-hidden position-relative w-100">
                                              <a href="{{ url('blog-details/'.$value->id.'/'.$value->slug) }}" title=""><img class="img-fluid w-100" src="{{asset("assets/images/blog/thumnails/{$value->id}-{$value->slug}.{$value->image}")}}" alt="Post Image 1"></a>
                                          </div>
                                          <div class="post-info w-100">
                                              <h3 class="mb-0"><a href="{{ url('blog-details/'.$value->id.'/'.$value->slug) }}" title="">{{$value->title}}</a></h3>
                                              <!-- <p class="mb-0">{!! substr(($value->details), 0, 300) !!}</p> -->
                                          </div>
                                      </div>
                                      @endforeach
                                  </div><!-- Blog Wrap -->
                                  <div class="pagination-wrap d-inline-block w-100">
                                      <ul class="pagination justify-content-start align-items-center mb-0 list-unstyled">
                                        {{$allBlog->links()}}
                                      </ul>
                                  </div><!-- Pagination Wrap -->
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
                                                      <span class="post-date thm-clr">{{ date('d,M Y', strtotime($value->created_at)) }}</span>
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
        </section>

  @endsection
