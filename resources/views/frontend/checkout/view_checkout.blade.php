@extends('user-dashboard.user_dashboard')
@section('index')

<div class="breadcrumb">
    <div class="container">
       <div class="breadcrumb-inner">
          <ul class="list-inline list-unstyled">
             <li><a href="#">Home</a></li>
             <li class='active'>Checkout</li>
          </ul>
       </div>
       <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
 </div>
 
 <div class="body-content">
<form  action="{{ route('checkout.store') }}" method=" POST">
   @csrf
 <div class="container">
    <div class="checkout-box ">
       <div class="row">
          <div class="col-md-12 rht-col">
             <div class="panel-group checkout-steps" id="accordion">
                <!-- checkout-step-01  -->
                <div class="panel panel-default checkout-step-01">
                   <!-- panel-heading -->
                   <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                         <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                         <span>1</span>Billing Method
                         </a>
                      </h4>
                   </div>

                   
                   <!-- panel-heading -->
                   <div id="collapseOne" class="panel-collapse collapse in">
                      <!-- panel-body  -->
                      <div class="panel-body">
                         <div class="row">
                            <!-- guest-login -->			
                            <div class="col-md-6 col-sm-6 guest-login">
                               
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="shipping_name" id="" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="">Select Region</label>
                                <select name="division_id" class="form-control md-3" id="">
                                    <option value="">--Choose Region--</option>
                                 @foreach ($region as $regions)
                                 <option value="{{ $regions->id }}">{{ $regions->division_name }}</option>
                                 @endforeach
                                    

                                </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="">Select District</label>
                                <select name="district_id" class="form-control md-3" id="">

                                </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="">Select State</label>
                                <select name="state_id" class="form-control md-3" id="">

                                </select>
                                    </div>
                                </div>
                               
                               
                            </div>
                            <!-- guest-login -->
                            <!-- already-registered-login -->
                            <div class="col-md-6 col-sm-6 already-registered-login">
                                  <div class="form-group">
                                     <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                     <input type="text" class="form-control" name="shipping_email" id="" value="{{ Auth::user()->email }}">
                                  </div>
                                  <div class="form-group">
                                     <label class="info-title" for="exampleInputPassword1">Phone Number<span>*</span></label>
                                     <input type="text" class="form-control" name="shipping_phone" id="" value="{{ Auth::user()->phone }}">
                                  </div>
                                  <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                                    <input type="text" class="form-control" name="shipping_code" id="">
                                 </div>
                                 <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1">Address <span>*</span></label>
                                    <input type="text" class="form-control" name="shipping_address" id="" value="{{ Auth::user()->address }}">
                                 </div>
                                  
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-5">
             <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                   <div class="panel panel-default">
                      <div class="panel-heading">
                         <h4 class="unicase-checkout-title">Your Order Progress</h4>
                      </div>
                      <div class="">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Image</th>
                                 <th>Name</th>
                                 <th>Price</th>
                              </tr>
                           </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                <tr class="table-primary">
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="">
                                            <img src="{{ asset($item->attributes->image) }}" style="width: 80px; height: 80px;" alt="">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="">{{ $item->name }}</a></h4>
                                    </td>
                                    <td class="cart-product-grand-total">
                                        <span class="cart-grand-total-price">{{ $item->price*$item->quantity }}/=</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <table class="table no-border">
                            <tbody>
                              Details
                              @if (Session::has('coupon_name'))
                              
                              <tr>
                                 <td class="cart-product-grand-total">
                                     <strong>GrandTotal</strong><span class="inner-left-md">{{ Cart::getTotal() }}/=Tsh</span>
                                 </td>
                             </tr>
                              @else
                              <tr>
                                 
                                 <td class="cart-product-grand-total">
                                    <strong>GrandTotal</strong><span class="inner-left-md">{{ Cart::getTotal() }}/=Tsh</span>
                                 </td>
                             </tr>
                              @endif
                                
                            </tbody>
                        </table>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-5">
            <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                   <div class="panel panel-default">
                      <div class="panel-heading">
                         <h4 class="unicase-checkout-title">Payment Information</h4>
                      </div>
                      <div class="">
                        <div class="row">
                           <div class="col-md-4">
                              <label for="">Card</label>
                              <input type="radio" required name="payment_option" value="card" id="" checked=""  class="form-group">
                           </div>
                           <div class="col-md-4">
                              <label for="">Cash on Delivery</label>
                              <input type="radio" name="payment_option" value="cash" id="" checked="" class="form-group">
                           </div>
                           <div class="col-md-4">
                              <label for="">Online Gateway</label>
                              <input type="radio" name="payment_option" value="online_gateway" id="" checked="" class="form-group">
                           </div>
                           <br><br>
                           <div class="row">
                              <div class="col-md-4">
                              <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Place order</button>
                           </div>
                        </div>
                        </div>
                        </div>
                      </div>
                   </div>
                </div>
             </div>
        </div>
       </div>
      
       <div class="row">
        
       </div>
    </div>
 </div>
</form>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" 
integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

// Show Districts
$(document).ready(function(){
  $('select[name="division_id"]').on('change', function(){
    var division_id = $(this).val();
    if (division_id) {
      $.ajax({
        url: "{{ url('/shipping/district/ajax') }}/" + division_id,
        type: "GET",
        dataType: "json",
        success: function(data){
          $('select[name="district_id"]').html('');
          var d = $('select[name="district_id"]').empty();
          $.each(data, function(key, value) {
            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
          });
        },
      });
    } else {
      alert('danger');
    }
  });
});


// Show State 
$(document).ready(function(){
  $('select[name="district_id"]').on('change', function(){
    var district_id = $(this).val();
    if (district_id) {
      $.ajax({
        url: "{{ url('/shipping/state/ajax') }}/" + district_id,
        type: "GET",
        dataType: "json",
        success: function(data){
          $('select[name="state_id"]').html('');
          var d = $('select[name="state_id"]').empty();
          $.each(data, function(key, value) {
            $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
          });
        },
      });
    } else {
      alert('danger');
    }
  });
});

</script>
@endsection