@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Contact List</li>
  </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="table-container">
      <div class="t-header">All Contact</div>
      <div class="table-responsive">
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
        <table id="highlightRowColumn" class="table custom-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allContact as $key =>$value)
            <tr>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->subject}}</td>
              <td>
                <a href="{{ route("backend.contact.view", $value->id) }}"><span class="btn btn-success"><i class="icon-eye"></i></span></a>&nbsp&nbsp&nbsp
                <span class=""><a href="#" onclick="event.preventDefault();
                  document.getElementById('logout-form-{{ $value->id }}').submit();"><span class="btn btn-danger"><i class="icon-x"></i></span></a></span>
                  <form id="logout-form-{{ $value->id }}" action="{{ route('backend.contact.destroy') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $value->id }}">
                  </form>
                </td>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  <!-- Row end -->

</div>
<!-- Main container end -->
@endsection
