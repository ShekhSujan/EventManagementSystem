<header class="header">
  <div class="toggle-btns">
    <a id="toggle-sidebar" href="#">
      <i class="icon-list"></i>
    </a>
    <a id="pin-sidebar" href="#">
      <i class="icon-list"></i>
    </a>
  </div>
  <div class="header-items">
    <!-- Header actions start -->
    <ul class="header-actions">
      <li class="dropdown">
        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
          <i class="icon-bell"></i>
          <span class="count-label">{{App\Models\Event::all()->where('status',0)->count()+$PaypalReg+$StripeReg}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
          <ul class="header-notifications">
            <li>
              <a href="{{route('backend.event.index')}}">
                <div class="details">
                  <div class="user-title">Pending Event &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Event::all()->where('status',0)->count()}}</span></div>
                </div>
              </a>
            </li>
            <li>
              <a href="{{route('backend.event-statistics.index')}}">
                <div class="details">
                  <div class="user-title">Pending Registration &nbsp&nbsp<span class="badge badge-pill badge-danger">{{$PaypalReg+$StripeReg}}</span></div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="dropdown">
        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
          @foreach($Profile as $key=>$value)
          @if(Auth::user()->id==$value->id)

          <span class="user-name">{{$value->name}}</span>
          <span class="avatar">
            @if($value->image=="")
            <img src="{{ asset("assets/default-image/users.png") }}" alt="Profile" />
            @else
            <img src="{{ asset("assets/images/users/{$value->id}.{$value->image}") }}" alt="Profile" />
            @endif
            <span class="status online"></span>
          </span>

          @endif
          @endforeach
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
          <div class="header-profile-actions">
            @foreach($Profile as $key=>$value)
            @if(Auth::user()->id==$value->id)
            <div class="header-user-profile">
              <div class="header-user">
                @if($value->image=="")
                <img src="{{ asset("assets/default-image/users.png") }}" alt="Profile" />
                @else
                <img src="{{ asset("assets/images/users/{$value->id}.{$value->image}") }}" alt="Profile" />
                @endif

              </div>
              <h5>{{$value->name}}</h5>
              <p>
                @if($value->role==1)
                <span class="badge badge-info">Editor</span>
                @elseif($value->role==2)
                <span class="badge badge-success">Admin</span>
                @endif
              </p>
            </div>
            <a href="{{ route("backend.users.view", $value->id) }}"><i class="icon-user1"></i> My Profile</a>
            <a href="{{ route("backend.users.edit", $value->id) }}"><i class="icon-settings1"></i>Update Account</a>
            @endif
            @endforeach
            <a  href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </div>
      </li>
    </ul>
    <!-- Header actions end -->
  </div>
</header>
