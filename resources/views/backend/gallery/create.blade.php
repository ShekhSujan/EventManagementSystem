@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Gallery</li>
  </ol>


</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">

  <!-- Row start -->
  <div class="row  gutters">
    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Add Gallery</div>
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
          <form action="{{ route('backend.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Category</label>
                  <select name="category_id" class="form-control">
                    <option>Select Category</option>
                    @foreach($allCategory as $key => $value)
                    <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Gallery Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" >
                  <img src="" id="imgload" width="80"/>
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
    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
      <div class="table-container">
        <div class="t-header">All Images</div>
        <div class="table-responsive">
          <table id="highlightRowColumn" class="table custom-table">
            <thead>
              <th>Image</th>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allGallery as $key =>$value)
            <tr>
              <td> <img src="{{ asset("assets/images/gallery/{$value->id}.{$value->image}") }}" width="60"/></td>
              <td>{{$value->category_title}}</td>

              @if($value->status==1)
              <td> <span class="badge badge-success">Approved</span></td>
              @else
              <td><span class="badge badge-warning">Pending</span></td>
              @endif
              <td>
                <a href="{{ route("backend.gallery.edit", $value->id) }}"><span class="btn btn-warning"><i class="icon-edit1"></i></span></a>&nbsp&nbsp&nbsp
                <span class=""><a href="#" onclick="event.preventDefault();
                  document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>

                  <form id="logout-form-{{ $value->id }}" action="{{ route('backend.gallery.destroy') }}" method="POST" style="display: none;">
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
