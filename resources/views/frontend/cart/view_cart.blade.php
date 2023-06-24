@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-product-name item">Shop Name</th>
					<th class="cart-qty item">size</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-total last-item">Action</th>
					<th class="cart-romove item">Remove</th>
					<th class="cart-total last-item">Price</th>
				</tr>
			</thead><!-- /thead -->
			@foreach ($cartItems as $item)
			<tbody>
				<tr>
					<td class="cart-image">
						<a class="entry-thumbnail" href="#">
						    <img src="{{ $item->attributes->image }}" alt="">
						</a>
					</td>
					<form action="{{ route('cart.update') }}" method="POST">
						@csrf
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="#">{{ $item->name }}</a></h4>
						<div class="row">
							<div class="col-sm-12">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-12">
								<div class="reviews">
									(06 Reviews)
								</div>
							</div>
						</div><!-- /.row -->
						<div class="cart-product-info">
						<span class="product-color">COLOR:</span><span class="badge rounded-pill bg-danger" style="color: white">{{ $item->attributes->color }}</span>
						</div>
					</td>
					{{-- @php
						$user = App\Models\User::all();
					@endphp
					@if ($item->attributes->seller_id == $user->id)
					<td class="cart-product-edit"><a href="#" class="product-edit">{{ $user->name }}</a></td>
					@else
					@endif --}}
					<td>{{ $item->attributes->seller_name }}</td>
					
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ $item->attributes->size }}</span></td>
					<td class="cart-product-quantity">
                            
						<input type="hidden" name="id" value="{{ $item->id}}" class="" >
						
						<input class="form-control" type="number" name="quantity" style="width: 70px" value="{{ $item->quantity }}"/>
						
					</td>
					<td>
						<button type="submit" class="btn btn-primary">update</button>
					</form>
					</td>
						
				
					<td class="romove-item">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button type="submit" class="icon btn btn-danger">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ $item->price * $item->quantity }}/=</span></td>
				</tr>
			</tbody>
            @endforeach
            <tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs">Clear Carts</button>
								</form>
							</span>
					
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
		</table><!-- /table -->
	</div>
</div>

<div class="col-md-4 col-sm-12 estimate-ship-tax">
{{-- @if (Session::has('coupon'))
	
@else --}}
<div id="couponField">
@if (Session::has('coupon_name'))
	
@else
<table class="table">
	<thead>
		<tr>
			<th>
				<span class="estimate-title">Discount Code</span>
				<p>Enter your coupon code if you have one..</p>
			</th>
		</tr>
	</thead>
	<tbody>
			<tr>
				<td>
					<form action="{{ route('apply.coupon') }}" method="POST">
						@csrf
					<div class="form-group">
						<input type="text" name="coupon_name" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
					</div>
					<div class="clearfix pull-right">
						<button type="submit" class="btn btn-primary">APPLY COUPON</button>
						
					</div>
				</form>
				</td>
			</tr>
	</tbody>
</table>	
@endif
	

</div>
	
{{-- @endif --}}
</div>

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		@if (Session::has('coupon_name'))
			<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						CouponName:<span class="inner-left-md">{{ session()->get('coupon_name') }}</span>
					</div>
					<div class="cart-sub-total">
						Discount Price<span class="inner-left-md">{{ session()->get('discount_amount') }}</span>
					</div>
				</th>
			</tr>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">{{ Cart::getSubTotal() }}/=Tsh</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">{{ Cart::getTotal() }}/=Tsh</span>
					</div>
				</th>
			</tr>
		</thead>
		@else
			<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">{{ Cart::getSubTotal() }}/=Tsh</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">{{ Cart::getTotal() }}/=Tsh</span>
					</div>
				</th>
			</tr>
		</thead>
		@endif
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{ route('user.checkout') }}" type="" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
							{{-- <button type="submit" class="btn btn-primary checkout-btn"></button> --}}
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
		</div>
	
	</div>
	<br>
	<br>
@endsection