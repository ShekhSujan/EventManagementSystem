@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Email Setting</li>
  </ol>
</div>
<div class="main-container">
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Update Email Setting</div>
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
          <form  action="{{ route('backend.email-setting.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <input name="url" placeholder="Enter Site Url"  class="form-control" value="{{ $selected->url }}"/>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <textarea name="email" placeholder="Enter From Email"  class="form-control">{{ $selected->email }}</textarea>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <textarea name="cc" placeholder="Enter Email CC"  class="form-control">{{ $selected->cc }}</textarea>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <textarea name="bcc" placeholder="Enter Email BCC"  class="form-control">{{ $selected->bcc }}</textarea>
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
