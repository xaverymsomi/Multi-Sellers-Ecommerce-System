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
				<h2 class="heading-title">Track your Order</h2>
				<span class="title-tag inner-top-ss">Please enter your Invoice Number in the box below and press Enter. This was given to you on your receipt and in the confirmation email you should have received. </span>
				<form class="register-form outer-top-xs" role="form" action="{{ route('order.tracking') }}" method="POST">
					@csrf
					<div class="form-group">
						<label class="info-title" for="exampleOrderId1">Invoice Number</label>
						<input type="text" class="form-control unicase-form-control text-input" name="code" required>
					</div>
					  {{-- <div class="form-group">
						<label class="info-title" for="exampleBillingEmail1">Billing Email</label>
						<input type="email" class="form-control unicase-form-control text-input" id="exampleBillingEmail1" >
					</div> --}}
					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Track</button>
				</form>	
			</div>			</div><!-- /.row -->
					</div><!-- /.sigin-in-->
				</div>  
		</div>
          </div>
          <!-- /.sidebar-module-container --> 
        </div>
        
        <br><br>  
@endsection