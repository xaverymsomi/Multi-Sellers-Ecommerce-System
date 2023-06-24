@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <a type="button" href="{{ route('add.product') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Add New product <i class="fa fa-plus fa-sm"></i>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Discount Price</th>
                                <th>Product Quantity</th>
                                <th>Product Status</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($product as $products)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $products->product_name }}</td>
                                <td><img src="{{ asset($products->product_image) }}" alt="User Image" class="p-1" style="width: 70px; height: 40px;"></td>
                                <td>{{ $products->product_price }}</td>
                                <td>
                                @if ($products->discount_price == NULL)
                                <span class="badge rounded-pill bg-info" style="color: #ffffff">No Discount</span>
                                @else
                                    @php
                                        $amount = $products->product_price - $products->discount_price;
                                        $discount_price = ($amount / $products->product_price) * 100;
                                    @endphp
                                <span class="badge rounded-pill bg-warning" style="color: #ffffff">{{ round($discount_price) }}%</span>

                                @endif
                                </td>

                                <td>{{ $products->product_quanity }}</td>
                                <td>
                                    @if ($products->product_status == 1)
                                        <span class="badge rounded-pill bg-success" style="color: #ffffff">Active</span>
                                    @else
                                       <span class="badge rounded-pill bg-primary" style="color: #ffffff">In-Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a title="Edit" type="button" class="btn text-warning btn-sm btn-circle shadow-sm" href="{{ route('edit.product', $products->id) }}">
                                    <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </a>
                                    <a title="Delete" type="button" class="btn text-danger btn-sm btn-sm btn-circle shadow-sm" href="{{ route('destroy.product', $products->id) }}" id="delete">
                                        <b><i class="fas fa-trash fa-lg"></i></b>
                                    </a>
                                    <a title="Details" type="button" class="btn text-info btn-sm btn-circle shadow-sm" href="{{ route('edit.category', $products->id) }}">
                                        <b><i class="fas fa-eye fa-lg"></i></b>
                                    </a>
                                    @if ($products->product_status == 1)
                                    <a title="inactive" type="button" class="btn text-success btn-sm btn-circle shadow-sm" href="{{ route('inactivate.product', $products->id) }}">
                                        <b><i class="fas fa-database fa-lg"></i></b>
                                    </a>
                                    @else
                                    <a title="active" type="button" class="btn text-primary btn-sm btn-circle shadow-sm" href="{{ route('activate.product', $products->id) }}">
                                        <b><i class="fas fa-database fa-lg"></i></b>
                                    </a>
                                    @endif
                                    
                                </td>
                            </tr>
                            @endforeach

                    </table>
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