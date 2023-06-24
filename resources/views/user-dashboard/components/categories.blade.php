
@php
  $blog_category = App\Models\BlogCategory::orderBy('blog_category_name','DESC')->get();
  $blog_post = App\Models\BlogPost::with('blog_category')->orderBy('id','DESC')->get();
@endphp

<section class="section latest-blog outer-bottom-vs">
    <h3 class="section-title">Latest form Blog</h3>
    <div class="blog-slider-container outer-top-xs">
      <div class="owl-carousel blog-slider custom-carousel">

        @foreach ($blog_post as $item)
          <div class="item">
          <div class="blog-post">
            <div class="blog-post-image">
              <div class="image"> <a href="blog.html"><img src="{{ asset($item->post_image) }}" alt=""></a> </div>
            </div>
            <!-- /.blog-post-image -->
            
            <div class="blog-post-info text-left">
              <h3 class="name"><a href="#">{{ $item->post_title }}</a></h3>
              <span class="info">{{ $item->blog_category->blog_category_name }} &nbsp;|&nbsp; {{ $item->created_at->format('d F Y') }} </span>
              <p class="text">{{ $item->post_short_description }}</p>
             </div>
            <!-- /.blog-post-info --> 
            
          </div>
          <!-- /.blog-post --> 
        </div>
        @endforeach
        
      </div>
      <!-- /.owl-carousel --> 
    </div>
    
  </section>