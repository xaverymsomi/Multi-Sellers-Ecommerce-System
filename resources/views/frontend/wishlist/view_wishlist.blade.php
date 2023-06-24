@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
	<div class="my-wishlist-page">
	   <div class="row">
		  <div class="col-md-12 my-wishlist">
			 <div class="table-responsive">
				<table class="table">
				   <thead>
					  <tr>
						 <th colspan="4" class="heading-title">My Wishlist</th>
					  </tr>
				   </thead>
				   <tbody id="wishlist">
					  @foreach ($mylist as $items)
					  <tr>
						 <td class="col-md-2 col-sm-6 col-xs-6"><img src="{{ asset($items['product']['product_image']) }}" alt="imga"></td>
						 <td class="col-md-7 col-sm-6 col-xs-6">
							<div class="product-name"><a href="#">{{ $items['product']['product_name'] }}</a></div>
							@if ($items['product']['discount_price'] == NULL)
							<div class="product-price">
							   <span class="price"> {{ $items['product']['product_price'] }}Tsh</span>
							</div>
							@else
							<div class="product-price">
							   <span class="price"> {{ $items['product']['discount_price'] }}Tsh</span>
							   @endif
						 </td>
						 <td class="col-md-2 ">
						 @if ($items['product']['product_quanity'] > 0)
						 <a href="#" class="btn-upper btn btn-success">In Stock</a>
						 @else
						 <a href="#" class="btn-upper btn btn-danger">Out Stock</a>
						 @endif
						 </td>
						 <td class="col-md-2 ">
						 <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
						 @csrf
						 <input type="hidden" value="{{ $items->id }}" name="id">
						 <input type="hidden" value="{{ $items->product_name }}" name="name">
						 <input type="hidden" value="{{ $items->product_price }}" name="price">
						 <input type="hidden" value="{{ $items->product_image }}"  name="image">
						 <input type="hidden" value="1" name="quantity">
						 <button class="btn btn-primary rounded">Add To Cart</button>
						 </form>
						 </td>
						 <td class="col-md-1 close-btn">
						 <a href="{{ route('user.remove_wishlist_product', $items->id) }}" title="remove it"><i class="fa fa-trash"></i></a>
						 </td>
					  </tr>
					  @endforeach
				   </tbody>
				</table>
				</div>
			 </div>
		  </div>
		  <!-- /.row -->
	   </div>
	   <!-- /.sigin-in-->
	   <!-- ============================================== BRANDS CAROUSEL ============================================== -->
	</div>
</div>
<br>
<br>
<br>
@endsection