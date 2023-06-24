@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-xs-12 col-sm-9 col-md-9 rht-col">
@foreach ($blog_post as $items)
<div class="blog-post outer-top-bd  wow fadeInUp">
	<a href="{{ url('user/blog_details/'.$items->id) }}"><img class="img-responsive" src="{{ asset($items->post_image) }}" alt=""></a>
	<h1><a href="{{ url('user/blog_details/'.$items->id) }}">{{ $items->post_title }}</a></h1>
	<span class="author">{{ $items->blog_category->blog_category_name }}</span>
	<span class="review">6 Comments</span>
	<span class="date-time">{{ $items->created_at }}</span>
	<p>{{ $items->post_short_description }}</p>
	<a href="#" class="btn btn-upper btn-primary read-more">read more</a>
        </div>
@endforeach

<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
						
	<div class="text-right">
         <div class="pagination-container">
	<ul class="list-inline list-unstyled">
		<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
		<li><a href="#">1</a></li>	
		<li class="active"><a href="#">2</a></li>	
		<li><a href="#">3</a></li>	
		<li><a href="#">4</a></li>	
		<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
	</ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->    </div><!-- /.text-right -->

</div><!-- /.filters-container -->				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>		

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{ asset('user-dashboard/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
</div>
				<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Blog Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">
            @foreach ($blogCategory as $blog)
            <div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
	                   {{ $blog->blog_category_name }}
	                </a>
	            </div>
	        </div>
            @endforeach
	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">Tab Widget</h3>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
	  <li><a href="#recent" data-toggle="tab">recent post</a></li>
	</ul>
	<div class="tab-content" style="padding-left:0">
	   <div class="tab-pane active m-t-20" id="popular">
        @foreach ($blog_post_popular as $item)
        <div class="blog-post inner-bottom-30 " >
			<img class="img-responsive" src="{{ asset($item->post_image) }}" alt="">
			<h4><a href="{{ url('user/blog_details/'.$item->id) }}">{{ $item->post_title }}</a></h4>
				<span class="review">6 Comments</span>
			<span class="date-time">{{ $item->created_at->format('d F Y') }}</span>
			<p>{{ $item->post_short_description }}</p>
			
		</div>
        @endforeach
	</div>

	<div class="tab-pane m-t-20" id="recent">
        @foreach ($blog_post_recent as $item)
        <div class="blog-post inner-bottom-30 " >
			<img class="img-responsive" src="{{ asset($item->post_image) }}" alt="">
			<h4><a href="{{ url('user/blog_details/'.$item->id) }}">{{ $item->post_title }}</a></h4>
				<span class="review">6 Comments</span>
			<span class="date-time">{{ $item->created_at->format('d F Y') }}</span>
			<p>{{ $item->post_short_description }}</p>
			
		</div>
        @endforeach
	</div>
	</div>
</div>
</div>
			</div>
		</div>
</div>
<br><br>
@endsection