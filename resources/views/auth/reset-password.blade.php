@extends('user-dashboard.user_dashboard')
@section('index')
<div class="body-content outer-top-xs">
<div class="container">
    <div class="col-md-8">
        <div class="row mt-3">
            <div class="body-content">
                <div class="container">
                   <div class="track-order-page">
                      <div class="row">
                         <div class="col-md-12">
                            <h2 class="heading-title">Reset your Password</h2>
                            <span class="title-tag inner-top-ss">Please enter your Details to reset passord</span>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                        
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                               <div class="form-group">
                                  <label class="info-title" for="exampleOrderId1">Email</label>
                                  <input id="email" class="form-control unicase-form-control text-input" type="email" name="email"
                                   value="{{ $request->email }}" required autofocus autocomplete="username" >
                               </div>
                               <div class="form-group">
                                  <label class="info-title" for="exampleBillingEmail1">Password</label>
                                  <input id="password" class="form-control unicase-form-control text-input" type="password" name="password" required autocomplete="new-password">
                               </div>
                               <div class="form-group">
                               <label for="password_confirmation" >Confirm Password</label>
                               <input id="password_confirmation" class="form-control unicase-form-control text-input"
                               type="password"
                               name="password_confirmation" required autocomplete="new-password">
                               <div class="form-group">
                                
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="margin: 10px">Change</button>
                               </div>
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