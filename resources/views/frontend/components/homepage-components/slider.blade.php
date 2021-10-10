
<section>
  <div class="w-100 position-relative">
    <div class="feat-wrap position-relative w-100">
      <div class="feat-caro">
        @foreach($allSlider as $key=>$value)
        <div class="feat-item-wrap">
          <div class="feat-item pb-240 d-flex flex-wrap align-items-end">
            <div class="feat-img position-absolute w-100" style="background-image: url({{asset("assets/images/slider/{$value->id}.{$value->image}")}}"></div>
            <div class="container">
              <div class="row justify-content-between align-items-end">

                <div class="col-md-12 col-sm-12 col-lg-7">
                  <div class="feat-cap w-100">
                    <h3 class="mb-0 text-white"><a href="#" title="">{{$value->title}}</a></h3>
                    <span class="d-block text-white"><strong></strong>{{$value->short_details}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div><!-- Featured Area Wrap -->
  </div>
</section>
