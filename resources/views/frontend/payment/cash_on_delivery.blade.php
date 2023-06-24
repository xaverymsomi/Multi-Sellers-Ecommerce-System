@extends('user-dashboard.user_dashboard')
@section('index')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Cash on Delivery</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-xs-12 col-sm-9 col-md-9 rht-col">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Cash on Delivery Payment
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
					<div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
									@if (Session::has('coupon_name'))
									<strong>TotalPrice</strong> <span class="badge bg-danger pull-right"> {{ Cart::getTotal() }}/=Tsh</span>
									@else
									<strong>TotalPrice</strong> <span> {{ Cart::getTotal() }}</span>
									@endif
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
					
				</div>	

			</div>			
		</div>

	</div>

</div>


</div>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 sidebar">

<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<form action="{{ route('cash.order') }}" method="post">
                    @csrf
                    <input type="hidden" name="shipping_name" value="{{ $data['shipping_name'] }}">
                    <input type="hidden" name="shipping_email" value="{{ $data['shipping_email'] }}">
                    <input type="hidden" name="shipping_phone" value="{{ $data['shipping_phone'] }}">
                    <input type="hidden" name="shipping_code" value="{{ $data['shipping_code'] }}">
                    <input type="hidden" name="shipping_address" value="{{ $data['shipping_address'] }}">
                    <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
					<input type="hidden" name="user" value="{{ $data['seller'] }}">
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Make payment</button>
                </form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
@endsection