@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card pt-4 mt-3">
                    <div class="card-header">
                        <h4>Add Coupon</h4>
                    </div>
                       <div class="card-body">
                           <form action="{{ route('store.coupon') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                <div class="col-xl-6 ">
                                <label for="Coupon Name">Coupon Name</label>
                                   <input type="text" name="coupon_name" class="form-control">
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-xl-6 ">
                                <label for="Coupon Name">Coupon Discount(%)</label>
                                   <input type="text" name="coupon_discount"  class="form-control">
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-xl-6 ">
                                <label for="Coupon Name">Coupon Validity</label>
                                   <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>
                             </div>
                              <div class="row mt-3">
                                 <button type="submit" name="add_coupon" class="btn vms-btn">Add coupon</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')