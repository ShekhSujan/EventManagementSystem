<nav id="sidebar" class="sidebar-wrapper">

  <!-- Sidebar brand start  -->
  <div class="sidebar-brand">
    <a href="{{route('dashboard')}}" class="logo">
      @foreach($Setting as $key =>$value)
      <img src="{{asset("assets/images/logo/{$value->id}.{$value->logo}")}}" alt="" />
      @endforeach
    </a>
  </div>
  <!-- Sidebar brand end  -->
  <!-- Sidebar content start -->
  <div class="sidebar-content">
    <!-- sidebar menu start -->
    <div class="sidebar-menu">
      <ul>
        <li class="header-menu">General</li>

        <li class="sidebar-dropdown ">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Admins & Users</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              @if(Auth::user()->role==2)
              <li>
                <a href="{{route('backend.users.create')}}">
                  <span class="menu-text">Admins & Role</span>
                </a>
              </li>
              @endif
              <li>
                <a href="{{route('backend.users.index')}}">
                  <span class="menu-text">Users &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Users::all()->where('role',0)->count()}}</span></span>
                </a>
              </li>
              <li>
                <a href="{{route('backend.subscriber.index')}}">
                  <span class="menu-text">Subscriber &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Subscriber::all()->where('role',0)->count()}}</span>
                </a>
              </li>
              <li>
                <a href="{{route('backend.contact_list')}}">
                  <span class="menu-text">Contact List &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Users::all()->where('role','>',0)->count()}}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="sidebar-dropdown ">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Events</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="{{route('backend.category.create')}}">Category &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Category::all()->count()}}</span>
                </a>
              </li>
              <li>
                <a href="{{route('backend.speaker-artist.index')}}">Host &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\SpeakerArtist::all()->count()}}</span>
                </a>
              </li>
              <li>
                <a href="{{route('backend.sponsor.create')}}">Sponsor &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Sponsor::all()->count()}}</span>
                </a>
              </li>
              <li>
                <a href="{{route('backend.event.index')}}">Events &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Event::all()->count()}}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
          @if(Auth::user()->role==2)
        <li class="sidebar-dropdown ">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Events Statistics</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="{{route('backend.event-statistics.index')}}">Ongoing Events &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Event::all()->where('date','>',today())->count()}}</span></a>
              </li>
              <li>
                <a href="{{route('backend.event-statistics.completed')}}">Completed Events &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Event::all()->where('date','<',today())->count()}}</span></a>
              </li>
            </ul>
          </div>
        </li>
        @endif
        <li class="sidebar-dropdown ">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Blog</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="{{route('backend.blog-category.create')}}">Category &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\BlogCategory::all()->count()}}</span>
                </a>
              </li>

              <li>
                <a href="{{route('backend.blog.index')}}">Blog &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Blog::all()->count()}}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="{{route('backend.contact.index')}}">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Contact</span>
          </a>
        </li>

        @if(Auth::user()->role==2)
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Extra</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="{{route('backend.slider.create')}}">Slider &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Slider::all()->count()}}</span>
                </a>
              </li>
              <li>
                <a href="{{route('backend.about.edit',1)}}">About Us</a>
              </li>
              <li>
                <a href="{{route('backend.policy.edit',1)}}">Policy</a>
              </li>
              <li>
                <a href="{{route('backend.social-media.edit',1)}}">SocialMedia</a>
              </li>
              <li>
                <a href="{{route('backend.gallery.create')}}">Gallery &nbsp&nbsp<span class="badge badge-pill badge-danger">{{App\Models\Gallery::all()->count()}}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Settings</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="{{route('backend.setting.edit',1)}}">Site Setting</a>
              </li>
              <li>
                <a href="{{route('backend.email-setting.edit',1)}}">Email Setting</a>
              </li>

              <li>
                <a href="{{route('backend.meta.edit',1)}}">Meta/SEO</a>
              </li>

            </ul>
          </div>
        </li>
        @endif

        <li>
          <a href="{{route('backend.cache_clear')}}">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Cache Clear</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- sidebar menu end -->
  </div>
  <!-- Sidebar content end -->

</nav>
