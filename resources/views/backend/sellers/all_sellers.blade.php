@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Sellers</h1>
            <a type="button" href="{{ route('active.sellers') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Active Seller <i class="fa fa-plus fa-sm"></i>
            </a>
            <a type="button" href="{{ route('inactive.sellers') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                InActive Seller <i class="fa fa-plus fa-sm"></i>
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
                                <th>Shop Name</th>
                                <th>Seller Username</th>
                                <th>Seller Email</th>
                                <th>Join Date</th>
                                <th>Last Seen</th>
                                <th>Seller Status</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($sellers as $seller)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->username }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->seler_join_date }}</td>
                                <td>
                                    @if ($seller->OnlineUsers())
                                        <span class="badge badge-pill badge-success">Is Online</span>
                                    @else
                                    <span class="badge badge-pill badge-dark">{{ Carbon\Carbon::parse($seller->last_seen)->diffForHumans() }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-success">{{ $seller->status }}</span>
                                </td>
                                <td>
                                    <a type="button" class="btn text-warning btn-sm btn-circle shadow-sm" href="{{ route('edit.subcategory', $seller->id) }}">
                                    <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </a>
                                    <a type="button" class="btn text-danger btn-sm btn-sm btn-circle shadow-sm" href="{{ route('destroy.subcategory', $seller->id) }}" id="delete">
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