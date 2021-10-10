@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Setting</li>
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
          <div class="card-title">Update Setting</div>
        </div>
        <div class="card-body">
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
          <form  action="{{ route('backend.setting.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <input type="hidden" name="ext" value="{{ $selected->logo }}">
            <input type="hidden" name="ext2" value="{{ $selected->flogo }}">
            <div class="row gutters">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Email</label>
                  <input type="text" name="email" placeholder="Enter Site Email"  class="form-control" value="{{ $selected->email }}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Phone</label>
                  <input type="text" name="phone" placeholder="Enter Site Phone"  class="form-control" value="{{ $selected->phone }}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Address</label>
                  <input type="text" name="address" placeholder="Enter Site Address"  class="form-control" value="{{ $selected->address }}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Schedule</label>
                  <input type="text" name="schedule" placeholder="Enter Site Schedule"  class="form-control" value="{{ $selected->schedule }}">
                </div>
              </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Slogan</label>
                  <input type="text" name="slogan" placeholder="Enter Site Slogan"  class="form-control" value="{{ $selected->slogan }}">
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Editor</label>
                  <textarea  name="editor" class="form-control summernote" value="">{{ $selected->editor }}</textarea>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Short Description</label>
                  <textarea  name="details" class="form-control summernote" value="">{{ $selected->details }}</textarea>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Site Map</label>
                  <textarea  name="map" class="form-control summernote" value="">{{ $selected->map }}</textarea>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Logo</label>
                  <input class="form-control" id="imgInp" name="pic" type="file"><br>
                  <img src="{{ asset("assets/images/logo/{$selected->id}.{$selected->logo}") }}" alt="No Image" id="imgload"  width="80"/>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Favicon</label>
                  <input class="form-control form-control-alt" id="imgInp2" name="pic2" type="file"><br>
                  <img src="{{ asset("assets/images/flogo/{$selected->id}.{$selected->flogo}") }}" alt="No Image" id="imgload2" width="80"/>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" id="submit" name="submit" class="btn btn-primary float-right">Submit Form</button>
              </div>
            </div>
          </div>
        </form>
        <!-- Row end -->

      </div>
    </div>
  </div>
  <!-- Main container end -->
  @endsection
