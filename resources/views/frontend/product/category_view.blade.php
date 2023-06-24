@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class='active'>{{ $name_category->category_name }}</li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-3 sidebar'> 
          <!-- ================================== TOP NAVIGATION ================================== -->
          <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
            <nav class="yamm megamenu-horizontal">
                <ul class="nav">
                  @foreach ($categories as $category)
                  <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
                      {{ $category->category_name }}
                    </a>
                    <ul class="dropdown-menu mega-menu">
                      <li class="yamm-content">
                        <div class="row">
                          
                          <div class="col-sm-12 col-md-3">
                            @php
                              $subcategory = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                            @endphp
                            
                            <ul class="links list-unstyled">
                              @foreach ($subcategory as $subcategories)
                              <li><a href="{{ url('/product/subcategory/'.$subcategories->id.'/'.$subcategories->subcategory_slug) }}">{{ $subcategories->subcategory_name }}</a></li>
                              @endforeach
                              </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach
                  </ul>
      
              </nav>
            <!-- /.megamenu-horizontal --> 
          </div>
          
        </div>
        <!-- /.sidebar -->
        <div class="col-xs-12 col-sm-12 col-md-9 rht-col"> 
          <!-- ========================================== SECTION – HERO ========================================= -->
          
               <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-bars"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm">
                <div class="col col-sm-6 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col -->
                <div class="col col-sm-6 col-md-6 no-padding hidden-sm hidden-md">
                  <div class="lbl-cnt"> <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-4 col-xs-6 col-lg-4 text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.col --> 
            </div>
            <!-- /.row --> 
          </div>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">

                    @foreach ($product as $products)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="item">
                          <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> 
                                    <a href="{{ url('/product/details/'.$products->id.'/'.$products->product_slug) }}">
                                       <img src="{{ asset($products->product_image) }}" alt="">
                                    </a>
                                     </div>
                  
                                     @php
                                      $amount = $products->product_price - $products->discount_price;
                                      $discount_price = ($amount / $products->product_price) * 100;
                                    @endphp
                                      @if ($products->discount_price == NULL)
                                      <div class="tag not"><span>New</span></div>
                                      @else
                                      <div class="tag hot"><span>{{ round($discount_price) }}%</span></div>
                                      @endif
                                     
                                  </div>
                                  <div class="product-info text-left">
                                    <h6><a href="">{{ $products['category']['category_name'] }}</a></h6>
                                    <h5 class="name"><a href="{{ url('/product/details/'.$products->id.'/'.$products->product_slug) }}">{{ $products->product_name }}</a></h5>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                  
                                    <div>
                  
                                      @if ($products->seller_id == NULL)
                                      <span class="font-small text-muted">By <a href="">Owner</a></span>
                                      @else
                                      <span class="font-small text-muted">By <a href="">{{ $products['seller']['name'] }}</a></span>
                                      @endif
                                      
                                    </div>
                  
                                    @if ($products->discount_price == NULL)
                                    <div class="product-price"> <span class="price"> {{ $products->product_price }}Tsh</span>
                                      <span class="list-unstyled"><a class="add-to-cart" href="{{ route('user.add_product_wishlist',$products->id) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                        <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                      </span>
                                      </div>
                                    @else
                                    <div class="product-price"> <span class="price"> {{ $products->discount_price }}Tsh</span> <span class="price-before-discount">{{ $products->product_price }}</span>
                                      <span class="list-unstyled"><a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                        <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                      </span>
                                      </div>
                                    @endif
                                    
                                    <div class="product-price">
                                      <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                                        @csrf
                                        <input type="hidden" value="{{ $products->id }}" name="id">
                                        <input type="hidden" value="{{ $products->product_name }}" name="name">
                                        <input type="hidden" value="{{ $products->product_price }}" name="price">
                                        <input type="hidden" value="{{ $products->discount_price }}" name="discount_price">
                                        <input type="hidden" value="{{ $products->product_image }}"  name="image">
                                        <input type="hidden" value="{{ $products->seller_id }}"  name="seller">
                                        <input type="hidden" value="1" name="quantity">
                                        <input type="hidden" value="{{ $products->product_color }}"  name="color">
                                        <input type="hidden" value="{{ $products->product_size }}"  name="size">
                                        <button class="px-4 py-1.5 text-white text-sm bg-gray-900 btn-primary rounded">Add To Cart</button>
                                    </form>
                                    </div>
                                  
                                  </div> 
                            </div>
                            <!-- /.product --> 
                            
                          </div>
                          <!-- /.products --> 
                          </div>
                        </div>
                    @endforeach

                  </div>

                </div>
                
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane "  id="list-container">
                <div class="category-product">
                    
                    @foreach ($product as $seller_products)
                        
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
                                          <button title="Add to cart" class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
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
                <!-- /.category-product --> 
              </div>
              <!-- /.tab-pane #list-container --> 
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container bottom-row">
              <div class="text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right --> 
              
            </div>
            <!-- /.filters-container --> 
            
          </div>
          <!-- /.search-result-container --> 
          
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <div id="brands-carousel" class="logo-slider">
        <div class="logo-slider-inner">
          <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item--> 
          </div>
          <!-- /.owl-carousel #logo-slider --> 
        </div>
        <!-- /.logo-slider-inner --> 
        
      </div>
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container --> 
    
  </div>
@endsection