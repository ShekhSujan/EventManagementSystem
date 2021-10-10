@extends('layouts.dashboard')
@if(Auth::user()->role==2 || Auth::user()->id==$selected->inserted_by || Auth::user()->p_update==1)
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Event Update</li>
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
          <div class="card-title">Update Event</div>
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
          <form  action="{{ route('backend.event.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <input type="hidden" name="ext" value="{{ $selected->image }}">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter  Title" value="{{$selected->title}}">
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Slug</label>
                  <input type="text" name="slug" class="form-control" placeholder="Enter Slug" value="{{$selected->slug}}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Category</label>
                  <select name="category_id" class="form-control">
                    <?php foreach ($allCategory as $key => $value): ?>
                      @if ($selected->category_id == $value->id)
                      <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                      @else
                      <option value="{{ $value->id }}">{{ $value->title }}</option>
                      @endif
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Host</label>
                  <select name="host" class="form-control">
                    @foreach($allHost as $key => $value)
                    @if ($selected->host == $value->id)
                    <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                    @else
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Venue</label>
                  <input type="text" name="venue" class="form-control" placeholder="Event Venue" value="{{$selected->venue}}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Date</label>
                  <input type="date" name="date" class="form-control" placeholder="Event Date" value="{{$selected->date}}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Time</label>
                  <input type="text" name="time" class="form-control" placeholder="Event Time" value="{{$selected->time}}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Fee</label>
                  <input type="number" name="price" class="form-control" placeholder="Event Fee" value="{{$selected->price}}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Parking</label>
                  <select name="parking" class="form-control">
                    @if ($selected->parking == 1)
                    <option selected value="1"> Yes</option>
                    <option value="0"> No</option>
                    @else
                    <option  value="1"> Yes</option>
                    <option selected value="0"> No</option>
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Reg Deadline</label>
                  <input type="date" name="deadline_reg" class="form-control" placeholder="Reg Deadline" value="{{$selected->deadline_reg}}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Status</label>
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
                  <label for="inputSubject" class="col-form-label">Event Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" >
                  <img src="{{ asset("assets/images/event/banner/{$selected->id}-{$selected->slug}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Map</label>
                  <textarea name="map" class="form-control">{{ $selected->map }}</textarea>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Event Details</label>
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
</div>
<!-- Row end -->

</div>
<!-- Main container end -->
@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
@endsection
