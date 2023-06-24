@include('seller.include.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Return Orders Completed</h1>
            {{-- <a type="button" href="{{ route('seller.complete_order.request') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
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
                                <th>Reason</th>
                                <th>Amount</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($orders as $items)
                            @if ($items->order->return_order == 2)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items['order']['order_date'] }}</td>
                                <td>{{ $items['order']['invoice_number'] }}</td>
                                <td>{{ $items['order']['payment_method'] }}</td>
                                <td>{{ $items['order']['return_reason'] }}</td>
                                <td>{{ $items['order']['amount'] }}/=</td>

                                <td>
                                    @if ($items->order->return_order == 2)
                                    <span class="badge rounded-pill bg-success" style="color: #fff">Done</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger" style="color: #fff">Return</span>
                                    @endif
                                    
                                </td>

                                <td>
                                    <a type="button" class="btn text-info btn-sm btn-circle shadow-sm" href="{{ route('edit.category', $items->id) }}">
                                    <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </a>
                                </td>
                            </tr>
                            @else
                                
                            @endif
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