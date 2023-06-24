@include('seller.include.sidebar')

@php
    $id = Auth::user()->id;
    $seller = App\Models\User::find($id);
    $status = $seller->status;

    $sellerName = $seller->name;
    $totalOrders = App\Models\OrderItems::getTotalOrdersForSeller($sellerName);

    $month = date('F');
    $monthly = App\Models\Order::where('order_month',$month)->sum('amount');

    $year = date('Y');
    $yearly = App\Models\Order::where('order_year',$year)->sum('amount');

    $order_pending = App\Models\Order::where('order_status','pending')->get();

    $order = App\Models\Order::orderBy('id','DESC')->get();

    $sellerId = Auth::user()->id;

        $orders = App\Models\OrderItems::with('order', 'product', 'seller')
            ->where('seller_id', $sellerId)
            ->orderBy('id', 'DESC')
            ->get();

@endphp

<div class="main_container">

    @if ($status === 'active')
        <h4>Dear {{ $seller->username }} your Account is <span class="text-success">Active</span></h4>
    @else
        <h4>Dear {{ $seller->username }} your Account is <span class="text-danger">In-Active</span></h4>
        <p class="text-danger"><b>Please wait admin will approve your account</b></p>
    @endif

    @include('seller.include.notification')
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Sales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Tsh.<span class="count">{{ $totalOrders }}</span>/= 
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Earnings (Monthly) Card Example -->

           
           

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="count">{{ count($order_pending) }}</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Orders Summary
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Date</th>
                                        <th>Invoice Number</th>
                                        <th>Payment</th>
                                        <th>Amount</th>                                        
                                        <th>Status</th>
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
                            </tr>
                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>        
        </div>

        {{-- <php include('modals/expenditure-modal.php'); ?>s --}}
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
    </div>
