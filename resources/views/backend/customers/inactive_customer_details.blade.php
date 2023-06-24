@include('admin.includes.sidebar')
<div class="main_container">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 justify-center">
            <h5 class="text-center">InActive Customer Details</h5>
        </div>
    </div>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('activate.customer') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $inactive_customer_details->id }}">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ $inactive_customer_details->name }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">User Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="username" class="form-control" value="{{ $inactive_customer_details->username }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0"> Customer Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ $inactive_customer_details->email }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0"> Customer Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" name="phone" class="form-control" value="{{ $inactive_customer_details->phone }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0"> Customer Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control" value="{{ $inactive_customer_details->address }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img src="{{ (!empty($inactive_customer_details->image)) ? 
                                        url('upload/customerPart/'.$inactive_customer_details->image):
                                         url('upload/no_image.jpg') }}" alt="" style="width: 100px; height: 100px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-danger px-4" value="Activate Customer" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.footer')