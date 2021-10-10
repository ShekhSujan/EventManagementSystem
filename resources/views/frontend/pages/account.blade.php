@extends('layouts.app')
@section('content')
@if(Auth::User()->role==0)
<section>
  <div class="w-100 pt-180 pb-120 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">My Account</h1>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pb-60 position-relative">
    <div class="container-fluid">
      <hr class="devider mb-50 w-100">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-8">
            <div class="content-wrap mb-40 w-100">
              <h2 class="mb-0">Account Info</h2>
              <div class="tabs-wrap w-100 mt-45">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab2">Update Info</a></li>
                  <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab1">Events</a></li>

                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tab2">
                    <section>
                      <div class="w-100 pt-20 pb-20 position-relative">
                        <div class="container">
                          <div class="checkout-wrap w-100">
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="checkout-form w-100">
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
                                  {{ session('error') }}
                                  @endif
                                  <form class="w-100" action="{{route('update_profile')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mrg10">
                                      <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="w-100 form-control" type="hidden" name="id" placeholder="id" value="{{Auth::user()->id}}">
                                        <input class="w-100 form-control" type="hidden" name="ext" value="{{Auth::user()->image}}">
                                        <input class="w-100 form-control" type="text" name="name" value="{{Auth::user()->name}}">
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="w-100 form-control" type="email" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                                      </div>

                                      <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="w-100 form-control" type="text" name="phone" placeholder="Phone" value="{{Auth::user()->phone}}">
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="w-100 form-control" type="text"  name="address" placeholder="Address" value="{{Auth::user()->address}}"/>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="w-100 form-control" id="imgInp" type="file" name="pic">
                                        @php
                                        $id=Auth::user()->id;
                                        $img=Auth::user()->image;
                                        @endphp
                                        <img src="{{ asset("assets/images/users/$id.$img")}}" alt="No Image" id="imgload" width="80"/>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-lg-12">
                                        <button type="submit" class="thm-btn mt-30 sml-btn lft-icon fill-btn">
                                          {{ __('Update') }}
                                        </button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div><!-- Checkout Wrap -->
                        </div>
                      </div>
                    </section>
                  </div>
                  <div class="tab-pane fade" id="tab1">
                    <table class="table table-bordered">
                      <a class="thm-btn mt-30 sml-btn lft-icon brd-btn" href="javascript:void(0);" title=""><i class="flaticon-coupon"></i>Ongoing Event<span></span></a>
                      <thead>
                        <tr>
                          <th scope="col">Image</th>
                          <th scope="col">Title</th>
                          <th scope="col">Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allPaypalOngoing as $value)
                        <tr>
                          <td><img src="{{ asset("assets/images/event/thumnails/{$value->event_id}-{$value->event_slug}.{$value->event_image}") }}" width="60"/></td>
                          <td>{{$value->event_title}}</td>
                          <td>{{$value->event_date}}</td>
                          <td><a class="thm-btn  sml-btn lft-icon fill-btn" href="{{route("event_ticket_paypal", $value->id) }}" title=""><i class="fa fa-eye"></i><span></span></a></td>
                        </tr>
                        @endforeach
                        @foreach($allStripeOngoing as $value)
                        <tr>
                          <td><img src="{{ asset("assets/images/event/thumnails/{$value->event_id}-{$value->event_slug}.{$value->event_image}") }}" width="60"/></td>
                          <td>{{$value->event_title}}</td>
                          <td>{{$value->event_date}}</td>
                          <td><a class="thm-btn  sml-btn lft-icon fill-btn" href="{{route("event_ticket_stripe", $value->id) }}" title=""><i class="fa fa-eye"></i><span></span></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <div class="divider3 w-100"></div>

                    <table class="table table-bordered">
                      <a class="thm-btn mt-30 sml-btn lft-icon brd-btn" href="javascript:void(0);" title=""><i class="flaticon-coupon"></i>Previous Event<span></span></a>
                      <thead>
                        <tr>
                          <th scope="col">Image</th>
                          <th scope="col">Title</th>
                          <th scope="col">Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allPaypal as $value)
                        <tr>
                          <td><img src="{{ asset("assets/images/event/thumnails/{$value->event_id}-{$value->event_slug}.{$value->event_image}") }}" width="60"/></td>
                          <td>{{$value->event_title}}</td>
                          <td>{{$value->event_date}}</td>
                          <td><a class="thm-btn  sml-btn lft-icon fill-btn" href="{{route("event_ticket_paypal", $value->id) }}" title=""><i class="fa fa-eye"></i><span></span></a></td>
                        </tr>
                        @endforeach
                        @foreach($allStripe as $value)
                        <tr>
                          <td><img src="{{ asset("assets/images/event/thumnails/{$value->event_id}-{$value->event_slug}.{$value->event_image}") }}" width="60"/></td>
                          <td>{{$value->event_title}}</td>
                          <td>{{$value->event_date}}</td>
                          <td><a class="thm-btn  sml-btn lft-icon fill-btn" href="{{route("event_ticket_stripe", $value->id) }}" title=""><i class="fa fa-eye"></i><span></span></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-4">
            <div class="content-wrap mb-40 w-100">
              <h2 class="mb-0">Profile</h2>
              <!-- <img src="{{asset("assets/default-image/users.png")}}"/> -->
              <img src="{{ asset("assets/images/users/$id.$img") }}" alt="No Image" id="imgload" width="80"/>
              <ul class="mb-0 mt-25 w-100 list-unstyled checkmarks-style">
                <li>Name:{{Auth::user()->name}}</li>
                <li>Email:{{Auth::user()->email}}</li>
                <li>Phone: {{Auth::user()->phone}}</li>
                <li>Address:{{Auth::user()->address}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@else
<script>window.location = "{{ route('home') }}";</script>
@endif
@endsection
