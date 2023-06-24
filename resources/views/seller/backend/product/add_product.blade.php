@include('seller.include.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr>
                <form action="{{ route('seller.store_product') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-body mt-4">
                    <div class="row">
                       <div class="col-lg-8">
                       <div class="border border-3 p-4 rounded">
                        <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Product Name</label>
                            <input required type="text" name="product_name" class="form-control" id="inputProductTitle" placeholder="Enter product title">
                          </div>
                          
                          <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Product Color</label>
                            <input required type="text" name="product_color" class="form-control visually-hidden" data-role="tagsinput" value="Blue,Pink,White">
                          </div>
  
                          <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Product Size</label>
                            <input required type="text" name="product_size" class="form-control visually-hidden" data-role="tagsinput" value="small,medium,large">
                          </div>
  
                          <div class="mb-3">
                            <label for="inputProductDescription" class="form-label">Description</label>
                            <textarea required class="form-control" name="product_description" id="inputProductDescription" rows="3"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="inputProductDescription" class="form-label">Product Images</label>
                            <input required class="form-control" name="product_image" type="file" id="formFile">
                          </div>
                          <div class="mb-3">
                            <label for="inputProductDescription" class="form-label">Multiple Images</label>
                            <input required class="form-control" name="multi_image[]" type="file" id="formFileMultiple" multiple="">
                          </div>
                        </div>
                       </div>
                       <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                          <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inputPrice" class="form-label">Product Price</label>
                                <input required type="text" class="form-control" name="product_price" id="inputPrice" placeholder="00.00">
                              </div>
                              <div class="col-md-6">
                                <label for="inputCompareatprice" class="form-label">Product Code</label>
                                <input required type="text" name="product_code" class="form-control" id="inputCompareatprice" placeholder="00.00">
                              </div>
                              <div class="col-md-6">
                                <label for="inputCostPerPrice" class="form-label">Product Quantity</label>
                                <input required type="text" name="product_quanity" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                              </div>
                              <div class="col-12">
                                <label for="inputProductType" class="form-label">Product Brand</label>
                                <select required name="brand_id" class="form-control" id="inputProductType">
                                    <option></option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>>
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-12">
                                <label for="inputVendor" class="form-label">Product Category</label>
                                <select required name="category_id" class="form-control" id="inputVendor">
                                    <option></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="col-12">
                                <label for="inputCollection" class="form-label">Product Sub-category</label>
                                <select required name="subcategory_id" class="form-control" id="inputCollection">
                                    <option></option>
                                  </select>
                              </div>  
                              <div class="col-12">
                                <label for="inputProductTags" class="form-label">Product Tags</label>
                                <input required type="text" name="product_tag" class="form-control" id="inputProductTags" placeholder="Enter Product Tags">
                              </div>
                              <div class="col-12">
                                  <div class="d-grid">
                                     <button type="submit" class="btn btn-primary">Save Product</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" 
integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

$(document).ready(function(){
  $('select[name="category_id"]').on('change', function(){
    var category_id = $(this).val();
    if (category_id) {
      $.ajax({
        url: "{{ url('/seller/subcategory/ajax') }}/" + category_id,
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
@include('seller.include.footer')
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
