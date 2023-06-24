@include('admin.includes.sidebar')
<div class="main_container">
    @include('admin.includes.notification')
    @php
       
        $order = App\Models\Order::latest()->get();

        $date = date('d F Y');
        $today = App\Models\Order::where('order_date',$date)->sum('amount');

        $month = date('F');
        $monthly = App\Models\Order::where('order_month',$month)->sum('amount');

        $year = date('Y');
        $yearly = App\Models\Order::where('order_year',$year)->sum('amount');

        $order_pending = App\Models\Order::where('order_status','pending')->get();

        $commissins_amount = App\Models\Commission::sum('deducted_amount');

    @endphp
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                   Total Orders 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($order) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Earnings (Monthly) Card Example -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Commisions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                
                                    Tsh.<span class="count">{{ $commissins_amount }}</span>/= 
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sellers
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                        @php
                                            $sellers = App\Models\User::where('role','seller')->latest()->get();
                                        @endphp
                                        <span class="count">{{ count($sellers) }}</span>
                                    </div>
                                </div>
                                <div class="col">
                                   <!--  <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax=""></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Registered Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @php
                                    $customers = App\Models\User::where('role','customer')->latest()->get();
                                @endphp

                                <span class="count">{{ count($customers) }}</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
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
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $items)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $items->order_date }}</td>
                                    <td>{{ $items->invoice_number }}</td>
                                    <td>{{ $items->amount }}/= Tsh</td>
                                    <td>{{ $items->payment_method }}</td>
                                    <td>
                                        <div class="badge rounded-pill bg-light-info text-info w-100">{{ $items->order_status }}</div>
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

{{-- <php include('modals/expenditure-modal.php'); ?>s --}}
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
