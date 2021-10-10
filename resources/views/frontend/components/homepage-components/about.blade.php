<div class="about-wrap2 w-100">
  <div class="row align-items-center">
    @foreach($allAbout as $value)
    <div class="col-md-12 col-sm-12 col-lg-6">
      <div class="about-img style2">
        <img class="img-fluid w-100" src="{{asset("assets/images/about/{$value->id}.{$value->image}")}}" alt="About Image 5">
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-lg-6">
      <div class="about-desc3 w-100">
        <div class="sec-title mb-25 w-100">
          <div class="sec-title-inner pt-0 d-inline-block">
            <span class="d-block thm-clr">About Us</span>
            <h3 class="mb-0">{{$value->title}}</h3>
          </div>
        </div><!-- Sec Title -->
        <p class="mb-0">{!! substr(($value->about), 0, 325) !!}</p>
        <a href="{{route('about')}}" class="thm-btn fill-btn" href="javascript:void(0);" title="">More Information <i class="flaticon-trajectory"></i><span></span></a>
      </div>
    </div>
    @endforeach
  </div>
</div><!-- About Wrap -->
