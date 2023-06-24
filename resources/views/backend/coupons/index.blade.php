@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Coupons</h1>
            <a type="button" href="{{ route('add.coupon') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Add New Coupon <i class="fa fa-plus fa-sm"></i>
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
                                <th>Coupon Name</th>
                                <th>Coupon Discount</th>
                                <th>Coupon Validity</th>
                                <th>Coupon Status</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $coupon->coupon_name }}</td>
                                <td>{{ $coupon->coupon_discount }}%</td>
                                <td>{{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d F Y')  }}</td>
                                <td>
                                    @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                        <span class="badge rounded-pill bg-info" style="color: #fff">Valid</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger" style="color: #fff">Invalid</span>
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn text-warning btn-sm btn-circle shadow-sm" href="{{ route('edit.coupon', $coupon->id) }}">
                                    <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </a>
                                    <a type="button" class="btn text-danger btn-sm btn-sm btn-circle shadow-sm" href="{{ route('destroy.coupon', $coupon->id) }}" id="delete">
                                        <b><i class="fas fa-trash fa-lg"></i></b>
                                    </a>
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