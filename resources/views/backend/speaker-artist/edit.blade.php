@extends('layouts.dashboard')
@section('content')
@if(Auth::user()->role==2 || Auth::user()->id==$selected->inserted_by || Auth::user()->p_update==1)
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
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Update Speaker/Artist</div>
        </div>
        <div class="card-body">
          <a href="{{ route('backend.speaker-artist.create') }}" class="btn btn-info">Add</a>
          <a href="{{ route('backend.speaker-artist.index') }}" class="btn btn-success">All </a><br/>
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
          <form  action="{{ route('backend.speaker-artist.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <input type="hidden" name="ext" value="{{ $selected->image }}">
            <div class="row gutters">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label"> Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$selected->name}}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label"> Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $selected->email }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label"> Phone</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ $selected->phone }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label"> Designation</label>
                  <input type="text" name="designation" class="form-control" placeholder="Enter Designation" value="{{ $selected->designation }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label"> FB Link</label>
                  <input type="text" name="fb" class="form-control" placeholder="Enter FB Link" value="{{ $selected->fb }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Twitter</label>
                  <input type="text" name="twitter" class="form-control" placeholder="Enter Twitter" value="{{ $selected->twitter }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Instagram</label>
                  <input type="text" name="instagram" class="form-control" placeholder="Enter Instagram" value="{{ $selected->instagram }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Status</label>
                  <select name="status" class="form-control">
                    @if ($selected->status == 1)
                    <option selected value="1"> Approved</option>
                    <option value="0"> Pending</option>
                    @else
                    <option  value="1"> Approved</option>
                    <option selected value="0"> Pending</option>
                    @endif
                  </select>
                </div>
              </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" >
                  <img src="{{ asset("assets/images/speaker-artist/{$selected->id}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Details</label>
                  <textarea name="details" class="form-control summernote">{{ $selected->details }}</textarea>
                </div>
                <div class="form-group">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary float-right">Submit Form</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- Row end -->

      </div>
    </div>
  </div>

  <!-- Main container end -->
  @else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
  @endsection
