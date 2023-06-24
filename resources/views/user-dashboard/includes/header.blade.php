<header class="header-style-1"> 
    <!-- ============================================== TOP MENU ============================================== -->
     <div class="top-bar animate-dropdown">
       <div class="container">
         <div class="header-top-inner">
           <div class="cnt-account">
             <ul class="list-unstyled">
               
                @auth()
               <li class="myaccount"><a href="{{ route('dashboard') }}"><span>My Account</span></a></li>
               @php
                 $wishlist_product = App\Models\Wishlist::latest()->get();
               @endphp
               <span class="text-warning">{{ count($wishlist_product) }}</span>
               <li class="wishlist"><a href="{{ route('user.wishlist') }}"><span>Wishlist</span></a></li>
               <li class="header_cart hidden-xs"><a href="{{ route('cart.list') }}"><span>My Cart</span></a></li>
               <li class="check"><a href="{{ route('user.checkout') }}"><span>Checkout</span></a></li>
               <li class="check"><a href="{{ route('user.logout') }}"><span>sign out</span></a></li>
               @else
               <li class="login"><a href="{{ route('login') }}"><span>Login</span></a></li>
               <li class="login"><a href="{{ route('register') }}"><span>Register</span></a></li>
               <li class="login"><a href="{{ route('user.blogs') }}"><span>Blog</span></a></li>
               <li class="login"><a href="{{ route('seller.become_seller') }}"><span>Become Seller</span></a></li>
               @endauth
             </ul>
           </div>
           <div class="clearfix"></div>
         </div>
         <!-- /.header-top-inner --> 
       </div>
       <!-- /.container --> 
     </div>
     <!-- /.header-top --> 
     <!-- ============================================== TOP MENU : END ============================================== -->
     <div class="main-header">
       <div class="container">
         <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            @php
              $setting = App\Models\SiteSetting::find(1);
            @endphp
            
             <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"> </a> </div>
             <!-- /.logo --> 
             <!-- ============================================================= LOGO : END ============================================================= --> </div>
           <!-- /.logo-holder -->
           
           <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder"> 
             <!-- /.contact-row --> 
             <!-- ============================================================= SEARCH AREA ============================================================= -->
             <div class="search-area">
              <form action="{{ route('product.search') }}" method="POST">
                @csrf
                <div class="control-group">
                    @php
                        $category = App\Models\Category::orderBy('category_name','ASC')->get();
                    @endphp
                    <ul class="categories-filter animate-dropdown">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
            
                                @foreach ($category as $categories)
                                    <li class="menu-header"><a href="{{ url('/product/category/'.$categories->id.'/'.$categories->category_slug) }}">{{ $categories->category_name }}</a></li>
                                @endforeach
            
                            </ul>
                        </li>
                    </ul>
                    <input class="search-field" id="search" name="search" placeholder="Search here..." />
                </div>
                <div id="searchProduct"></div>
            </form>
            
            {{-- <script type="text/javascript">
                const site_url = "http://127.0.0.1:8000/";
            
                $("body").on("keyup", "#search", function() {
                    let text = $("#search").val();
                    console.log(text);
                });
            </script> --}}
            
             </div>
             <!-- /.search-area --> 
             <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
           <!-- /.top-search-holder -->
           
           <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row"> 
             <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            @auth()
            <div class="dropdown dropdown-cart">
              <a href="{{ route('cart.list') }}" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                <div class="items-cart-inner">
                  <div class="basket">
                  <div class="basket-item-count"><span class="count">{{ Cart::getTotalQuantity()}}</span></div>
                  <div class="total-price-basket"> <span class="lbl">Shopping Cart</span> </div>
                  </div>
                </div> 
            </a>
             {{-- <ul class="dropdown-menu">
               <li>
                 <div class="cart-item product-summary">
                  @foreach ($cartItems as $item)
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="{{ $item->attributes->image }}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index8a95.html?page-detail">{{ $item->name }}</a></h3>
                      <div class="price">{{ $item->price }}</div>
                      
                    </div>
                    <div class="col-xs-1 action">
                      <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <buttont ype="submit" class="icon"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>
                  </div>
                  @endforeach
                   
                 </div>
                 <!-- /.cart-item -->
                 <div class="clearfix"></div>
                 <hr>
                 <div class="clearfix cart-total">
                  
                   <div class="pull-right"> <span class="text"> Total Price :</span><span class='price'>{{ Cart::getTotal() }}/=Tsh</span> </div>
                   <div class="clearfix"></div>
                   <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                 <!-- /.cart-total--> 
                 
               </li>
             </ul> --}}
             <!-- /.dropdown-menu--> 
           </div>
           <!-- /.dropdown-cart --> 
           @else
 
            @endauth 
            
             
             <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
           <!-- /.top-cart-row --> 
         </div>
         <!-- /.row --> 
         
       </div>
       <!-- /.container --> 
       
     </div>
     <!-- /.main-header --> 
     
     <!-- ============================================== NAVBAR ============================================== -->
     <div class="header animate-dropdown">
       <div class="container">
         <div class="row">
           <div class="col-lg-12">
             <div class="yamm navbar navbar-default" role="navigation">
               <ul class="nav navbar-nav">

                @php
                $categories = App\Models\Category::orderBy('category_name','ASC')->get();
              @endphp
                 <li class="dropdown"> <a href="{{ url('/') }}">Home</a> </li>
                 @foreach ($categories as $category)

                 <li class="dropdown"> <a href="{{ url('/product/category/'.$category->id.'/'.$category->category_slug) }}" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">{{ $category->category_name }}</a>
                  @php
                  $subcategory = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                @endphp 
                  <ul class="dropdown-menu pages">
                     <li>
                       <div class="yamm-content">
                         <div class="row">
                           <div class="col-xs-12 col-menu">
                             <ul class="links">
                              @foreach ($subcategory as $subcategories)
                               <li><a href="{{ url('/product/subcategory/'.$subcategories->id.'/'.$subcategories->subcategory_slug) }}">{{ $subcategories->subcategory_name }}</a></li>
                               @endforeach
                             </ul>
                           </div>
                         </div>
                       </div>
                     </li>
                   </ul>
                 </li>
                 @endforeach
                 <li class="dropdown  navbar-right special-menu"> <a href="#">Get 30% off on selected items</a> </li>
               </ul>
             </div>
           </div>
         </div>
       </div>
     </div>
    </header>