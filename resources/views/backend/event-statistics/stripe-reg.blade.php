@extends('layouts.dashboard')
@section('content')
@if(Auth::user()->role==2)
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Registration Info</li>
  </ol>
</div>
<div class="main-container">
  <!-- Row start -->
  <div class="row gutters" >
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
      <div class="custom-actions-btns mb-5">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#customModalTwo">
          <i class="icon-export"></i> Confirm Registration
        </button><br/>
      </div>
      @if (session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('msg') }}
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
    </div>
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
      <!-- Row start -->
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="blog">
            <style>
            .aar_table th{
              border-bottom:0;
              width: 30%;
              border-right: 1px solid #d3d9e0;
            }
            </style>
            @foreach($allStripe as $value)
            <img class="blog-img" src="{{ asset("assets/images/event/banner/{$value->event_id}-{$value->event_slug}.{$value->event_image}")}}" style="width:400px;height:200px;margin-left:15px;float: left;  padding-right: 20px;" alt="Card image cap">
            <br/>
            <br/>
            <div class="blog-body">
              <h2 class="blog-title">{{$value->event_title}}</h2>
              <table class="table aar_table border pt-2">
                <tr>
                  <th><h6>Event Date</h6></th>
                  <td>{{ $value->event_date }}</td>
                </tr>
                <tr>
                  <th><h6>Event Time</h6></th>
                  <td>{{ $value->event_time }}</td>
                </tr>
                <tr>
                  <th><h6>Event Venue</h6></th>
                  <td>{{ $value->event_venue }}</td>
                </tr>
                <tr>
                  <th><h6>Ticket</h6></th>
                  <td>{{$value->qty}}</td>
                </tr>
                <tr>
                  <th><h6>Ticket Price</h6></th>
                  <td>${{$value->amount}}</td>
                </tr>
                <tr>
                  <th><h6>Total Amount</h6></th>
                  <td>${{$value->total}}</td>
                </tr>
                <tr>
                  <th><h6>Payment Method</h6></th>
                  <td>Paypal</td>
                </tr>
              </table>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- Row end -->
    </div>
    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
      <!-- Row start -->
      <div class="row gutters">
        @foreach($allStripe as $key => $value)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="blog text-center">
            <img class="blog-img" src="{{asset("assets/images/users/{$value->user_id}.{$value->user_image}")}}" style=" width:50%; " alt="Card image cap">
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
                  <th><h6>Name</h6></th>
                  <td>{{ $value->name }}</td>
                </tr>
                <tr>
                  <th><h6>Email</h6></th>
                  <td>{{$value->email}}</td>
                </tr>
                <tr>
                  <th><h6>Phone</h6></th>
                  <td>{{$value->phone}}</td>
                </tr>
                <tr>
                  <th><h6>Address</h6></th>
                  <td>{{$value->address}}</td>
                </tr>
                <tr>
                  <th><h6>Register</h6></th>
                  <td>{{$value->created_at}}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Row end -->
    </div>
  </div>
  <!-- Row end -->
</div>
<!--########################## Modal ####################################-->
<div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customModalTwoLabel">Confirm With Mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('backend.email')}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            @foreach($allStripe as $value)
              <input type="hidden"  name="id" class="form-control" value="{{$value->id}}">
            <input type="hidden"  name="req" class="form-control" value="{{URL::current()}}">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input  name="name" class="form-control" value="{{$value->name}}" readonly>
            <label for="recipient-name" class="col-form-label">Recipient Mail:</label>
            <input  name="email" class="form-control" value="{{$value->email}}" readonly>
            <input type="hidden" name="id" value="{{$value->id}}">
            <input type="hidden" name="title" value="{{$value->event_title}}">
            <input type="hidden" name="date" value="{{$value->event_date}}">
                    @endforeach
          </div>
        </div>
        <div class="modal-footer custom">
          <div class="left-side">
            <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="submit" class="btn btn-link success">Send Mail</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--########################## Modal ####################################-->
@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
@endsection
