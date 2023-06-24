@include('seller.include.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders By Date Reports</h1>
            <a class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm">
                Date: {{ $date }} <i class="fa fa-plus fa-sm"></i>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h1>Report for Date: {{ $date }}</h1>

<h2>Total Sales: Tsh. </h2>
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
        @foreach ($orderItems as $item)
        <tr>
            
            <td>{{ $loop->iteration }}</td>
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
@include('seller.include.footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
