<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title> OBC | Online Business Center </title>


<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('user-dashboard/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
  
  @include('user-dashboard.includes.header')

  {{-- @yield('index') --}}

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

  @include('user-dashboard.includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('user-dashboard/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/jquery.rateit.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('user-dashboard/assets/js/scripts.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
     case 'info':
     toastr.info(" {{ Session::get('message') }} ");
     break;
 
     case 'success':
     toastr.success(" {{ Session::get('message') }} ");
     break;
 
     case 'warning':
     toastr.warning(" {{ Session::get('message') }} ");
     break;
 
     case 'error':
     toastr.error(" {{ Session::get('message') }} ");
     break; 
  }
  @endif 
 </script>

  <script type="text/javascript">
    function AddToWishlist(product_id){
      $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/add-to-wishlist/"+product_id,

        success:function(data){
          Wishlist();
          const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success,
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    }
  </script>

<script type="text/javascript">
  function Wishlist(){
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/user/wishlist/get_all_list",

      success:function(response){
        $(#wishQty).text(response.wishQuantity);
        var rows = ""
        $.each(response.wishlist, function (key, value) {
          rows += `
          
          `
        });
        $(#wishlist).html(rows);
      }
    })
  }
  Wishlist();

  function RemoveWishlistProduct(id){
      $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/remove_product_wishlist/"+id,

        success:function(data){

          Wishlist();
          const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success,
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    }

</script>


{{-- Apply coupon code --}}
{{-- <script type="text/javascript">
    function applyCoupon(){
      var coupon_name = $('#coupon_name').val();
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {coupon_name:coupon_name},
        url: "/coupon_apply",

        success:function(data){

          if (data.validity == true) {
            $('#couponField').hide();
          }

          const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success,
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error,
            })
          }
        }
      })
    } --}}
{{-- </script> --}} 

</body>

</html>