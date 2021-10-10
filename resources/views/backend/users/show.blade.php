@extends('layouts.dashboard')
@section('content')
@if(Auth::user()->role==2 || Auth::user()->id==$selected->id)
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Account View</li>
  </ol>
</div>
<!-- Main container start -->
  <div class="main-container">

    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  @if($selected->image=="")
                  <img src="{{ asset("assets/default-image/users.png") }}" alt="Le Rouge Admin" />
                  @else
                  <img src="{{ asset("assets/images/users/{$selected->id}.{$selected->image}") }}" alt="Le Rouge Admin" />
                  @endif
                </div>
                <ul class="list-group">
                 @if($selected->role==1)
                 <li class="list-group-item"><span class="badge badge-info">Editor</span></li>
                 @elseif($selected->role==2)
                 <li class="list-group-item"><span class="badge badge-success">Admin</span></li>
                 @endif
                 <li class="list-group-item">{{ $selected->name }}</li>
                 <li class="list-group-item">{{ $selected->email }}</li>
                 <li class="list-group-item">{{ $selected->phone }}</li>
                 <li class="list-group-item">{{ $selected->address }}</li>
               </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-header">
            <div class="card-title">About Profile</div>
          </div>
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  {!!$selected->details!!}
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
