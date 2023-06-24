@include('admin.includes.sidebar')
<div class="main_container">
   <div class="container">
       <div class="main-body">
               <div class="col-lg-8">
                   <div class="card">
                    <div class="card-header">
                        <h4> Edit Coupon </h4>
                    </div>
                       <div class="card-body">
                           <form action="{{ route('update.coupon') }}" class="" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="id" id="" value="{{ $coupons->id }}">
                              <div class="row pt-3">
                                 <div class="col-xl-6 ">
                                    <input type="text" name="coupon_name"  value="{{ $coupons->coupon_name }}" class="form-control">
                                 </div>
                                </div>
                                <div class="row pt-3">
                                 <div class="col-xl-6 mt-2">
                                    <input type="text" name="coupon_discount"  value="{{ $coupons->coupon_discount }}" class="form-control">
                                 </div>
                              </div>
                              <div class="row pt-3">
                                <div class="col-xl-6 mt-2">
                                   <input type="text" name="coupon_validity"  value="{{ $coupons->coupon_validity }}" class="form-control">
                                </div>
                             </div>
                              <div class="row">
                                 <button type="submit" name="add_coupon" class="btn vms-btn">Edit Coupon</button>
                              </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@include('admin.includes.footer')