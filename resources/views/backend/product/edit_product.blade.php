@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product</h5>
                <hr>
                <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <div class="form-body mt-4">
                    <div class="row">
                       <div class="col-lg-8">
                       <div class="border border-3 p-4 rounded">
                        <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Product Name</label>
                            <input required type="text" name="product_name" class="form-control" id="inputProductTitle" value="{{ $product->product_name }}">
                          </div>
                          
                          <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Product Color</label>
                            <input required type="text" name="product_color" class="form-control visually-hidden" data-role="tagsinput" value="{{ $product->product_color }}">
                          </div>
  
                          <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Product Size</label>
                            <input required type="text" name="product_size" class="form-control visually-hidden" data-role="tagsinput" value="{{ $product->product_size }}">
                          </div>
  
                          <div class="mb-3">
                            <label for="inputProductDescription" class="form-label">Description</label>
                            <textarea required class="form-control" name="product_description" id="inputProductDescription" rows="3">{{ $product->product_description }}</textarea>
                          </div>
                        </div>
                       </div>
                       <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                          <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inputPrice" class="form-label">Product Price</label>
                                <input required type="text" class="form-control" name="product_price" id="inputPrice" value="{{ $product->product_price }}">
                              </div>
                              <div class="col-md-6">
                                <label for="inputCompareatprice" class="form-label">Product Code</label>
                                <input required type="text" name="product_code" class="form-control" id="inputCompareatprice" value="{{ $product->product_code }}">
                              </div>
                              <div class="col-md-6">
                                <label for="inputCostPerPrice" class="form-label">Product Quantity</label>
                                <input required type="number" name="product_quanity" class="form-control" id="inputCostPerPrice" value="{{ $product->product_quanity }}">
                              </div>
                              <div class="col-12">
                                <label for="inputProductType" class="form-label">Product Brand</label>
                                <select required name="brand_id" class="form-control" id="inputProductType">
                                    <option></option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>>
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-12">
                                <label for="inputVendor" class="form-label">Product Category</label>
                                <select required name="category_id" class="form-control" id="inputVendor">
                                    <option></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="col-12">
                                <label for="inputCollection" class="form-label">Product Sub-category</label>
                                <select required name="subcategory_id" class="form-control" id="inputCollection">
                                    <option></option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="col-12">
                                <label for="inputCollection" class="form-label">Select Seller</label>
                                <select required name="seller_id" class="form-control" id="inputCollection">
                                    <option></option>
                                    @foreach ($activeSeller as $seller)
                                    <option value="{{ $seller->id }}" {{ $seller->id == $product->seller_id ? 'selected' : '' }}>{{ $seller->name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="col-12">
                                <label for="inputProductTags" class="form-label">Product Tags</label>
                                <input required type="text" name="product_tag" class="form-control" id="inputProductTags" value="{{ $product->product_tag }}">
                              </div>
                              <div class="col-12">
                                  <div class="d-grid">
                                     <button type="submit" class="btn vms-btn">Update Product</button>
                                  </div>
                              </div>
                          </div> 
                      </div>
                      </div>
                   </div><!--end row-->
                </div>
                </form>
                 
            </div>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <div class="page-content">
        <hr>
        <h6 class="mb-0 text-uppercase">Update image</h6>
        <hr>
<div class="card">
    <form action="{{ route('update.product_image') }}" method="post" enctype="multipart/form-data">
    @csrf
<input type="hidden" name="id" value="{{ $product->id }}">
<input type="hidden" name="old_image" value="{{ $product->product_image }}">
    <div class="card-body">
        <div class="mb-3">
            <label for="formFile" class="form-label">Product Image</label>
            <input name="product_image" class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label"></label>
            <img src="{{ asset($product->product_image) }}" alt="" style="width: 100px; height: 100px;">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn vms-btn">Update Image</button>
        </div>
    </div>
</form>
</div>
</div>
</div>
<div class="page-wrapper">
    <div class="page-content">
        <hr>
        <h6 class="mb-0 text-uppercase">Update Multiple Image</h6>
        <hr>
<div class="card">
    <div class="card-body">
        <table class="table mb-0 table-striped">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Image</th>
                    <th scope="col">Change Image</th>
                    <th scope="col">Delete Image</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('update.multi_image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach ($multipleImages as $multipleImage)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td><img src="{{ asset($multipleImage->image_name) }}" alt="" style="width: 100px; height: 100px;"></td>
                        <td><input type="file" class="form-control" name="multi_image[{{ $multipleImage->id }}]" id=""></td>
                        <td>
                            <input type="submit" class="btn text-success btn-sm btn-sm shadow-sm" value="Update Image">
                            
                            <a type="button" class="btn text-danger btn-sm btn-sm shadow-sm" href="{{ route('destroy.multi_image', $multipleImage->id) }}" id="delete">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </form>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" 
integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

$(document).ready(function(){
  $('select[name="category_id"]').on('change', function(){
    var category_id = $(this).val();
    if (category_id) {
      $.ajax({
        url: "{{ url('/subcategory/ajax') }}/" + category_id,
        type: "GET",
        dataType: "json",
        success: function(data){
          $('select[name="subcategory_id"]').html('');
          var d = $('select[name="subcategory_id"]').empty();
          $.each(data, function(key, value) {
            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
          });
        },
      });
    } else {
      alert('danger');
    }
  });
});

</script>
@include('admin.includes.footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                });
            });
    })
</script>
