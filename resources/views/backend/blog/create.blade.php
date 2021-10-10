@extends('layouts.dashboard')
@section('content')

@if(Auth::user()->role==2 || Auth::user()->id==$selected->inserted_by)
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Blog</li>
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
          <div class="card-title">Add Blog</div>
        </div>
        <div class="card-body">
          <a href="{{ route('backend.blog.create') }}" class="btn btn-info">Add</a>
          <a href="{{ route('backend.blog.index') }}" class="btn btn-success">All Blog</a>
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
          <form action="{{ route('backend.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter  Title">
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Slug</label>
                  <input type="text" name="slug" class="form-control" placeholder="Enter  Slug">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Category</label>
                  <select name="category_id" class="form-control">
                    <option>Select Category</option>
                    @foreach($allBlogCategory as $key => $value)
                    <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Tags</label>
                  <div class="form-group">
                    <input name="tag" id="typeahead" type="text" class="form-control" placeholder="Enter News Tags" value="">
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" >
                  <img src="" id="imgload" width="80"/>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Details</label>
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
