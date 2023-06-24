@php
  $hot_deals = App\Models\Product::where('hot_deals',1)->orderBy('id','DESC')->get();
@endphp

<div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
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
              </div>


            @endforeach

          </div>
          <!-- /.sidebar-widget --> 
        </div>