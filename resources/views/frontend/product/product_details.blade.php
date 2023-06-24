@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="#">{{ $product['category']['category_name'] }}</a></li>
				<li class='active'>{{ $product->product_name }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n outer-bottom-xs">
<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
</div>		
  
    
    
    	<!-- ============================================== HOT DEALS ============================================== -->
	<div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
		  @php
  $hot_deals = App\Models\Product::where('hot_deals',1)->orderBy('id','DESC')->get();
@endphp
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
			@foreach ($hot_deals as $product)
                
            <div class="item">
                <div class="products">
                  <div class="hot-deal-wrapper">
                    <div class="image"> 
                        <a href="{{ url('/product/details/'.$product->id.'/'.$product->product_slug) }}">
                            <img src="{{ asset($product->product_image) }}" alt="">
                         </a>
                    </div>

                    <div class="sale-offer-tag">
                        <span>49%<br>off</span>
                    </div>
                    
                  </div>
                  <!-- /.hot-deal-wrapper -->
                  
                  <div class="product-info text-left m-t-20">
                    <h3 class="name"><a href="{{ url('/product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h3>
                    <div class="rating rateit-small"></div>
                    @if ($product->discount_price == NULL)
                  <div class="product-price"> <span class="price"> {{ $product->product_price }}Tsh</span>
                    <span class="list-unstyled"><a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                      <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                    </span>
                    </div>
                  @else
                  <div class="product-price"> <span class="price"> {{ $product->discount_price }}Tsh</span> <span class="price-before-discount">{{ $product->product_price }}</span>
                    <span class="list-unstyled"><a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                      <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                    </span>
                    </div>
                  @endif
                </div>
                <div class="product-price">
					<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
						@csrf
						<input type="hidden" value="{{ $product->id }}" name="id">
						<input type="hidden" value="{{ $product->product_name }}" name="name">
						<input type="hidden" value="{{ $product->product_price }}" name="price">
						<input type="hidden" value="{{ $product->discount_price }}" name="discount_price">
						<input type="hidden" value="{{ $product->product_image }}"  name="image">
						<input type="hidden" value="{{ $product->seller_id }}"  name="seller">
						<input type="hidden" value="{{ $product->seller_id }}"  name="seller_id">
						
						
						<button class="px-4 py-1.5 text-white text-sm bg-gray-900 btn-primary rounded">Add To Cart</button>
					</form>
                </div> 
                </div>
              </div>


            @endforeach
          </div>
          <!-- /.sidebar-widget --> 
        </div>

		<div class="sidebar-widget  outer-top-vs ">
		<div id="advertisement" class="advertisement">

        <div class="item">
        <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->


    </div>
</div>
    
<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
            <div class="detail-block">
				<div class="row">
                
					     <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            @foreach ($multi_image as $image)
            <div class="single-product-gallery-item" id="{{ $image->id }}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($image->image_name) }}">
                    <img class="img-responsive" alt="" src="{{ asset('user-dashboard/assets/images/blank.gif') }}" data-echo="{{ asset($image->image_name) }}" />
                </a>
            </div>
            @endforeach
            

        </div>


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
				@foreach ($multi_image as $image)
                <div class="single-product-gallery-item" id="{{ $image->id }}">
                    <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($image->image_name) }}">
                        <img class="img-responsive" alt="" src="{{ asset('user-dashboard/assets/images/blank.gif') }}" data-echo="{{ asset($image->image_name) }}" />
                    </a>
                </div>
				@endforeach
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{ $product->product_name }}</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
                                <div class="col-lg-12">
									<div class="pull-left">
										<div class="rating rateit-small"></div>
									</div>
									<div class="pull-left">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
										</div>
									</div>
                                    </div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
                                <div class="col-lg-12">
									<div class="pull-left">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="pull-left">
										<div class="stock-box">
                                            @if ($product->product_quanity > 0)
                                            <span class="value"> In Stock </span>
                                            @else
                                            <span class="value"> Stock Out </span>
                                            @endif
											
										</div>	
									</div>
                                    </div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								<p>{{ $product->product_description }}</p>
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-30">
								<div class="row">
									
                                    @php
                                        $amount = $product->product_price - $product->discount_price;
                                        $discount_price = ($amount / $product->product_price) * 100;
                                    @endphp
                                    @if ($product->discount_price == NULL)
                                    <div class="col-sm-6 col-xs-6">
										<div class="price-box">
											<span class="price">{{ $product->product_price }} Tsh</span>
										</div>
									</div>
                                    @else
                                    <div class="col-sm-6 col-xs-6">
										<div class="price-box">
											<span class="price">{{ $product->discount_price }} Tsh</span>
											<span class="price-strike">{{ $product->product_price }}</span>
										</div>
									</div>
                                    @endif
									


									<div class="col-sm-6 col-xs-6">
										<div class="favorite-button m-t-5">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

                            @if ($product->product_size == NULL)
                                
                            @else
							<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
								@csrf
                            <div>
                                <div class="mb-30">
                                    <h3><strong class="mr-10" style="width: 50px"> Size </strong></h3>
                                    <select class="form-control unicase-form-control" name="size" id="size">
                                        <option value="" selected disabled>- - Choose Size - -</option>
                                        @foreach ($product_size as $size)
                                            <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                        @endforeach
                                    </select>
									{{-- <input type="hidden" value="{{ $product->product_size }}"  > --}}

                                </div>
                            </div>
                            @endif

                            @if ($product->product_color == NULL)
                                
                            @else
                            <div>
                                <div class="mb-30">
                                    <h3><strong class="mr-10" style="width: 50px"> Color </strong></h3>
                                    <select class="form-control unicase-form-control" name="color" id="size">
                                        <option value="" selected disabled>- - Choose Color - -</option>
                                        @foreach ($product_color as $color)
                                            <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                        @endforeach
                                    </select>

									{{-- <input type="hidden" value="{{ $product->product_color }}"  name="color"> --}}

                                </div>
                            </div>
                            @endif
                            

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="qty">
										<span class="label">Qty :</span>
									</div>
									
									<div class="qty-count">
										<div class="cart-quantity">
											<div class="quant-input">
												<input type="number" value="1" name="quantity">
											
							              </div>
							            </div>
									</div>

									<div class="add-btn">
										
											<input type="hidden" value="{{ $product->id }}" name="id">
											<input type="hidden" value="{{ $product->product_name }}" name="name">
											<input type="hidden" value="{{ $product->product_price }}" name="price">
											<input type="hidden" value="{{ $product->discount_price }}" name="discount_price">
											<input type="hidden" value="{{ $product->product_image }}"  name="image">
											<input type="hidden" value="{{ $product->seller_id }}"  name="seller">
											<input type="hidden" value="{{ $product->seller_id }}"  name="seller_id">
										<button class="px-4 py-1.5 text-white text-sm bg-gray-900 btn-primary rounded">Add To Cart</button>
										</form>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

                            @if ($product->seller_id == NULL)
                                <h5> Sold By <a href=""><span class="text-info">Owner</span></a></h5>
                            @else
                            <h5> Sold By <a href=""><span class="text-danger">{{ $product['seller']['name'] }} Shop</span></a></h5>
                            @endif
							<hr>
                            <div>
                                <ul class="mr-50">
                                    <li class="mb-5">Brand: <span class="text-danger">{{ $product['brand']['brand_name'] }}</span></li>
                                    <li class="mb-5">Category: <span class="text-danger">{{ $product['category']['category_name'] }}</span></li>
                                    @if ($product->subcategory_id == NULL)
										
									@else
									<li class="mb-5">SubCategory: <span class="text-danger">{{ $product['subcategory']['subcategory_name'] }}</span></li>
									@endif
                                </ul>
                                <ul class="float-start">
                                    <li class="mb-5">Product Code: <span class="text-danger">{{ $product->product_code }}</span></li>
                                    <li class="mb-5">Stock: <span class="text-danger">({{ $product->product_quanity }}) - Item'(s) in Stock</span></li>
                                </ul>
                            </div>
							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs">
					<div class="row">
						<div class="col-sm-12 col-md-3 col-lg-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
								<li><a data-toggle="tab" href="#seller">Seller</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-12 col-md-9 col-lg-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">{{ $product->product_description }}</p>
									</div>	
								{{-- </div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
																										</div>
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													<form class="cnt-form">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane --> --}}

								<div id="seller" class="tab-pane">
									<div class="d-flex mb-30">
										<img src="{{ (!empty($product->seller->image)) ? url('upload/sellerPart/'.$product->seller->image): url('upload/no_image.jpg') }}" alt="">
										<div class="ml-15">
											@if ($product->seller_id == NULL)
											<h4>
												<a href="">Owner</a>
											</h4>
											@else
											<h4>
												<a href="">{{ $product['seller']['name'] }} Shop</a>
											</h4>
											@endif
										</div>
									</div>
									@if ($product->seller_id == NULL)
									<ul class="mb-50">
										<li><img src="{{ asset($product['seller']['image']) }}" alt=""><strong>Address: </strong> <span>Owner</span></li>
										<li><strong>Contacts Seller: </strong> <span>Owner</span></li>
									</ul>
									@else
										<ul class="mb-50">
										<li><img src="{{ asset($product['seller']['image']) }}" alt=""><strong>Address: </strong> <span>{{ $product['seller']['address'] }}</span></li>
										<li><strong>Contacts Seller: </strong> <span>{{ $product['seller']['phone'] }}</span></li>
										<li><strong>Description: </strong>
										<p>{{ $product['seller']['seller_short_info'] }}</p></li>
									</ul>
									@endif
									
								</div>

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div>
			
				<section class="section featured-product">
					<div class="row">
					   <div class="col-lg-3">
						  <h3 class="section-title">Upsell Products</h3>
						  <div class="ad-imgs">
							 <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt="">
							 <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt="">
						  </div>
					   </div>
					   <div class="col-lg-9">
						  <div class="owl-carousel homepage-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
							
							@foreach ($related_product as $product)
							<div class="item item-carousel">
								<div class="products">
								  <div class="product">
									<div class="product-image">
									  <div class="image"> 
									  <a href="{{ url('/product/details/'.$product->id.'/'.$product->product_slug) }}">
										 <img src="{{ asset($product->product_image) }}" alt="">
									  </a>
									   </div>
					
									   @php
										$amount = $product->product_price - $product->discount_price;
										$discount_price = ($amount / $product->product_price) * 100;
									  @endphp
										@if ($product->discount_price == NULL)
										<div class="tag not"><span>New</span></div>
										@else
										<div class="tag hot"><span>{{ round($discount_price) }}%</span></div>
										@endif
									   
									</div>
								   
									
									<div class="product-info text-left">
									  <h6><a href="#">{{ $product['category']['category_name'] }}</a></h6>
									  <h5 class="name"><a href="{{ url('/product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h5>
									  <div class="rating rateit-small"></div>
									  <div class="description"></div>
					
									  <div>
					
										@if ($product->seller_id == NULL)
										<span class="font-small text-muted">By <a href="">Owner</a></span>
										@else
										<span class="font-small text-muted">By <a href="">{{ $product['seller']['name'] }}</a></span>
										@endif
										
									  </div>
					
									  @if ($product->discount_price == NULL)
									  <div class="product-price"> <span class="price"> {{ $product->product_price }}Tsh</span>
										<span class="list-unstyled"><a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
										  <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
										</span>
										</div>
									  @else
									  <div class="product-price"> <span class="price"> {{ $product->discount_price }}Tsh</span> <span class="price-before-discount">{{ $product->product_price }}</span>
										<span class="list-unstyled"><a class="add-to-cart" href="{{ route('user.add_product_wishlist',$product->id) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
										  <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
										</span>
										</div>
									  @endif
									  
									  <div class="product-price">
										<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
											@csrf
											<input type="hidden" value="{{ $product->id }}" name="id">
											<input type="hidden" value="{{ $product->product_name }}" name="name">
											<input type="hidden" value="{{ $product->product_price }}" name="price">
											<input type="hidden" value="{{ $product->product_image }}"  name="image">
											<input type="hidden" value="1" name="quantity">
											<button class="px-4 py-1.5 text-white text-sm bg-gray-900 btn-primary rounded">Add To Cart</button>
										</form>
									  </div>
									
									</div>
									
								  </div>
								  
								  
								</div>
								
							  </div>
							@endforeach
							
						  <!-- /.home-owl-carousel -->
					   </div>
					</div>
				 </section>
			
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
	
</div>
</div>

@endsection