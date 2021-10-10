<div class="features-wrap pt-50 w-100">
  <h3 class="mb-0 text-center">We've Got You Covered</h3>
  <div class="features-inner w-100">
    <div class="row mrg15">
      @foreach($allCategory as $value)
      <div class="col-md-6 col-sm-6 col-lg-4">
        <div class="feature-box mt-15 w-100">
          <a href="{{route('event_category',$value->id)}}" title="" style="background-image: url({{asset("assets/images/category/{$value->id}.{$value->image}")}}">{{$value->title}}</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div><!-- Features Wrap -->
