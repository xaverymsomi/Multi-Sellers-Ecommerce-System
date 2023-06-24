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
        <div class="col-xs-9 col-sm-12 col-md-9 rht-col">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shippin Details</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Shipping Name:</th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Email:</th>
                                    <th>{{ $order->email }}</th>
                                </tr><tr>
                                    <th>Shipping Phone:</th>
                                    <th>{{ $order->phone }}</th>
                                </tr><tr>
                                    <th>Address:</th>
                                    <th>{{ $order->address }}</th>
                                </tr>
                                <tr>
                                    <th>Region:</th>
                                    <th>{{ $order->region->division_name }}</th>
                                </tr><tr>
                                    <th>District:</th>
                                    <th>{{ $order->district->district_name }}</th>
                                </tr><tr>
                                    <th>Province:</th>
                                    <th>{{ $order->state->state_name }}</th>
                                </tr><tr>
                                    <th>Post code:</th>
                                    <th>{{ $order->post_code }}</th>
                                </tr><tr>
                                    <th>Order Date:</th>
                                    <th>{{ $order->order_date }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details
                            <span class="text-danger">Invoice: {{ $order->invoice_number }}</span></h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <th>{{ $order->user->name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <th>{{ $order->user->phone }}</th>
                                </tr><tr>
                                    <th>Payment Type:</th>
                                    <th>{{ $order->payment_method }}</th>
                                </tr><tr>
                                    <th>Transaction ID:</th>
                                    @if ($order->transaction_id == NULL)
                                    <th><span class="text-danger">Unavailable</span></th>
                                    @else
                                        <th>{{ $order->transaction_id }}</th>
                                    @endif
                                    
                                </tr><tr>
                                    <th>Order Amount:</th>
                                    <th>{{ $order->amount }}/=</th>
                                </tr>
                                <tr>
                                    <th>Order Status:</th>
                                    @if ($order->order_status == 'pending')
                                    <th><span class="rounded-pill text-danger">Pending</span></th>
                                    @elseif ($order->order_status == 'confirm')
                                    <th><span class="text-warning">Confirm</span></th>
                                    @elseif ($order->order_status == 'processing')
                                    <th><span class="text-secondary">Processing</span></th>
                                    @elseif ($order->order_status == 'delivered')
                                    <th><span class="text-info">Delivered</span></th>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
          </div>
          <!-- /.sidebar-module-container --> 
        </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-1">
                                <label for="Image">Image</label>
                            </th>
                            <th class="col-md-1">
                                <label for="Product Name">Product Name</label>
                            </th>
                            <th class="col-md-1">
                                <label for="Seller Name">Seller Name</label>
                            </th>
                            <th class="col-md-1">
                                <label for="Product Code">Product Code</label>
                            </th>
                            <th class="col-md-1">
                                <label for="Product Color">Product Color</label>
                            </th>
                            <th class="col-md-1">
                                <label for="Product Size">Product Size</label>
                            </th>
                            <th class="col-md-1">
                                <label for="Image">Quantity</label>
                            </th>
                            <th class="col-md-1">
                                <label for="Image">Product Price</label>
                            </th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach ($orderItems as $item)
                            
                        <tr>
                            <td class="col-md-1">
                                <label for="Image"><img src="{{ asset($item->product->product_image) }}" alt="" style="width: 120px; height: 120px;"></label>
                            </td>
                            <td class="col-md-1">
                                <label for="Product Name">{{ $item->product->product_name }}</label>
                            </td>
                            <td class="col-md-1">
                                @if ($item->seller_id == NULL)
                                <label for="Seller Name">Owner</label>
                                @else
                                <label for="Seller Name">{{ $item->product->seller->name }}</label>
                                @endif
                                
                            </td>
                            <td class="col-md-1">
                                <label for="Product Code">{{ $item->product->product_code }}</label>
                            </td>
                            @if ($item->color == NULL)
                            <td class="col-md-1">
                                <label for="Product Color">No color</label>
                            </td>
                            @else
                            <td class="col-md-1">
                                <label for="Product Color">{{ $item->color }}</label>
                            </td>
                            @endif
                            @if ($item->size == NULL)
                            <td class="col-md-1">
                                <label for="Product Size">No size</label>
                            </td>
                            @else
                            <td class="col-md-1">
                                <label for="Product Size">{{ $item->size }}</label>
                            </td> 
                            @endif
                            
                            <td class="col-md-1">
                                <label for="Image">{{ $item->quantity }}</label>
                            </td>
                            <td class="col-md-1">
                                <label for="Image">{{ $item->price * $item->quantity  }}/=</label>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>

        @if ($order->order_status !== 'delivered')
            
        @else
        @php
            $orders = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
        @endphp
        @if ($orders)
        <form action="{{ route('return.order_reason',$order->id) }}" method="post">
            @csrf
            <div class="form-group" style="font-weight: 600; font-size: initial; color:#000">
                <div class="form-group">
                    <label for="Order Return">Order Return Reason</label>
                    <textarea name="return_reason" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-danger">Order Return</button>
                </div>
            </div>  
        </form>
        @else
            <h5><span class="badge badge-pill badge-danger">Your Already sent a Request</span></h5>
        @endif
        
        @endif
        
    </div>
</div>          


@endsection