@extends('layouts.dashboard')
@section('content')
@if(Auth::user()->role==2)
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Events Info</li>
  </ol>
</div>
<!-- Main container start -->
<div class="main-container">
  <div class="row gutters justify-content-center hdd">
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>
            @if($selected->date>today())
            {{App\Models\Paypal::all()->where('event_id',$selected->id)->count()+App\Models\Stripe::all()->where('event_id',$selected->id)->count()}}
            @else
            {{App\Models\Paypal::all()->where('event_id',$selected->id)->where('status',1)->count()+App\Models\Stripe::all()->where('event_id',$selected->id)->where('status',1)->count()}}
            @endif
          </h3>
          <p>Participant</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>
            @if($selected->date>today())
            {{App\Models\Paypal::all()->where('event_id',$selected->id)->sum('qty')+App\Models\Stripe::all()->where('event_id',$selected->id)->sum('qty')}}
            @else
            {{App\Models\Paypal::all()->where('event_id',$selected->id)->where('status',1)->sum('qty')+App\Models\Stripe::all()->where('event_id',$selected->id)->where('status',1)->sum('qty')}}
            @endif
          </h3>
          <p>Tickets</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>
            @if($selected->date>today())
            ${{App\Models\Paypal::all()->where('event_id',$selected->id)->sum('total')+App\Models\Stripe::all()->where('event_id',$selected->id)->sum('total')}}
            @else
            ${{App\Models\Paypal::all()->where('event_id',$selected->id)->where('status',1)->sum('total')+App\Models\Stripe::all()->where('event_id',$selected->id)->where('status',1)->sum('total')}}
            @endif

          </h3>
          <p>Amount</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>
            @if($selected->date>today())
            ${{App\Models\Paypal::all()->where('event_id',$selected->id)->sum('total')}}
            @else
            ${{App\Models\Paypal::all()->where('event_id',$selected->id)->where('status',1)->sum('total')}}
            @endif
          </h3>
          <p>ByPaypal</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
      <div class="info-stats4">
        <div class="info-icon">
          <i class="icon-activity"></i>
        </div>
        <div class="sale-num">
          <h3>
            @if($selected->date>today())
            ${{App\Models\Stripe::all()->where('event_id',$selected->id)->sum('total')}}
            @else
            ${{App\Models\Stripe::all()->where('event_id',$selected->id)->where('status',1)->sum('total')}}
            @endif
          </h3>
          <p>ByStripe</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="printableArea">
      <div class="card" >
        <div class="card-body p-0">
          <div class="invoice-container" >
            <div class="invoice-header">
              <!-- Row start -->
              <div class="row gutters" id="hid">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="custom-actions-btns mb-5">
                    <a href="#" class="btn btn-dark" id="print">
                      <i class="icon-printer"></i> Print
                    </a>
                  </div>
                </div>
              </div>
              <!-- Row start -->
              <div class="row gutters ">
                @foreach($allSetting as $value)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <a href="#" class="invoice-logo">
                    <img src="{{asset("assets/images/logo/{$value->id}.{$value->logo}")}}" alt="" />
                  </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <address class="text-right">
                    <b>Event:</b>{{$selected->title}}<br/>
                    Date: {{ date('d M Y', strtotime($value->created_at)) }}
                  </address>
                </div>
                @endforeach
              </div>
              <!-- Row end -->
            </div>
            <div class="invoice-body">
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="table-responsive">
                    <table class="table custom-table">
                      <thead>
                        <tr>
                          <th>Sl:</th>
                          <th>Name</th>
                          <th>Ticket</th>
                          <th>Price</th>
                          <th>Amount</th>
                          <th>PayBy</th>
                          @if($selected->date>today())
                          <th>Status</th>
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allParticipentByPaypal as $key=> $value)
                        <tr>
                          @if($selected->date>today())
                          <td>{{$key+1}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->qty}}</td>
                          <td>{{$value->amount}}</td>
                          <td>{{$value->total}}</td>
                          <td>Paypal</td>
                          <td>
                            @if($value->status==1)
                            <span class="badge badge-success">Confirmed</span>
                            @else
                            <span class="badge badge-warning">Pending</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('backend.paypal_reg',$value->id)}}" class="btn btn-success">
                              <i class="icon-export"></i> Confirm
                            </a>
                          </td>
                          @endif
                          @if($value->status==1 && $selected->date<today())
                          <td>{{$key+1}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->qty}}</td>
                          <td>{{$value->amount}}</td>
                          <td>{{$value->total}}</td>
                          <td>Paypal</td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- ######################################################################################################################### -->
                    <table class="table custom-table">
                      <thead>
                        <tr>
                          <th>Sl:</th>
                          <th>Name</th>
                          <th>Ticket</th>
                          <th>Price</th>
                          <th>Amount</th>
                          <th>PayBy</th>
                          @if($selected->date>today())
                          <th>Status</th>
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allParticipentByStripe as $key1=> $value)
                        <tr>
                          @if($selected->date>today())
                          <td>{{$key1+1}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->qty}}</td>
                          <td>{{$value->amount}}</td>
                          <td>{{$value->total}}</td>
                          <td>Stripe</td>
                          <td>
                            @if($value->status==1)
                            <span class="badge badge-success">Confirmed</span>
                            @else
                            <span class="badge badge-warning">Pending</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('backend.stripe_reg',$value->id)}}" class="btn btn-success">
                              <i class="icon-export"></i> Confirm
                            </a>
                          </td>
                          @endif
                          @if($value->status==1 && $selected->date<today())
                          <td>{{$key1+1}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->qty}}</td>
                          <td>{{$value->amount}}</td>
                          <td>{{$value->total}}</td>
                          <td>Stripe</td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Row end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
@endsection
