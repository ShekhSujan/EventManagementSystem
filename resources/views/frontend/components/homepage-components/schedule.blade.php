<section>
  <div class="w-100  pb-50 gray-layer opc9 position-relative">
    <div class="fixed-bg patern-bg" style="background-image: url({{asset("assets/frontend/images/patter-bg1.jpg")}});"></div>
    <div class="container">
      <div class="sec-title mb-50 title-wth-btn d-flex flex-wrap justify-content-between align-items-center w-100">
        <div class="sec-title-inner pt-0 d-inline-block">
          <span class="d-block thm-clr">Schedule for Event</span>
          <h2 class="mb-0">Event Schedule</h2>
        </div>
        <div class="sec-title-btn">
          <a class="thm-btn lft-icon fill-btn" href="{{route('event_schedule')}}" title=""><i class="flaticon-download"></i>All Schedule<span></span></a>
        </div>
      </div><!-- Sec Title -->
      <div class="event-wrap2 w-100">
        @foreach($allEventDate as $value)
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
      <div class="view-all mt-40 text-center w-100">
        <a class="thm-btn fill-btn" href="{{route('event_schedule')}}" title="">View All Schedule <i class="flaticon-trajectory"></i><span></span></a>
      </div><!-- View All -->
    </div>
  </div>
</section>
