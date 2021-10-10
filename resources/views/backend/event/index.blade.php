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
  <div class="row  gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="table-container">
        <div class="t-header">All Events</div>
         @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by)
        <a href="{{ route('backend.event.create') }}" class="btn btn-info">Add</a>
         @endif
        <a href="{{ route('backend.event.index') }}" class="btn btn-success">All Event</a><br/>
        <div class="table-responsive">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @if (session('msg'))
          {{ session('msg') }}
          @endif
          <table id="highlightRowColumn" class="table custom-table">
            <thead>
              <th>Image</th>
              <th>Title</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allEvent as $key =>$value)
            <tr>
              <td> <img src="{{ asset("assets/images/event/thumnails/{$value->id}-{$value->slug}.{$value->image}") }}" width="60"/></td>
              <td>{{$value->title}}</td>
              <td>{{$value->date}}</td>

              @if($value->status==1)
              <td> <span class="badge badge-success">Approved</span></td>
              @else
              <td><span class="badge badge-warning">Pending</span></td>
              @endif
              <td>

                <a href="{{ route("backend.event.view", $value->id) }}"><span class="btn btn-success"><i class="icon-eye"></i></span></a>&nbsp&nbsp&nbsp
                   @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_update==1)
                <a href="{{ route("backend.event.edit", $value->id) }}"><span class="btn btn-warning"><i class="icon-edit1"></i></span></a>&nbsp&nbsp&nbsp
                 @endif
                    @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_delete==1)
                <span class=""><a href="#" onclick="event.preventDefault();
                  document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>
                    @endif
                  <form id="logout-form-{{ $value->id }}" action="{{ route('backend.event.destroy') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="ext" value="{{ $value->image }}">
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
