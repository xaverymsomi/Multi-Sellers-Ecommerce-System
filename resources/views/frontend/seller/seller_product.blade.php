@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#">Store</a></li>
          <li class='active'>Handbags</li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
    </div>
    <!-- /.container --> 
  </div>

  <div>
    <center><h3 class="text-align-center"> <strong>{{ $seller->name }}</strong> </h3></center>
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
          <div class="sidebar-module-container">
            <div class="sidebar-filter"> 
              
                <div class="sidebar-widget  outer-top-vs ">
                <div id="advertisement" class="advertisement">
                  <div class="item">
                    <div class="avatar"><img src="{{ (!empty($seller->image)) ? url('upload/sellerPart/'.$seller->image): url('upload/no_image.jpg') }}" alt="Image"></div>
                    <div class="clients_author">Since {{ $seller->seler_join_date }} <span>{{ $seller->username }}</span> </div>
                    <div class="clients_author">Call us {{ $seller->phone }}</div>
                    <div class="clients_author">Address {{ $seller->address }}</div>
                    <div class="testimonials"><em>"</em> {{ $seller->seller_short_info }} <em>"</em></div>
                  </div> 
                  
                </div>

              </div>
            
            </div>

          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 rht-col"> 
          
          <div>
            <p class="text-primary">We have <strong>{{ count($seller_product) }}</strong> items for you!</p>
          </div>
       
          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"><a data-toggle="tab" href="#list-container"><i class="icon fa fa-bars"></i>List</a></li>
                  </ul>
                </div>

              </div>
              
              <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm">
              </div>
             
            </div>

          </div>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              
              
              <div class="tab-pane active"  id="list-container">
                <div class="category-product">


                    @foreach ($seller_product as $seller_products)
                        
                    <div class="category-product-inner">
                        <div class="products">
                          <div class="product-list product">
                            <div class="row product-list-row">
                              <div class="col col-sm-3 col-lg-3">
                                <div class="product-image">
                                  <div class="image"> <img src="{{ asset($seller_products->product_image) }}" alt=""> </div>
                                </div>

                              </div>

                              <div class="col col-sm-9 col-lg-9">
                                <div class="product-info">
                                  <h3 class="name"><a href="{{ url('/product/details/'.$seller_products->id.'/'.$seller_products->product_slug) }}">{{ $seller_products->product_name }}</a></h3>
                                  <div class="rating rateit-small"></div>
                                    @if ($seller_products->product_price == NULL)
                                    <div class="product-price">
                                        <span class="price"> {{ $seller_products->product_price }} Tsh </span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span class="price"> {{ $seller_products->discount_price }} Tsh </span>
                                        <span class="price-before-discount"> {{ $seller_products->product_price }} </span>
                                    </div>  
                                    @endif
                                    
                                  <div class="description m-t-10">
                                    {{ $seller_products->seller_short_info }}
                                  </div>
                                  <div class="cart clearfix animate-effect">
                                    <div class="action">
                                      <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                          <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                                            @csrf
                                            <input type="hidden" value="{{ $seller_products->id }}" name="id">
                                            <input type="hidden" value="{{ $seller_products->product_name }}" name="name">
                                            <input type="hidden" value="{{ $seller_products->product_price }}" name="price">
                                            <input type="hidden" value="{{ $seller_products->discount_price }}" name="discount_price">
                                            <input type="hidden" value="{{ $seller_products->product_image }}"  name="image">
                                            <input type="hidden" value="{{ $seller_products->seller_id }}"  name="seller">
                                            <input type="hidden" value="1" name="quantity">
                                            <input type="hidden" value="{{ $seller_products->product_color }}"  name="color">
                                            <input type="hidden" value="{{ $seller_products->product_size }}"  name="size">
                                            <button class="px-4 py-1.5 text-white text-sm bg-gray-900 btn-primary rounded">Add To Cart</button>
                                        </form>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('user.add_product_wishlist',$seller_products->id) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                      </ul>
                                    </div>

                                  </div>

                                  
                                </div>

                              </div>

                            </div>

                            @php
							    $amount = $seller_products->product_price - $seller_products->discount_price;
								$discount_price = ($amount / $seller_products->product_price) * 100;
							@endphp
								@if ($seller_products->discount_price == NULL)
									<div class="tag new"><span>New</span></div>
								@else
								    <div class="tag hot"><span>{{ round($discount_price) }}%</span></div>
								@endif

                          </div>

                        </div>

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