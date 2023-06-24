@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Active Customers</h1>
            <a type="button" href="{{ route('customer.manage') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                All Customers <i class="fa fa-plus fa-sm"></i>
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
                                <th>Full Name</th>
                                <th>Customer Username</th>
                                <th>Customer Email</th>
                                <th>Customer Status</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($active_customers as $seller)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->username }}</td>
                                <td>{{ $seller->email }}</td>
                                <td><span class="btn btn-secondary">{{ $seller->status }}</span></td>
                                <td>
                                    <a type="button" class="btn btn-sm vms-btn shadow-sm" href="{{ route('active.customers_details', $seller->id) }}">
                                    Customer Details
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