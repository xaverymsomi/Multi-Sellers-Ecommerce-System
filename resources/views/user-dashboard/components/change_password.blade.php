@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{ route('dashboard') }}">Home</a></li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
         @include('user-dashboard.components.user-sidebar')
        <div class="col-xs-8 col-sm-12 col-md-9 rht-col">
            <div class="body-content">
                <div class="container">
                   <div class="track-order-page">
                      <div class="row">
                         <div class="col-md-12">
                            <h2 class="heading-title">Change Password</h2>
                            <form class="register-form outer-top-xs" role="form" action="{{ route('user.update_password') }}" method="POST">
                                @csrf
                                
                               <div class="form-group">
                                <label for="oldpassword">Current Password</label>
                                <input type="password" class="form-control unicase-form-control text-input" id="oldpassword" name="oldpassword">
                               </div>
                               <div class="form-group">
                                <label for="newpassword">New Password</label>
        <input type="password" class="form-control unicase-form-control text-input" id="newpassword" name="newpassword">
                             </div>
                             <div class="form-group">
                                <label for="confirm_password">Verify</label>
        <input type="password" class="form-control unicase-form-control text-input" id="confirm_password" name="confirm_password">
                             </div>
                               <div class="form-group">
                               <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Save</button>
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
          <!-- /.sidebar-module-container --> 
        </div>
  </div>          
@endsection