<div class="menu-wrap">
  <span class="menu-close"><i class="fas fa-times"></i></span>
  <ul class="mb-0 list-unstyled w-100">
    <li><a href="{{route('home')}}" title="">Home</a>
      <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Events</a>
        <ul class="children list-unstyled">
          <li><a href="{{route('event')}}" title="">Events</a></li>
          <li><a href="{{route('event_schedule')}}" title="">Event Schedule</a></li>
          <li><a href="{{route('host')}}" title="">Speakers/Host</a></li>
          <li><a href="{{route('sponsor')}}" title="">Sponsors</a></li>
        </ul>
      </li>
      <li><a href="{{route('blog')}}" title="">Blog</a></li>
      <li><a href="{{route('gallery')}}" title="">Gallery</a></li>
      <li><a href="{{route('about')}}" title="">About</a></li>
      <li><a href="{{route('contact')}}" title="">Contact</a></li>

      <li class="menu-item-has-children"><a href="javascript:void(0);" title=""><i class="flaticon-user"></i></a>
        <ul class="children list-unstyled">
          @guest
          <li ><a href="{{route('login')}}" title="">Login</a></li>
          <li><a href="{{route('register')}}" title="">Register</a></li>
          @else
          @if(Auth::User()->role==0)
          <li><a href="{{route('account')}}" title="">Account</a></li>
          @else
            <li><a href="{{route('dashboard')}}" title="">Account</a></li>
            @endif
          <li ><a href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            @endguest
          </ul>
        </li>
      </ul>
      <div class="social-links4 d-flex flex-wrap">
        @foreach($Social as $value)
        <a class="facebook rounded-circle" href="{{$value->facebook}}" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a class="twitter rounded-circle" href="{{$value->twitter}}" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
        <a class="instagram rounded-circle" href="{{$value->instagram}}" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
        <a class="youtube rounded-circle" href="{{$value->youtube}}" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
        @endforeach
      </div>
    </div><!-- Menu Wrap -->
