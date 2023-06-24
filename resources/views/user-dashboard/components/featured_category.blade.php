@php
  $category = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp

 <section class="section featured-product">
    <div class="row">
    <div class="col-lg-3">
      <h3 class="section-title">Featured Categories</h3>
      <div class="image"> 
        <a href="detail.html">
           {{-- <img src="{{ asset('user-dashboard/assets/images/products/p13.jpg') }}" alt=""> --}}
        </a>
        
        </div>
      </div>
      <div class="col-lg-9">
      <div class="owl-carousel homepage-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach ($category as $categories)
        <div class="item item-carousel">
          <div class="products">
            <div class="product">
              <div class="product-image">
                <div class="image"> 
                  {{-- {{ route('category.product',$categories->id) }} --}}
                      <a href="{{ url('/product/category/'.$categories->id.'/'.$categories->category_slug) }}">
                         <img src="{{ $categories->category_image }}" alt="">
                      </a>
                      
                      </div>
              </div>
              
              <div class="product-info text-left">
                <h3 class="name"><a href="{{ url('/product/category/'.$categories->id.'/'.$categories->category_slug) }}">{{ $categories->category_name }}</a></h3>
                @php
                  $products = App\Models\Product::where('category_id',$categories->id)->get();
                @endphp
                <div class="product-price"> <span class="price"> {{ count($products) }} items </span> </div>

                
              </div>
            </div>

            
          </div>

        </div>
        @endforeach
        
      </div>
      </div>
      </div>
      <!-- /.home-owl-carousel --> 
    </section>