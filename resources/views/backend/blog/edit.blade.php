@extends('layouts.dashboard')
@section('content')
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
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Update Blog</div>
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
          <form  action="{{ route('backend.blog.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <input type="hidden" name="ext" value="{{ $selected->image }}">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Category Title" value="{{$selected->title}}">
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Slug</label>
                  <input type="text" name="slug" class="form-control" placeholder="Enter  Slug" value="{{$selected->slug}}">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Category</label>
                  <select name="category_id" class="form-control">
                    <?php foreach ($allBlogCategory as $key => $value): ?>
                      @if ($selected->category_id == $value->id)
                      <option selected value="{{ $value->id }}">{{ $value->title }}</option>
                      @else
                      <option value="{{ $value->id }}">{{ $value->title }}</option>
                      @endif
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">News Tags</label>
                  <div class="form-group">
                    <input name="tag" id="typeahead" type="text" value="{{$selected->tag}}" class="form-control" placeholder="Enter News Tags">
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Category Image</label>
                  <input class="form-control"  id="imgInp" name="pic" type="file" >
                  <img src="{{ asset("assets/images/blog/thumnails/{$selected->id}-{$selected->slug}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
                </div>
              </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
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
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Blog Details</label>
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
  @endsection
