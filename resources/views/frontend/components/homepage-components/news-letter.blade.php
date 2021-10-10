<section>
  <div class="w-100 pt-50 pb-50 position-relative">
    <div class="container">
      <div class="newsletter-wrap w-100 text-center">
        <h2 class="mb-0">Newsletter and You'll Get Festival <br> Special Offers</h2>
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
        <div class="alert alert-success">
          {{ session('msg') }}
        </div>
        @endif
        <form class="w-100 d-flex flex-wrap justify-content-between" action="{{route('subscriber_store')}}" method="POST">
          @csrf
          <div class="form-input-wrap">
            <div class="input-field position-relative">
              <i class="fas fa-envelope"></i>
              <input name="email" type="email" placeholder="Email Address" required>
            </div>
          </div>
          <div class="form-button">
            <button class="thm-btn fill-btn" type="submit">Subscribe<span></span></button>
          </div>
        </form>
      </div><!-- Newsletter Wrap -->
    </div>
  </div>
</section>
