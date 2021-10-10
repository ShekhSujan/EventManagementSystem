@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Event Schedule</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item active">Event Schedule</li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>

<section>
  <div class="w-100 pt-140 pb-120 position-relative">
    <div class="container">
      <div class="event-wrap2 w-100">
        @foreach($allEvent as $value)
        <div class="event-style2 w-100">
          <h4 class="mb-0 text-center">{{ date('d, M Y', strtotime($value->date)) }}</h4>
          <table>
            <thead class="bg-color15">
              <tr>
                <th>Time</th>
                <th>Event</th>
                <th>Location</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allEventByDate as $value2)
              @if($value->date==$value2->date)
              <tr>
                <td>{{$value2->time}}</td>
                <td><h3 class="mb-0"><a href="{{ url('event-details/'.$value2->id.'/'.$value2->slug) }}" title="">{{$value2->title}}</a></h3></td>
                <td>{{$value2->venue}}</td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
        @endforeach
      </div><!-- Event Wrap -->
    </div>
  </div>
</section>
@endsection
