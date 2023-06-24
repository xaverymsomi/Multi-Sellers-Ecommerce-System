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
                            <h2 class="heading-title">Login in Your Account</h2>
                            <span class="title-tag inner-top-ss">Please enter your Details and then login</span>
                            <form class="register-form outer-top-xs" role="form" action="{{ route('login') }}" method="POST">
                                @csrf
                               <div class="form-group">
                                  <label class="info-title" for="exampleOrderId1">Email</label>
                                  <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" >
                               </div>
                               <div class="form-group">
                                  <label class="info-title" for="exampleBillingEmail1">Password</label>
                                  <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                               </div>
                               <div class="form-group">
                               @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </a>
                               <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
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
@endsection