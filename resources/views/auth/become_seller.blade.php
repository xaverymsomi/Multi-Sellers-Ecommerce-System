@extends('user-dashboard.user_dashboard')

@section('index')
<div class="body-content outer-top-xs">
   <div class="container">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="row mt-3">
            <div class="body-content">
               <div class="container">
                  <div class="track-order-page">
                     <div class="row">
                        <div class="col-md-12">
                           <h2 class="heading-title">Be one of Our Sellers</h2>
                           <span class="title-tag inner-top-ss">Please enter your details</span>
                           @if (Route::has('seller.login'))
                           <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('seller.login') }}">
                           {{ __('Already have a seller account?') }}
                           </a>
                           @endif
                           <form class="register-form outer-top-xs" role="form" action="{{ route('seller.register') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                 <label class="info-title" for="name">Shop Name</label>
                                 <input type="text" class="form-control unicase-form-control text-input" id="name" name="name">
                              </div>
                              <div class="form-group">
                                 <label class="info-title" for="username">User Name</label>
                                 <input type="text" class="form-control unicase-form-control text-input" id="username" name="username">
                              </div>
                              <div class="form-group">
                                 <label class="info-title" for="email">Email</label>
                                 <input type="email" class="form-control unicase-form-control text-input" id="email" name="email">
                              </div>
                              <div class="form-group">
                                 <label class="info-title" for="phone">Phone Number</label>
                                 <input type="number" class="form-control unicase-form-control text-input" id="phone" name="phone">
                              </div>
                              <div class="form-group">
                                 <label class="info-title" for="seller_join_date">Join Date</label>
                                 <select name="seller_join_date" class="form-control unicase-form-control text-input form-select mb-3" aria-label="Default select example">
                                    <option selected="">Open this select</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label class="info-title" for="password">Password</label>
                                 <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                              </div>
                              <div class="form-group">
                                 <label class="info-title" for="password_confirmation">Confirm Password</label>
                                 <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
                              </div>
                              <div class="form-group">
                                 @if (Route::has('password.request'))
                                 <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                 {{ __('Forgot your password?') }}
                                 </a>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <button type="button" class="btn-upper btn btn-primary checkout-page-button" data-toggle="modal" data-target="#deductionModal">Submit & Register</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!-- /.row -->
                  </div>
               </div>
               <!-- /.container -->
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Deduction Modal -->
<div class="modal fade" id="deductionModal" tabindex="-1" role="dialog" aria-labelledby="deductionModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deductionModalLabel">Deduction Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>By becoming a seller, 2% of all orders in a day received will be deducted from your account on a daily basis.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
@endsection
