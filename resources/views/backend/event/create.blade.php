@extends('layouts.dashboard')
@section('content')
@if(Auth::user()->role==2 || Auth::user()->id==$selected->inserted_by)
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
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Add Event</div>
        </div>
        <div class="card-body">
          @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by)
          <a href="{{ route('backend.event.create') }}" class="btn btn-info">Add</a>
          @endif
          <a href="{{ route('backend.event.index') }}" class="btn btn-success">All Event</a><br/>
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
          <form action="{{ route('backend.event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Slug</label>
                  <input type="text" name="slug" class="form-control" placeholder="Enter Slug">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Category</label>
                  <select name="category_id" class="form-control">
                    <option>Select Category</option>
                    @foreach($allCategory as $key => $value)
                    <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Host</label>
                  <select name="host" class="form-control">
                    @foreach($allHost as $key => $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Venue</label>
                  <input type="text" name="venue" class="form-control" placeholder="Event Venue">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Date</label>
                  <input type="date" name="date" class="form-control" placeholder="Event Date">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Time</label>
                  <input type="text" name="time" class="form-control" placeholder="Event Time">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Fee</label>
                  <input type="number" name="price" class="form-control" placeholder="Event Fee">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Parking</label>
                  <select name="parking" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Reg Deadline</label>
                  <input type="date" name="deadline_reg" class="form-control" placeholder="Reg Deadline">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" >
                  <img src="" id="imgload" width="80"/>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Map</label>
                  <textarea name="map" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">News Details</label>
                  <textarea name="details" class="form-control summernote"></textarea>
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
</div>
<!-- Row end -->

</div>
<!-- Main container end -->
@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
@endsection
