@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Speaker/Artist</li>
  </ol>


</div>
<!-- Main container start -->
  <div class="main-container">

    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  @if($selected->image=="")
                  <img src="{{ asset("assets/default-image/users.png") }}" alt="" />
                  @else
                  <img src="{{ asset("assets/images/speaker-artist/{$selected->id}.{$selected->image}") }}" alt="Le Rouge Admin" />
                  @endif
                </div><hr/>
                <div>
                <h5 >Name:<span class="badge">{{ $selected->name }}</span></h5><hr/>
                <h5 >Email:<span class="badge"> {{ $selected->email }}</span></h5><hr/>
                <h5 >Phone:<span class="badge">{{ $selected->phone }}</span></h5><hr/>
                <h5 >Phone:<span class="badge">{{ $selected->designation }}</span></h5><hr/>
                <h5 >Facebook:<span class="badge">{{ $selected->fb }}</span></h5><hr/>
                <h5 >Twitter:<span class="badge">{{ $selected->twitter }}</span></h5><hr/>
                <h5 >Instagram:<span class="badge">{{ $selected->instagram }}</span></h5>

              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
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
  <!-- Main container end -->
@endsection
