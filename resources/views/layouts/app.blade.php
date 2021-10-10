<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php foreach ($Meta as $key => $value): ?>
    <meta name="url" content="{{$value->url}}">
    <meta content="{{$value->keyword}}" name="keywords">
    <meta content="{{$value->description}}" name="description">
    <?php foreach (App\Models\Event::All() as $key => $value): ?>
      @if(request()->is('event-details/'.$value->id)==Request::url())
      <meta property="og:url"           content="{{url('event-details/'.$value->id)}}"/>
      <meta property="og:type"          content="website" />
      <meta property="og:title"         content="{{$value->title}}" />
      <meta property="og:description"   content="{!!$value->title!!}" />
      <meta property="og:image"         content="{{asset("assets/images/event/{$value->id}.{$value->image}")}}" />
      
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:site" content="@enternals">
      <meta name="twitter:title" content="{{$value->title}}">
      <meta name="twitter:description" content="{!!$value->title!!}">
      <meta name="twitter:creator" content="@enternals">
      <meta name="twitter:image" content="{{asset("assets/images/event/{$value->id}.{$value->image}")}}">
    
      @endif
    <?php endforeach; ?>

  <?php endforeach; ?>
  <?php foreach ($Setting as $key => $value): ?>
    <link rel="icon" href="{{asset("assets/images/flogo/{$value->id}.{$value->flogo}")}}" sizes="35x35" type="image/png">
  <?php endforeach; ?>
  <title>{{ (isset($title)?$title:"Home") }}</title>
  @include('frontend.components.master-components.css')
</head>
<body>
    <!--//-->
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60178f85c31c9117cb74749a/1ete0h8lu';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <!--//-->
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="104585531465981"
  theme_color="#fa3c4c">
      </div>
      <!--//Page-->
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="6FOVCncx"></script>
  <main>
    @include('frontend.components.master-components.menubar1')
    @include('frontend.components.master-components.menubar2')
    @yield('content')
  </main><!-- Main Wrapper -->
  @include('frontend.components.master-components.footer')
  @include('frontend.components.master-components.js')
</body>
</html>
