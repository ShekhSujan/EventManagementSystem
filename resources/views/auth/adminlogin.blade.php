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
  <title>Admin Login</title>

  <!-- *************
  ************ Common Css Files *************
  ************ -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}" />

  <!-- Master CSS -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/main.css')}}" />

</head>

<body class="authentication">

  <!-- Container start -->
  <div class="container">

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="row justify-content-md-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
          <div class="login-screen">
            <div class="login-box">
              <a href="#" class="login-logo">
                  @foreach($Setting as $value)
                <img src="{{asset("assets/images/logo/{$value->id}.{$value->logo}")}}" alt="" />
                @endforeach
              </a>
              <h5>Welcome back,<br />Please Login to your Account.</h5>
              <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"placeholder="Password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="actions mb-4">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember_pwd">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
  <!-- Container end -->

</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 14:33:36 GMT -->
</html>
