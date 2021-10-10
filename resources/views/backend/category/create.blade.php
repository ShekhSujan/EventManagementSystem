@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Category</li>
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
          <div class="card-title">Add Category</div>
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
          <form action="{{ route('backend.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Category Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Category Title">
                </div>
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Category Image[380*110]</label>
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
          <div class="t-header">All Category</div>
          <div class="table-responsive">
            <table id="highlightRowColumn" class="table custom-table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allCategory as $key =>$value)
                <tr>
                  <td>{{$value->title}}</td>
                  <td> <img src="{{ asset("assets/images/category/{$value->id}.{$value->image}") }}" width="60"/></td>
                  @if($value->status==1)
                  <td> <span class="badge badge-success">Approved</span></td>
                  @else
                  <td><span class="badge badge-warning">Pending</span></td>
                  @endif
                  <td>
                           @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_update==1)
                    <a href="{{ route("backend.category.edit", $value->id) }}"><span class="btn btn-warning"><i class="icon-edit1"></i></span></a>&nbsp&nbsp&nbsp
                    @endif
                          @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_delete==1)
                    <span class=""><a href="#" onclick="event.preventDefault();
                      document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>
 @endif
                      <form id="logout-form-{{ $value->id }}" action="{{ route('backend.category.destroy') }}" method="POST" style="display: none;">
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
