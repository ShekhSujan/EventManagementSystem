@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Event</li>
  </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
      <!-- Row start -->
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="blog">
            <img class="blog-img" src="{{asset("assets/images/event/banner/{$selected->id}-{$selected->slug}.{$selected->image}")}}" alt="Card image cap">
            <div class="blog-body">
              <h2 class="blog-title">{{$selected->title}}</h2>
              <h6 class="blog-date">
                <span class="category">Created At</span>
                <span class="divider">/</span>
                <span class="date">{{ date('d ,M Y', strtotime($selected->date)) }}</span>
              </h6>
              <div class="blog-description">
                <p>{!!$selected->details!!}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Row end -->
    </div>
    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
      <!-- Row start -->
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="blog">
            @foreach($allHost as $key => $value)
            @if ($selected->host == $value->id)
            <img class="blog-img" src="{{asset("assets/images/speaker-artist/{$selected->host}.{$value->image}")}}" alt="Card image cap">
            <div class="blog-body">
              <p>{{$value->name}}</p>
            </div>
            @endif
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                <th><h6>Category</h6></th>
                <?php foreach ($allCategory as $key => $value): ?>
                               @if ($selected->category_id == $value->id)
                <td>{{ $value->title }}</td>
                @endif
              <?php endforeach; ?>
              </tr>
              <tr>
                <th><h6>Venue</h6></th>
                <td>{{$selected->venue}}</td>
              </tr>
              <tr>
                <th><h6>Date</h6></th>
                <td>{{$selected->date}}</td>
              </tr>
              <tr>
                <th><h6>Time</h6></th>
                <td>{{$selected->time}}</td>
              </tr>
              <tr>
                <th><h6>Fee</h6></th>
                <td>${{$selected->price}}</td>
              </tr>
              <tr>
                <th><h6>Parking</h6></th>
                      @if ($selected->parking == 1)
                <td>Yes</td>
                @else
                <td> Not Available</td>
                @endif
              </tr>
              <tr>
                <th><h6>Deadline</h6></th>
                <td>{{$selected->deadline_reg}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- Row end -->

  </div>
</div>
<!-- Row end -->

</div>
<!-- Main container end -->
@endsection
