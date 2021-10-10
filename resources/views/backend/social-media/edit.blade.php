@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Social Media</li>
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
          <div class="card-title">Update Social Media</div>
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
          <form  action="{{ route('backend.social-media.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <div class="row gutters">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Facebook Page</label>
                  <input type="text" name="page" class="form-control" value="{{ $selected->page }}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Facebook</label>
                  <input type="text" name="facebook" class="form-control" value="{{ $selected->facebook }}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Twitter</label>
                  <input type="text" name="twitter" class="form-control" value="{{ $selected->twitter }}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Instagram</label>
                  <input type="text" name="instagram" class="form-control" value="{{ $selected->instagram }}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Youtube</label>
                  <input type="text" name="youtube" class="form-control" value="{{ $selected->youtube }}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit Form</button>
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
