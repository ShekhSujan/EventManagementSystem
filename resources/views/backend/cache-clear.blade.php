@extends('layouts.dashboard')
@section('content')
<!-- Page header start -->
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Cache Clear</li>
  </ol>

</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">

  <!-- Row start -->
  <div class="row  gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card m-0">
        <div class="card-header">
          <div class="card-title">Site Cache Clear</div>
        </div>
        <div class="row gutters">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group pl-5">
              <a href="{{ url('/clear-cache') }}" class="btn btn-info" target="_blank">Cache Clear</a>
              <a href="{{ url('/route-cache') }}" class="btn btn-info" target="_blank">Route Cache Clear</a>
              <a href="{{ url('/config-cache') }}" class="btn btn-info" target="_blank">Config Cache Clear</a>
              <a href="{{ url('/view-cache') }}" class="btn btn-info" target="_blank">View Cache Clear</a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- Row end -->

  </div>
</div>
</div>
</div>
</div>

<!-- Main container end -->
@endsection
