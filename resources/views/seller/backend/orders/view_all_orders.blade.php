@include('seller.include.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Seller Orders</h1>
            {{-- <a type="button" href="{{ route('add.category') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Add New category <i class="fa fa-plus fa-sm"></i>
            </a> --}}
        </div>
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Payment</th>
                                <th>Amount</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($orders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->order->order_date }}</td>
                                <td>{{ $item->order->invoice_number }}</td>
                                <td>{{ $item->order->payment_method }}</td>
                                <td>
                                    <?php $sellerAmount = 0; ?>
                                    @if ($item->seller_id == Auth::user()->id)
                                        <?php $sellerAmount += $item->price; ?>
                                    @endif
                                    {{ $sellerAmount }}/=
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-success" style="color: #fff">{{ $item->order->order_status }}</span>
                                </td>
                                <td>
                                    @if ($item->order->order_status == 'pending')
                                        <a type="button" class="btn text-info btn-sm btn-circle shadow-sm" href="{{ route('seller.order_details', $item->order_id) }}">
                                            <b><i class="fas fa-eye fa-lg"></i></b>
                                        </a>
                                    @else
                                        <a type="button" class="btn text-info btn-sm btn-circle shadow-sm" href="{{ route('seller.order_details', $item->order_id) }}">
                                            <b><i class="fas fa-eye fa-lg"></i></b>
                                        </a>
                                        <a title="Invoice PDF" type="button" class="btn text-danger btn-sm btn-circle shadow-sm" href="{{ route('seller.invoice_download', $item->order_id) }}">
                                            <b><i class="fas fa-download fa-lg"></i></b>
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