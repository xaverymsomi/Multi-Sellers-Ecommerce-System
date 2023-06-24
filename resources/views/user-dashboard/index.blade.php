@extends('user-dashboard.user_dashboard')
@section('index')
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        @php
        $category = App\Models\Category::orderBy('category_name','ASC')->get();
      @endphp
      
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @foreach ($category as $categories)
              <li class="dropdown menu-item">
                <a href="{{ url('/product/category/'.$categories->id.'/'.$categories->category_slug) }}" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
                  {{ $categories->category_name }}
                </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                        @php
                          $subcategory = App\Models\SubCategory::where('category_id',$categories->id)->orderBy('subcategory_name','ASC')->get();
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
  
        </div>
        
        @include('user-dashboard.components.hot_deals')
        @include('user-dashboard.components.special_offer')
       
        <div class="sidebar-widget product-tag">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list"> 
              <a class="item" title="Phone" href="category.html">Phone</a>
              <a class="item active" title="Vest" href="category.html">Vest</a>
              <a class="item" title="Smartphone" href="category.html">Smartphone</a>
              <a class="item" title="Furniture" href="category.html">Furniture</a>
              <a class="item" title="T-shirt" href="category.html">T-shirt</a>
              <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
              <a class="item" title="Sneaker" href="category.html">Sneaker</a>
              <a class="item" title="Toys" href="category.html">Toys</a>
              <a class="item" title="Rose" href="category.html">Rose</a>
            </div>
            <!-- /.tag-list --> 
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>

        @include('user-dashboard.components.special_deals')
        
        
        
      </div>
      
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
       
        @include('user-dashboard.components.slider')
        @include('user-dashboard.components.new_product')
        
        <div class="wide-banners outer-bottom-xs">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            
            <div class="col-md-4 col-sm-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner3.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            
            <!-- /.col -->
            <div class="col-md-4 col-sm-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>

        @include('user-dashboard.components.featured_category')
        
        <div class="wide-banners outer-bottom-xs">
          <div class="row">
            <div class="col-md-8">
              <div class="wide-banner1 cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner.jpg" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">Amazing Sunglasses<br>
                      <span class="shopping-needs">Get 40% off on selected items</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            <div class="col-md-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner4.jpg" alt=""> </div>
                
                
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            
          </div>
          <!-- /.row --> 
        </div>

        @include('user-dashboard.components.categories')
        
        @include('user-dashboard.components.featured_product')

        @include('user-dashboard.components.seller_list')

      </div>
    </div>
    
    
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
      
      </div>
    
    </div>
  
  </div>

</div>

@endsection