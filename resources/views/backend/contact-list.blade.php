@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Contact List</li>
  </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
  <div class="row gutters">
    @foreach($allContactList as $value)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
      <figure class="user-card">
        <figcaption>
          @if($value->image=="")
          <img src="{{ asset("assets/default-image/users.png") }}" width="50"/>
          @else
          <img src="{{asset("assets/images/users/{$value->id}.{$value->image}")}}" alt="" width="50">
          @endif
          <h5>{{$value->name}}</h5>
          <ul class="list-group">
            <li class="list-group-item">
               @if($value->role==1)
              <span class="badge badge-info">Editor</span>
              @elseif($value->role==2)
              <span class="badge badge-success">Admin</span>
              @endif</li>
              <li class="list-group-item">{{$value->email}}</li>
              <li class="list-group-item">{{$value->phone}}</li>
            </ul>
          </figcaption>
        </figure>
      </div>
      @endforeach
    </div>
    <!-- Row end -->

  </div>
  <!-- Main container end -->
  @endsection
