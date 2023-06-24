@extends('user-dashboard.user_dashboard')
@section('index')
<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mt-7" style="font-size: 20px; font-size: 16px;
                line-height: 30px;
                font-weight: 700;
                padding-right: 21px; font-family: 'Open Sans', sans-serif;">
                    Forgot your password? No problem. Just let us know your email <br> address and  
                    we will email you a password reset link that will allow you to choose a new one.
                </h5>
            </div>
            <div class="col-md-8">
                <div class="col-md-6 offset-md-3">
                   <span class="anchor" id="formResetPassword"></span>
                   <hr class="mb-5">
                   <!-- form card reset password -->
                   <div class="card card-outline-secondary">
                      <div class="card-header">
                         <h3 class="mb-0">Password Reset</h3>
                      </div>
                      <div class="card-body">
                         <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" class="form-control" id="email" name="email" :value="old('email')"  required="">
                               <span id="helpResetPasswordEmail" class="form-text small text-muted"> Password reset instructions will be sent to this email address. </span>
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset</button>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
        </div>
    </div>
 </div>
@endsection