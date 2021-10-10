@extends('layouts.dashboard')
@section('content')

@if(Auth::user()->role==2)

<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Users</li>
  </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">

  <!-- Row start -->
  <div class="row  gutters">
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Add User</div>
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
          <form action="{{ route('backend.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Password</label>
                  <input type="text" name="password" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Role</label>
                  <select class="form-control" name="role">
                    <option>Select Role</option>
                    <option value="2">Admin</option>
                    <option value="1">Editor</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Permissions</label><br/>
                  <div class="form-check form-check-inline">
                    <input name="p_insert" value="1" class="form-check-input" type="checkbox" id="inlineCheckbox1">
                    <label  class="form-check-label" for="inlineCheckbox1">Insert</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input  name="p_update" value="1" class="form-check-input" type="checkbox" id="inlineCheckbox2">
                    <label class="form-check-label" for="inlineCheckbox2">Update</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="p_delete" value="1" class="form-check-input" type="checkbox" id="inlineCheckbox3">
                    <label class="form-check-label" for="inlineCheckbox3">Delete</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="p_approve" value="1" class="form-check-input" type="checkbox" id="inlineCheckbox3">
                    <label class="form-check-label" for="inlineCheckbox3">Approve</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Image</label>
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
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
      <div class="table-container">
        <div class="t-header">All Users</div>
        <div class="table-responsive">
          <table id="highlightRowColumn" class="table custom-table">
            <thead>
              <tr>
                <th>Profile</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allUsers as $key =>$value)
              <tr>
                @if($value->image=="")
                <td> <img src="{{ asset("assets/default-image/users.png") }}" width="50"/></td>
                @else
                <td> <img src="{{ asset("assets/images/users/{$value->id}.{$value->image}") }}" width="50"/></td>
                @endif
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                @if($value->role==1)
                <td> <span class="badge badge-info">Editor</span></td>
                @elseif($value->role==2)
                <td><span class="badge badge-success">Admin</span></td>
                @endif
                <td>
                  <a href="{{ route("backend.users.view", $value->id) }}"><span class="btn btn-success"><i class="icon-eye"></i></span></a>&nbsp&nbsp&nbsp
                  <a href="{{ route("backend.users.edit", $value->id) }}"><span class="btn btn-warning"><i class="icon-edit1"></i></span></a>&nbsp&nbsp&nbsp
                  <span class=""><a href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>

                    <form id="logout-form-{{ $value->id }}" action="{{ route('backend.users.destroy') }}" method="POST" style="display: none;">
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
    @else
    <script>window.location = "{{ route('backend.unauthorized') }}";</script>
    @endif

    @endsection
