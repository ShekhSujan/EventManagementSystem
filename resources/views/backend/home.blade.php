@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Admin Dashboard</li>
  </ol>
</div>
<!-- Page header end -->
<div class="main-container">
  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\Users::All()->where('role','>=',1)->count()}}</h3>
          <p>Admins & Editors</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\Users::All()->where('role',0)->count()}}</h3>
          <p>Users</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\Subscriber::All()->count()}}</h3>
          <p>Subscriber</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\Event::All()->count()}}</h3>
          <p>Events</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\Blog::All()->count()}}</h3>
          <p>Blog</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\SpeakerArtist::All()->count()}}</h3>
          <p>Host</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\Sponsor::All()->count()}}</h3>
          <p>Sponsor</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>{{App\Models\Gallery::All()->count()}}</h3>
          <p>Gallery</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Yearly Report</div>
        </div>
        <div class="card-body pt-0">
          <div id="Events"></div>
          @include('backend.components.yearly-report')
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Total Transaction</div>
        </div>
        <div class="card-body">
          <div id="customers"></div>
          @include('backend.components.total-transction')
          <!-- Row starts -->
          <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
              <div class="info-stats3 shade-one-a">
                <i class="icon-opacity"></i>
                <h6>Stripe Payment</h6>
                <h3>{{$allStripePayment}}</h3>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
              <div class="info-stats3 shade-one-b">
                <i class="icon-opacity"></i>
                <h6>Paypal Payment</h6>
                <h3>{{$allPaypalPayment}}</h3>
              </div>
            </div>
          </div>
          <!-- Row end -->
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Event Category</div>
        </div>
        <div class="card-body">
          <div class="customScroll5">
            <div class="activity-logs">
              @foreach($allEventCategory as $value)
              <div class="activity-log-list">
                <div class="sts"></div>
                <div class="log">{{$value->category_title}}</div>
                <div class="log-time pr-2"><span class="badge bg-success text-white">{{$value->total}}</span></div>&nbsp
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Row end -->
  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6">
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="table-container">
            <div class="t-header">Ongoing Events</div>
            <div class="table-responsive">
              <table id="highlightRowColumn" class="table custom-table">
                <thead>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Date</th>
                    <th>Pending</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allOngoing as $key =>$value)
                <tr>
                  <td> <img src="{{ asset("assets/images/event/thumnails/{$value->id}-{$value->slug}.{$value->image}") }}" width="60"/></td>
                  <td>{{$value->title}}</td>
                  <td>{{$value->date}}</td>
                    <td><span class="badge badge-warning">{{App\Models\Paypal::all()->where('event_id',$value->id)->where('status',0)->count()+App\Models\Stripe::all()->where('event_id',$value->id)->where('status',0)->count()}}</span></td>
                  <td>
                    <a href="{{ route("backend.event.view", $value->id) }}"><span class="btn btn-success"><i class="icon-eye"></i></span></a>&nbsp&nbsp&nbsp
                    <a href="{{ route("backend.event-statistics.info", $value->id) }}"><span class="btn btn-info"><i class="icon-group_add"></i></span></a>&nbsp&nbsp&nbsp
                  </td>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
           <div class="card">
             <div class="card-body">
               <div id="calendar"></div>
               @include('backend.components.calender')
             </div>
           </div>
         </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
      <div class="row gutters">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Blog Category</div>
            </div>
            <div class="card-body">
              <div class="customScroll5">
                <div class="activity-logs">
                  @foreach($allBlogCategory as $value)
                  <div class="activity-log-list">
                    <div class="sts"></div>
                    <div class="log">{{$value->category_title}}</div>
                    <div class="log-time pr-2"><span class="badge bg-success text-white">{{$value->total}}</span></div>&nbsp
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Subscriber</div>
            </div>
            <div class="card-body">
              <div class="customScroll5">
                <ul class="project-activity">
                  @foreach($allSubscriber as $value)
                  <li class="activity-list">
                    <div class="detail-info">
                      <p class="date">{{ date('d M Y', strtotime($value->created_at)) }}</p>
                      <p class="info">{{$value->email}}</p>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Online users</div>
            </div>
            <div class="card-body">
              <div class="customScroll5">
                <div class="activity-logs">
                  @foreach($allUsers as $key =>$value)
                  <div class="activity-log-list">
                    <div class="sts"></div>
                    <div class="log">{{$value->name}}</div>
                    <div class="log-time pr-2">
                      @if($value->isOnline())
                      <span class="badge bg-success text-white">Online</span>
                      @else
                      <span class="badge bg-secondary text-white">Offline</span>
                      @endif
                    </div>&nbsp
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Row end -->

    <!-- Row end -->
  </div>

  @endsection
