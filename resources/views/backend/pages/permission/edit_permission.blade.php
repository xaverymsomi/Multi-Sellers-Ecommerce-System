@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Edit Permission</h4>
                    </div>
                       <div class="card-body">

                    
                        <form action="{{ route('update.permission') }}" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $permission->id }}">
                            <div class="row">
                               <div class="col-xl-8">
                                  <label for="Permission Name">Permission Name</label>
                                  <input type="text" name="name"  value="{{ $permission->name }}" class="form-control">
                               </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-8">
                                  <label for="Group Name">Group Name</label>
                                  <select name="group_name" class="form-control mb-3" aria-label="Default select example">
                                      <option selected="">Open this select Group</option>
                                      <option value="brand" {{ $permission->group_name == 'brand' ? 'selected': '' }}>Brand</option>
                                      <option value="category" {{ $permission->group_name == 'category' ? 'selected': '' }}>Category</option>
                                      <option value="subCategory" {{ $permission->group_name == 'subCategory' ? 'selected': '' }}>SubCategory</option>
                                      <option value="product" {{ $permission->group_name == 'product' ? 'selected': '' }}>Product</option>
                                      <option value="coupon" {{ $permission->group_name == 'coupon' ? 'selected': '' }}>Coupon</option>
                                      <option value="seller" {{ $permission->group_name == 'seller' ? 'selected': '' }}>Seller</option>
                                      <option value="order" {{ $permission->group_name == 'order' ? 'selected': '' }}>Order</option>
                                      <option value="return Order" {{ $permission->group_name == 'return Order' ? 'selected': '' }}>Return Order</option>
                                      <option value="customer" {{ $permission->group_name == 'customer' ? 'selected': '' }}>Customer</option>
                                      <option value="report" {{ $permission->group_name == 'report' ? 'selected': '' }}>Report</option>
                                      <option value="review" {{ $permission->group_name == 'review' ? 'selected': '' }}>Review Rate</option>
                                      <option value="stock" {{ $permission->group_name == 'stock' ? 'selected': '' }}>Stock</option>
                                      <option value="blog" {{ $permission->group_name == 'blog' ? 'selected': '' }}>Blog</option>
                                      <option value="setting" {{ $permission->group_name == 'setting' ? 'selected': '' }}>Setting</option>
                                      <option value="ads" {{ $permission->group_name == 'ads' ? 'selected': '' }}>Ads</option>
                                      <option value="slider" {{ $permission->group_name == 'slider' ? 'selected': '' }}>Slider</option>
                                      <option value="role" {{ $permission->group_name == 'role' ? 'selected': '' }}>Role</option>
                                      <option value="area" {{ $permission->group_name == 'area' ? 'selected': '' }}>Area</option>
                                      <option value="admin" {{ $permission->group_name == 'admin' ? 'selected': '' }}>Admin</option>
                                  </select>
                              </div>
                           </div>
                            <div class="row mt-3">
                               <button type="submit" name="edit_permission" class="btn vms-btn">Edit Permission</button>
                            </div>
                         </form>


                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')