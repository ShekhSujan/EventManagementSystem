<header class="stick style1 w-100">
  <div class="container">
    <div class="logo-menu-wrap w-100 d-flex flex-wrap justify-content-between align-items-start">
      @foreach($Setting as $value)
      <div class="logo"><h1 class="mb-0"><a href="{{route('home')}}" title="Home"><img class="img-fluid" src="{{asset("assets/images/logo/{$value->id}.{$value->logo}")}}" alt="Logo" srcset="{{asset("assets/images/logo/{$value->id}.{$value->logo}")}}"></a></h1></div><!-- Logo -->
      @endforeach
      <nav class="d-inline-flex align-items-center">
        <div class="header-left">
          <ul class="mb-0 list-unstyled d-inline-flex">
            <li><a href="{{route('home')}}" title="">Home</a>
            </li>
            <li class="menu-item-has-children"><a href="javascript:void(0);" title="">Events</a>
              <ul class="children mb-0 list-unstyled">
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
          </ul>
        </div>
        <div class="header-right-btns">
          <ul class="mb-0 list-unstyled d-inline-flex">
            <li class="menu-item-has-children"><a href="javascript:void(0);" title=""><i class="flaticon-user"></i></a>
              <ul class="children mb-0 list-unstyled">
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
            <a class="menu-btn" href="javascript:void(0);" title=""><i class="flaticon-menu"></i></a>
          </div>
        </nav>
      </div><!-- Logo Menu Wrap -->
    </div>
  </header><!-- Header -->
