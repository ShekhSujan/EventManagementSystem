<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Meta -->
	<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
	<meta name="author" content="ParkerThemes">
	@foreach($Setting as $value)
	<link rel="shortcut icon" href="{{asset("assets/images/flogo/{$value->id}.{$value->flogo}")}}" />
@endforeach
	<!-- Title -->
	<title>{{ (isset($title)?$title:"Home") }}</title>
	<!-- ******************* Common Css Files ******************* -->
	@include('backend.components.css')
</head>
<body>
	<!-- Loading starts -->
	<!-- <div id="loading-wrapper">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div> -->
	<!-- Loading ends -->
	<!-- Page wrapper start -->
	<div class="page-wrapper">

		<!-- Sidebar wrapper start -->
		@include('backend.components.leftbar')
		<!-- Sidebar wrapper end -->
		<!-- Page content start  -->
		<div class="page-content">
			<!-- Header start -->
			@include('backend.components.topbar')
			<!-- Header end -->


			<!-- Main container start -->
			@yield('content')
			<!-- Main container end -->
		</div>
		<!-- Page content end -->
	</div>

	@include('backend.components.js')
</body>
</html>
