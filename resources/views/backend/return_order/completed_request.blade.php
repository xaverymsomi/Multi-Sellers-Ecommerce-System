@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Return Orders</h1>
            <a type="button" href="{{ route('complete.request') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Completed Request <i class="fa fa-plus fa-sm"></i>
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
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Payment</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Order Reason</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($orders as $items)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items->order_date }}</td>
                                <td>{{ $items->invoice_number }}</td>
                                <td>{{ $items->payment_method }}</td>
                                <td>{{ $items->amount }}/=</td>

                                @if ($items->return_order == 1)
                                <td><span class="badge rounded-pill bg-danger" style="color: #fff">Pending</span></td>
                                @elseif ($items->return_order == 2)
                                <td><span class="badge rounded-pill bg-success"style="color: #fff">Success</span></td>
                               @endif
                                
                                <td>{{ $items->return_reason }}</td>
                                <td>
                                    
                                    @if ($items->order_status == 'pending')
                                    <a type="button" class="btn text-info btn-sm btn-circle shadow-sm" href="{{ route('edit.order_detail', $items->id) }}">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                        </a>
                                    @else
                                    <a type="button" class="btn text-info btn-sm btn-circle shadow-sm" href="{{ route('edit.order_detail', $items->id) }}">
                                        <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                        </a>
                                        <a title="Approve" type="button" class="btn text-danger btn-sm btn-circle shadow-sm" href="{{ route('admin.approve_request', $items->id) }}">
                                            <b><i class="fas fa-check fa-lg"></i></b>
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