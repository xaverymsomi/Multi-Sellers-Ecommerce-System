@php
   $products = App\Models\Product::where('product_status', 1)->orderBy('id','ASC')->get();
   $category = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp

<div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
  <div class="more-info-tab clearfix ">
    <h3 class="new-product-title pull-left">New Products</h3>
    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
      <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
      @foreach ($category as $categories)
      <li><a data-transition-type="backSlide" href="#category{{ $categories->id }}" data-toggle="tab">{{ $categories->category_name }}</a></li>  
      @endforeach
      
    </ul>
    <!-- /.nav-tabs --> 
  </div>
  <div class="tab-content outer-top-xs">
    <div class="tab-pane in active" id="all">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
          
          @foreach ($products as $product)

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
                    <div class="tag new"><span>New</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount_price) }}%</span></div>
                    @endif
                   
                </div>
               
                
                <div class="product-info text-left">
                  <h6><a href="detail.html">{{ $product['category']['category_name'] }}</a></h6>
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
                    <span class="list-unstyled"><a class="add-to-cart" href="{{ route('user.add_product_wishlist',$product->id) }}" id="" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                      <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                    </span>
                    </div>
                  @else
                  <div class="product-price"> <span class="price"> {{ $product->discount_price }}Tsh</span> <span class="price-before-discount">{{ $product->product_price }}</span>
                    <span class="list-unstyled"><a class="add-to-cart" href="{{ route('user.add_product_wishlist',$product->id) }}" id="" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                      <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                    </span>
                    </div>
                  @endif
                  
                  <div class="product-price">
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" value="{{ $product->id }}" name="id">
											<input type="hidden" value="{{ $product->product_name }}" name="name">
											<input type="hidden" value="{{ $product->product_price }}" name="price">
											<input type="hidden" value="{{ $product->discount_price }}" name="discount_price">
											<input type="hidden" value="{{ $product->product_image }}"  name="image">
											<input type="hidden" value="{{ $product->seller_id }}"  name="seller">
											<input type="hidden" value="{{ $product->seller_id }}"  name="seller_id">
                      <input type="hidden" value="1" name="quantity">
                      <input type="hidden" value="{{ $product->product_color }}"  name="color">
                      <input type="hidden" value="{{ $product->product_size }}"  name="size">
                      <button class="px-4 py-1.5 text-white text-sm bg-gray-900 btn-primary rounded">Add To Cart</button>
                  </form>
                  </div>
                
                </div>
                
              </div>
              
              
            </div>
            
          </div>

          @endforeach

          
          
 
        </div>
       
      </div>
      
    </div>
   
    @foreach ($category as $categories)

    <div class="tab-pane" id="category{{ $categories->id }}">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

        @php
          $category_product = App\Models\Product::where('category_id', $categories->id)->orderBy('id','DESC')->get();
       @endphp

          @forelse ($category_product as $product)
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> 
                  <a href="detail.html">
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
                    <span class="list-unstyled"><a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                      <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                    </span>
                    </div>
                  @endif
                  
                  <div class="product-price">
                    <button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                  </div>
                
                </div>
                
              </div>
              
              
            </div>
            
          </div>
          @empty
            <h5 class="text-danger"> No Product Found</h5>
          @endforelse
          
        </div>
        <!-- /.home-owl-carousel --> 
      </div>
      <!-- /.product-slider --> 
    </div>
    @endforeach
  
    
  </div>
  <!-- /.tab-content --> 
</div>