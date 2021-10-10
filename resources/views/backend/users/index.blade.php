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
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="table-container">
      <div class="t-header">All Users</div>
      <div class="table-responsive">
        <table id="highlightRowColumn" class="table custom-table">
          <thead>
            <tr>
              <th>Profile</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allUsers as $key =>$value)
            <tr>
              @if($value->image=="")
              <td> <img src="{{ asset("assets/default-image/users.png") }}" width="50"/></td>
              @else
              <td> <img src="{{ asset("assets/images/users/{$value->id}.{$value->image}") }}" width="50"/></td>
              @endif
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->phone}}</td>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  <!-- Row end -->

</div>
<!-- Main container end -->
@endsection
