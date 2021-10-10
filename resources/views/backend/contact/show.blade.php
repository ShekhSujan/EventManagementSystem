@extends('layouts.dashboard')
@section('content')
@if(Auth::user()->role==2 || Auth::user()->id==$selected->id)
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Contact View</li>
  </ol>
</div>
<!-- Main container start -->
  <div class="main-container">
    <a href="{{ route('backend.contact.index') }}" class="btn btn-success">All Contact</a><br/><br/>
    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="account-settings">
              <div >
                <h5 class="user-name">Name:{{ $selected->name }}</h5><hr/>
                <h6 class="user-email">Email:{{ $selected->email }}</h6><hr/>
                <h6 class="user-email">Phone:{{ $selected->phone }}</h6><hr/>
                <h6 class="user-email">Subject:{{ $selected->Subject }}</h6>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-header">
            <div class="card-title">Message</div>
          </div>
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  {{$selected->message}}
                </div>
                <div class="form-group">
                <textarea class="form-control" placeholder="Reply..."></textarea>
                </div>
                <div class="form-group">
              <input type="button" class="btn btn-success" value="Reply"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Row end -->

  </div>
  @else
  <script>window.location = "{{ route('backend.unauthorized') }}";</script>
  @endif
  <!-- Main container end -->
@endsection
