@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders Details</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h4>Shippin Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table" style="background: #f4f6fa">
                                <tr>
                                    <th>Shipping Name:</th>
                                    <td>{{ $order->name }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Email:</th>
                                    <td>{{ $order->email }}</td>
                                </tr><tr>
                                    <th>Shipping Phone:</th>
                                    <td>{{ $order->phone }}</td>
                                </tr><tr>
                                    <th>Address:</th>
                                    <td>{{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <th>Region:</th>
                                    <td>{{ $order->region->division_name }}</td>
                                </tr><tr>
                                    <th>District:</th>
                                    <td>{{ $order->district->district_name }}</td>
                                </tr><tr>
                                    <th>Province:</th>
                                    <td>{{ $order->state->state_name }}</td>
                                </tr><tr>
                                    <th>Post code:</th>
                                    <td>{{ $order->post_code }}</td>
                                </tr><tr>
                                    <th>Order Date:</th>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details
                        <span class="text-danger">Invoice: {{ $order->invoice_number }}</span></h4>
                    </div>
                    <div class="card-body">
                        <table class="table" style="background: #add">
                            <tr>
                                <th>Name:</th>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $order->user->phone }}</td>
                            </tr><tr>
                                <th>Payment Type:</th>
                                <td>{{ $order->payment_method }}</td>
                            </tr><tr>
                                <th>Transaction ID:</th>
                                @if ($order->transaction_id == NULL)
                                <td><span class="text-danger">Unavailable</span></td>
                                @else
                                    <td>{{ $order->transaction_id }}</td>
                                @endif
                                
                            </tr>
                            <tr>
                                <th>Order Amount:</th>
                                <td>{{ $order->amount }}/=</td>
                            </tr>
                            <tr>
                                <th>Order Status:</th>
                                @if ($order->order_status == 'pending')
                                <td><span class="badge rounded-pill bg-danger" style="color: #fff">Pending</span></td>
                                @elseif ($order->order_status == 'confirm')
                                <td><span class="badge rounded-pill bg-warning" style="color: #fff">Confirm</span></td>
                                @elseif ($order->order_status == 'processing')
                                <td><span class="badge rounded-pill bg-info" style="color: #fff">Processing</span></td>
                                @elseif ($order->order_status == 'delivered')
                                <td><span class="badge rounded-pill bg-success" style="color: #fff">Delivered</span></td>
                                @endif
                            </tr>
                            <tr>
                                <th>Action</th>
                                @if ($order->order_status == 'pending')
                                <td><a href="{{ route('confirmed.order',$order->id) }}" class="btn btn-block btn-danger">Confirm Order</a></td>
                                @elseif ($order->order_status == 'confirm')
                                
                                <td><a href="{{ route('processed.order',$order->id) }}" class="btn btn-block btn-warning">Processing Order</a></td>
                                @elseif ($order->order_status == 'processing')
                                <td><a href="{{ route('delivered.order',$order->id) }}" class="btn btn-block btn-info">Delivered Order</a></td>
                                @elseif ($order->order_status == 'delivered')
                                <td><span class="badge rounded-pill bg-success"><i class="lni lni-emoji-happy"></i></span></td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
            <div class="col">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th class="col-md-1">
                                        <label for="Image">Image</label>
                                    </th>
                                    <th class="col-md-2">
                                        <label for="Product Name">Product Name</label>
                                    </th>
                                    <th class="col-md-2">
                                        <label for="Seller Name">Seller Name</label>
                                    </th>
                                    <th class="col-md-2">
                                        <label for="Product Code">Product Code</label>
                                    </th>
                                    <th class="col-md-2">
                                        <label for="Product Color">Product Color</label>
                                    </th>
                                    <th class="col-md-2">
                                        <label for="Product Size">Product Size</label>
                                    </th>
                                    <th class="col-md-1">
                                        <label for="Image">Quantity</label>
                                    </th>
                                    <th class="col-md-3">
                                        <label for="Image">Product Price</label>
                                    </th>
                                </tr>
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
            </div>
        </div>
    </div>
</div>
@include('admin.includes.footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                });
            });
    })
</script>