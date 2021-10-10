@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Blog View</li>
  </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <a href="{{ route('backend.blog.create') }}" class="btn btn-info">Add</a>
      <a href="{{ route('backend.blog.index') }}" class="btn btn-success">All Blog</a></br></br>
      <!-- Row start -->
      <div class="row gutters">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
          <div class="blog">
            <img class="blog-img" src="{{ asset("assets/images/blog/banner/{$selected->id}-{$selected->slug}.{$selected->image}") }}" alt="Card image cap">
            <div class="blog-body">
              <div class="blog-description">
                {!!$selected->details!!}
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-body">
              <style media="screen">
              .ar_table th{
                border-bottom:0;
                width: 15%;
                border-right: 1px solid #d3d9e0;
              }
              </style>
              <table class="table ar_table border">
                <tr>
                  <th><h6>Title</h6></th>
                  <td>{{$selected->title}}</td>
                </tr>
                <tr>
                  <th><h6>Created_at</h6></th>
                  <td>{{ date('d ,M Y', strtotime($selected->created_at)) }}</td>
                </tr>
                <tr>
                  <th><h6>Category</h6></th>
                  @foreach($allBlogCategory as $key=>$value)
                  @if ($selected->category_id == $value->id)
                  <td>{{ $value->title }}</td>
                  @endif
                  @endforeach
                </tr>
                <tr>
                  <th><h6>Tag</h6></th>
                  <td>
                  @foreach($allTags as $key =>$value)
                  <span class="badge badge-success">{{$value}}</span>
                  @endforeach</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- Main container end -->
  </div>
  <!-- Main container end -->
  @endsection
