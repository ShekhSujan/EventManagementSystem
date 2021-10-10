<section>
  <div class="w-100 pb-120 gray-layer opc9 position-relative">
    <div class="fixed-bg patern-bg" style="background-image: url({{asset("assets/frontend/images/patter-bg1.jpg")}});"></div>
    <div class="container">
      <div class="sec-title btm-icn mb-50 w-100 text-center">
        <div class="sec-title-inner d-inline-block">
          <span class="d-block thm-clr">Read The Latest Blog</span>
          <h2 class="mb-0">Recent Blog</h2>
          <i class=""></i>
        </div>
      </div><!-- Sec Title -->
      <div class="blog-wrap w-100">
        <div class="blog-caro">
          @foreach($allBlog as $value)
          <div class="post-style1 w-100 position-relative">
            <div class="post-meta">
              <span class="post-date thm-clr">{{ date('d', strtotime($value->created_at)) }}<i class="d-block">{{ date('M Y', strtotime($value->created_at)) }}</i></span>
            </div>
            <div class="post-img overflow-hidden position-relative w-100">
              <a href="{{ url('blog-details/'.$value->id.'/'.$value->slug) }}" title=""><img class="img-fluid w-100" src="{{asset("assets/images/blog/thumnails/{$value->id}-{$value->slug}.{$value->image}")}}" alt="Post Image 1"></a>
            </div>
            <div class="post-info w-100">
              <h3 class="mb-0"><a href="{{ url('blog-details/'.$value->id.'/'.$value->slug) }}" title="">{{$value->title}}</a></h3>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- Blog Wrap -->
    </div>
  </div>
</section>
