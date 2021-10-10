@extends('layouts.dashboard')
@section('content')
@if(Auth::user()->role==2)
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Completed Events</li>
  </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
  <!-- Row start -->
  <div class="row  gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="table-container">
        <div class="t-header">Completed Events</div>
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
              <th>Image</th>
              <th>Title</th>
              <th>Date</th>
              <th>Participent</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allEvent as $key =>$value)
            <tr>
              <td> <img src="{{ asset("assets/images/event/thumnails/{$value->id}-{$value->slug}.{$value->image}") }}" width="60"/></td>
              <td>{{$value->title}}</td>
              <td>{{$value->date}}</td>
              <td><span class="badge badge-success">{{App\Models\Paypal::all()->where('event_id',$value->id)->where('status',1)->count()+App\Models\Stripe::all()->where('event_id',$value->id)->where('status',1)->count()}}</span></td>
              <td>
                <a href="{{ route("backend.event.view", $value->id) }}"><span class="btn btn-success"><i class="icon-eye"></i></span></a>&nbsp&nbsp&nbsp
                <a href="{{ route("backend.event-statistics.info", $value->id) }}"><span class="btn btn-info"><i class="icon-group_add"></i></span></a>&nbsp&nbsp&nbsp
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
