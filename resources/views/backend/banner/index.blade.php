@include('admin.includes.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Banners</h1>
            <a type="button" href="{{ route('add.banner') }}" class="d-none d-sm-inline-block btn vms-btn btn-sm shadow-sm" >
                Add New Banner <i class="fa fa-plus fa-sm"></i>
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
                                <th>Banner Title</th>
                                <th>Banner URL</th>
                                <th>Banner Image</th>
                                <th>Action</th>
                            </tr>  
                        </thead>
                        <tbody>

                            @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $banner->banner_title }}</td>
                                <td>{{ $banner->banner_url }}</td>
                                <td><img src="{{ asset($banner->banner_image) }}" alt="User Image" class="p-1" style="width: 50px; height: 50px;"></td>
                                <td>
                                    <a type="button" class="btn text-warning btn-sm btn-circle shadow-sm" href="{{ route('edit.banner', $banner->id) }}">
                                    <b><i class="fas fa-pencil-alt fa-lg"></i></b>
                                    </a>
                                    <a type="button" class="btn text-danger btn-sm btn-sm btn-circle shadow-sm" href="{{ route('destroy.banner', $banner->id) }}" id="delete">
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