
@php
  $featured_products = App\Models\Product::where('featured',1)->orderBy('id','DESC')->get();
@endphp

<section class="section new-arriavls">
    <h3 class="section-title">Featured Products</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

      @foreach ($featured_products as $product)
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
            <!-- /.product-image -->
            
            <div class="product-info text-left">
              <h6><a href="detail.html">{{ $product['category']['category_name'] }}</a></h6>
              <h3 class="name"><a href="{{ url('/product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>

               @if ($product->discount_price == NULL)
                  <div class="product-price"> <span class="price"> {{ $product->product_price }}Tsh</span>
                    <span class="list-unstyled"><a class="add-to-cart" href="{{ route('user.add_product_wishlist',$product->id) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
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
                <input type="hidden" value="1" name="quantity">
                <input type="hidden" value="{{ $product->product_color }}"  name="color">
                <input type="hidden" value="{{ $product->product_size }}"  name="size">
                <button class="px-4 py-1.5 text-white text-sm bg-gray-900 btn-primary rounded">Add To Cart</button>
            </form>
            </div> 
          </div>
          <!-- /.product --> 
          
        </div>
        <!-- /.products --> 
      </div>
      @endforeach
      
      
    </div>
    <!-- /.home-owl-carousel --> 
  </section>