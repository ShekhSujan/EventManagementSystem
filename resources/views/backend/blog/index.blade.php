@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">All Blog</li>
  </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="table-container"id="statusa">
        <div class="t-header">All Blog</div>
        <div class="table-responsive">
              @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by)
          <a href="{{ route('backend.blog.create') }}" class="btn btn-info">Add</a>
          @endif
          <a href="{{ route('backend.blog.index') }}" class="btn btn-success">All</a>
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
              @foreach($allBlog as $key =>$value)
              <tr>
                <td>{{$value->title}}</td>
                <td> <img src="{{ asset("assets/images/blog/thumnails/{$value->id}-{$value->slug}.{$value->image}") }}" width="60"/></td>
                  @if($value->status==1)
                  <td><span class="badge badge-success">Published</span></td>
                  @else
                  <td><span class="badge badge-warning">Pending</span></td>
                  @endif
                  <td>

                    <a href="{{ route("backend.blog.view", $value->id) }}"><span class="btn btn-success"><i class="icon-eye"></i></span></a>&nbsp&nbsp&nbsp
                       @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_update==1)
                    <a href="{{ route("backend.blog.edit", $value->id) }}"><span class="btn btn-warning"><i class="icon-edit1"></i></span></a>&nbsp&nbsp&nbsp
                       @endif
                    @if(Auth::user()->role==2 || Auth::user()->id==$value->inserted_by || Auth::user()->p_delete==1)
                    <span class=""><a href="#" onclick="event.preventDefault();
                      document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>
                        @endif
                      <form id="logout-form-{{ $value->id }}" action="{{ route('backend.blog.destroy') }}" method="POST" style="display: none;">
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
      </div>
      <!-- Main container end -->
      @endsection
