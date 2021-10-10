<footer>
  <div class="w-100 pt-120 blue-layer opc1 position-relative">
    <div class="fixed-bg back-blend-multiply bg-color4" style="background-image: url({{asset("assets/frontend/images/parallax2.jpg")}};"></div>
    <div class="container position-relative">
      <div class="clrs-wrap d-flex position-absolute">
        <i class="bg-color6"></i>
        <i class="bg-color7"></i>
        <i class="bg-color8"></i>
        <i class="bg-color9"></i>
        <i class="bg-color10"></i>
        <i class="bg-color11"></i>
      </div>
      <div class="footer-wrap w-100 text-center">
          <div class="fb-page" data-href="https://www.facebook.com/Enternals-104585531465981" data-tabs="timeline" data-width="600" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Enternals-104585531465981" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Enternals-104585531465981">Enternals</a></blockquote></div>
        <div class="footer-inner d-inline-block">
          @foreach($Setting as $value)
          <div class="logo d-inline-block"><h1 class="mb-0"><a href="{{route('home')}}" title=""><img class="img-fluid" src="{{asset("assets/images/logo/{$value->id}.{$value->logo}")}}" alt="Logo"></a></h1></div>

          <p class="mb-0">{!!$value->details!!}</p>
          <ul class="bottom-links list-unstyled d-flex flex-wrap justify-content-center mb-0">
            <li><a href="{{route('event')}}" title="">Events</a></li>
            <li><a href="{{route('event_schedule')}}" title="">Event Schedule</a></li>
            <li><a href="{{route('policy')}}" title="">Terms & Policy</a></li>
                <li><a href="{{route('about')}}" title="">About Us</a></li>
            <li><a href="{{route('contact')}}" title="">Contact Us</a></li>
          </ul>

        </div>
        <div class="footer-bottom d-flex flex-wrap justify-content-between w-100">
          <p class="mb-0"><i class="thm-clr flaticon-headset"></i>Call Us Today:<strong>{{$value->phone}}</strong></p>
            @endforeach
          <div class="social-links d-inline-flex">
              @foreach($Social as $value)
            <a class="facebook rounded-circle" href="{{$value->facebook}}" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a class="twitter rounded-circle" href="{{$value->twitter}}" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
            <a class="instagram rounded-circle" href="{{$value->instagram}}" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
            <a class="youtube rounded-circle" href="{{$value->youtube}}" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
              @endforeach
          </div>
        </div><!-- Footer Bottom -->
      </div>
    </div>
  </div>
</footer><!-- Footer -->
