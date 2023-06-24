@include('seller.include.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products Stock</h1>
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
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($products as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td><img src="{{ asset($item->product_image) }}" alt="User Image" class="p-1" style="width: 70px; height: 40px;"></td>
                                <td>{{ $item->product_price }}</td>
                                <td>
                                @if ($item->discount_price == NULL)
                                <span class="badge rounded-pill bg-info" style="color: #ffffff">No Discount</span>
                                @else
                                    @php
                                        $amount = $item->product_price - $item->discount_price;
                                        $discount_price = ($amount / $item->product_price) * 100;
                                    @endphp
                                <span class="badge rounded-pill bg-warning" style="color: #ffffff">{{ round($discount_price) }}%</span>

                                @endif
                                </td>

                                <td>{{ $item->product_quanity }}</td>
                                <td>
                                    @if ($item->product_status > 0)
                                        <span class="badge rounded-pill bg-success" style="color: #ffffff">Active</span>
                                    @else
                                       <span class="badge rounded-pill bg-primary" style="color: #ffffff">In-Active</span>
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
@include('seller.include.footer')
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