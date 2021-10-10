@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Subscribers</li>
  </ol>

</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">

  <!-- Row start -->
  <div class="row  gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="table-container">
        <div class="t-header">All Subscribers</div>
        <div class="table-responsive">
          <table id="highlightRowColumn" class="table custom-table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Profile</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allSubscriber as $key =>$value)
              <tr>
                <td>{{$key+1}}</td>
                @if($value->image=="")
                <td> <img src="{{ asset("assets/default-image/users.png") }}" width="50"/></td>
                @else
                <td> <img src="{{ asset("assets/images/users/{$value->id}.{$value->image}") }}" width="50"/></td>
                @endif
                <td>{{$value->email}}</td>
                <td>
                  <span class=""><a href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>

                    <form id="logout-form-{{ $value->id }}" action="{{ route('backend.subscriber.destroy') }}" method="POST" style="display: none;">
                      @csrf
                      <input type="hidden" name="id" value="{{ $value->id }}">
                    </form>
                  </td>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Row end -->

    </div>
    <!-- Main container end -->
    @endsection
