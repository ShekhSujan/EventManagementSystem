@extends('layouts.dashboard')
@section('content')

@if(Auth::user()->role==2 || Auth::user()->id==$selected->id)
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
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Update User</div>
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
          <form  action="{{ route('backend.users.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $selected->id }}">
            <input type="hidden" name="ext" value="{{ $selected->image }}">
            <div class="row gutters">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $selected->name }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $selected->email }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ $selected->phone }}">
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Address</label>
                  <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $selected->address }}">
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Password</label>
                  <input type="text" name="password" class="form-control" placeholder="************">
                </div>
              </div>
              <!-- ############### -->
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form-group">
                  <label for="inputSubject" class="col-form-label">Role</label>
                  <select class="form-control" name="role">
                    @if ($selected->status == 1)
                    <option selected value="1"> Editor</option>
                    <option value="2"> Admin</option>
                    @else
                    <option  value="1"> Editor</option>
                    <option selected value="2"> Admin</option>
                    @endif
                  </select>
                </select>
              </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
              <div class="form-group">
                <label for="inputSubject" class="col-form-label">Permissions</label><br/>
                <div class="form-control border">
                  <div class="form-check form-check-inline">
                    <input name="p_insert" value="1" @if($selected->p_insert==1) ? checked="" @endif class="form-check-input" type="checkbox" id="inlineCheckbox1">
                    <label  class="form-check-label" for="inlineCheckbox1">Insert</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input  name="p_update" @if($selected->p_update==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" id="inlineCheckbox2">
                    <label class="form-check-label" for="inlineCheckbox2">Update</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="p_delete" @if($selected->p_delete==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" id="inlineCheckbox3">
                    <label class="form-check-label" for="inlineCheckbox3">Delete</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input name="p_approve" @if($selected->p_approve==1) ? checked="" @endif value="1" class="form-check-input" type="checkbox" id="inlineCheckbox3">
                    <label class="form-check-label" for="inlineCheckbox3">Approve</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- ############### -->

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
              <div class="form-group">
                <label for="inputSubject" class="col-form-label">Profile Image</label>
                <input class="form-control"  id="imgInp" name="pic" type="file" >
                <img src="{{ asset("assets/images/users/{$selected->id}.{$selected->image}") }}" alt="No Image" id="imgload" width="80"/>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <label for="inputSubject" class="col-form-label">About or Details</label>
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
</div>

@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
<!-- Main container end -->
@endsection
