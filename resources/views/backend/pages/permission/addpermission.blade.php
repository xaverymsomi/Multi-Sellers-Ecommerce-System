@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Add Permission</h4>
                    </div>
                       <div class="card-body">
                           <form action="{{ route('store.permission') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-xl-8">
                                    <label for="Permission Name">Permission Name</label>
                                    <input type="text" name="name"  placeholder="Permission name" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                <div class="col-xl-8">
                                    <label for="Group Name">Group Name</label>
                                    <select name="group_name" class="form-control mb-3" aria-label="Default select example">
                                        <option selected="">Open this select Group</option>
                                        <option value="brand">Brand</option>
                                        <option value="category">Category</option>
                                        <option value="subCategory">SubCategory</option>
                                        <option value="product">Product</option>
                                        <option value="coupon">Coupon</option>
                                        <option value="seller">Seller</option>
                                        <option value="order">Order</option>
                                        <option value="return Order">Return Order</option>
                                        <option value="customer">Customer</option>
                                        <option value="report">Report</option>
                                        <option value="review">Review Rate</option>
                                        <option value="stock">Stock</option>
                                        <option value="blog">Blog</option>
                                        <option value="setting">Setting</option>
                                        <option value="ads">Ads</option>
                                        <option value="slider">Slider</option>
                                        <option value="role">Role</option>
                                        <option value="area">Area</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                             </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_permission" class="btn vms-btn">Add Permission</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')