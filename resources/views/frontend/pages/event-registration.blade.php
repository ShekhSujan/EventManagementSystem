@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-80 pb-80 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Event Registration</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}" title="">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('event')}}" title="">Event</a></li>
        </ol>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<section>
  <div class="w-100 pt-40 pb-100 position-relative">
    <div class="container">
      <div class="checkout-wrap w-100">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-8">
            <div class="checkout-form w-100">
              <h2 class="mb-0">Billing Information</h2>
              <form action="{{ route('checkout') }}" method="post">
                                   @csrf
                <input type="hidden" name="id" value="{{$selected->id}}">
                 <input type="hidden" name="price" value="{{$selected->price}}">
                <div class="row mrg10">
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100" name="name" type="text" placeholder="Full Name" value="{{Auth::User()->name}}" required>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100" name="email" type="email" placeholder="Email Address" value="{{Auth::User()->email}}" required>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100" name="phone" type="tel" placeholder="Phone Number" value="{{Auth::User()->phone}}" required>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <input class="w-100" name="address" type="text" placeholder="Address" value="{{Auth::User()->address}}" required>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-4">
              <div class="your-payment-method bg-color3 w-100">
                <div class="your-order w-100">
                  <span>Price: <span>${{$selected->price}}</span></span>
                </div><br/>
                <div class="your-order w-100">
                  <span>Quantity: <span><input type="number" name="qty"style="width: 50%;" min="1" max="10" value="1"/></span></span>
                </div>
                <div class="payment-methods w-100">
                  <h4 class="mb-0">Payment Method</h4>
                  <ul class="mb-0 list-unstyled w-100">
                    <li><input type="radio" name="payment_method" value="1" id="radio1"> <label for="radio1">PayPal</label></li>
                    <li><input type="radio" name="payment_method" value="2" id="radio2"> <label for="radio2">Stripe</label></li>
                  </ul>

                  <button class="thm-btn fill-btn" type="submit">Confirm<span></span></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div><!-- Checkout Wrap -->
    </div>
  </div>
</section>

@endsection
