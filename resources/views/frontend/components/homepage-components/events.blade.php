
<section>
  <div class="w-100 pt-50 pb-30 position-relative">
    <div class="container">
      <div class="sec-title btm-icn mb-50 w-100 text-center">
        <div class="sec-title-inner d-inline-block">
          <span class="d-block thm-clr">Pricing Plans</span>
          <h2 class="mb-0">Biggest Festivals</h2>
          <i class=""></i>
        </div>
      </div><!-- Sec Title -->
      <div class="event-grid-wrap w-100">
        <div class="row res-caro">
          @foreach($allEvent as $value)
          <div class="col-md-4 col-sm-6 col-lg-4">
            <div class="event-grid-box mb-30 w-100">
              <div class="event-grid-img w-100 overflow-hidden position-relative">
                <img class="img-fluid w-100" src="{{asset("assets/images/event/thumnails/{$value->id}-{$value->slug}.{$value->image}")}}" alt="Event Image 1">
                <span class="position-absolute"><a class="rounded-circle" href="javascript:void(0);" title=""><i class="fas fa-heart"></i></a></span>
                <a class="thm-btn fill-btn" href="{{ url('event-details/'.$value->id.'/'.$value->slug) }}" title="">
                  {{($value->date < today()) ? 'Completed' : 'Book now' }}
                <span></span></a>
              </div>
              <div class="event-grid-info w-100">
                <h3 class="mb-0"><a href="{{ url('event-details/'.$value->id.'/'.$value->slug) }}" title="">{{$value->title}}</a></h3>
                <span class="event-date thm-clr d-block">{{ date('d ,M Y', strtotime($value->date)) }}</span>
                <ul class="event-grid-meta mb-0 list-unstyled d-flex flex-wrap">
                  <li><i class="far fa-clock"></i>Time: <strong>{{$value->time}}</strong></li>
                  <li><i class="fas fa-tags"></i>From: <strong>{{$value->price}}</strong></li>
                </ul>
                <span class="event-loc d-block"><i class="fas fa-map-pin"></i>{{$value->venue}}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- Event Grid Wrap -->
      <div class="view-all mt-40 text-center w-100">
        <a class="thm-btn fill-btn" href="{{route('event')}}" title="">View All Events <i class="flaticon-trajectory"></i><span></span></a>
      </div><!-- View All -->
    </div>
  </div>
</section>
