@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Speaker/Artist</li>
  </ol>


</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">

  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="table-container"id="statusa">
          <div class="card-title">All Speaker/Artist</div>
        <div class="table-responsive">
              @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by)
          <a href="{{ route('backend.speaker-artist.create') }}" class="btn btn-info">Add</a>
          @endif
          <a href="{{ route('backend.speaker-artist.index') }}" class="btn btn-success">All </a><br/>
          <table id="highlightRowColumn" class="table custom-table">
            <thead>
              <tr>

                <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allSpeakerArtist as $key =>$value)
              <tr>

                <td> <img src="{{ asset("assets/images/speaker-artist/{$value->id}.{$value->image}") }}" width="60"/></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                  @if($value->status==1)
                  <td><span class="badge badge-success">Published</span></td>
                  @else
                  <td><span class="badge badge-warning">Pending</span></td>
                  @endif
                  <td>
                         @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_update==1)
                    <a href="{{ route("backend.speaker-artist.view", $value->id) }}"><span class="btn btn-success"><i class="icon-eye"></i></span></a>&nbsp&nbsp&nbsp
                      @endif
                       @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_delete==1)
                    <a href="{{ route("backend.speaker-artist.edit", $value->id) }}"><span class="btn btn-warning"><i class="icon-edit1"></i></span></a>&nbsp&nbsp&nbsp
                    <span class=""><a href="#" onclick="event.preventDefault();
                      document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>
                    @endif
                      <form id="logout-form-{{ $value->id }}" action="{{ route('backend.speaker-artist.destroy') }}" method="POST" style="display: none;">
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
      </div>
      <!-- Main container end -->
      @endsection
