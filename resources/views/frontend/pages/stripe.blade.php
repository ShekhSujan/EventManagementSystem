@extends('layouts.app')
@section('content')
<section>
  <div class="w-100 pt-100 pb-100 page-title-wrap text-center black-layer opc5 position-relative">
    <div class="fixed-bg" style="background-image: url({{asset("assets/frontend/images/parallax8.jpg")}}"></div>
    <div class="container">
      <div class="page-title-inner d-inline-block">
        <h1 class="mb-0">Pay With Stripe</h1>
      </div>
    </div>
  </div><!-- Page Title Wrap -->
</section>
<style>
.box{
box-shadow: 0px 0px 2px 2px #212121;
}
</style>
<section>
      <div class="w-100 pt-40 pb-50 position-relative">
<div class="container" id="con">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-4 box">
      <div class="cart-bg-overlay"></div>
      <?php
      Stripe\Stripe::setApiKey("sk_test_UAIIz3JPvfaPZKqwGE101Me1007XoHjTFG");
      ?>
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <br />
      <img src="{{asset("assets/stripe.png")}} " class="image" width="100%"><br>
      <h3 class="strip ">Register Events With Stripe</h3><br>
      <p class="strip ">Integrate with Stripe by choosing a payment flow that's right for your business.</p><br>
      <form action="{{ route('pay_stripe') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>" / >
        <input type="hidden" name="qty" value="<?php echo $qty ?>" / >
        <input type="hidden" name="event_id" value="<?php echo $event_id ?>" / >
        <input type="hidden" name="amount" value="<?php echo $amount ?>" />
        <input type="hidden" name="name" value="<?php echo $name ?>" />
        <input type="hidden" name="email" value="<?php echo $email ?>" />
        <input type="hidden" name="phone" value="<?php echo $phone ?>" />
        <input type="hidden" name="address" value="<?php echo $address ?>" />
        <div class="stripe-bb">
          <script
          src="https://checkout.stripe.com/checkout.js"
          class="stripe-button"
          data-key="pk_test_TGMkbNdgKTkOPBr7mpekTjp400JrFaPjwN"
          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
          data-name="Event Registration"
          data-label="Pay With Card"
          data-description="Total Amount: {{$amount * $qty}}"
          data-amount="<?php echo $amount * 100 * $qty?>">
          </script></div><br><br>
        </form><br><br>
      </div>
    </div>
  </div>
  </div>
</section><br><br>
  @endsection
