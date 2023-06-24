@include('admin.includes.sidebar')
<div class="main_container">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 justify-center">
            <h5 class="text-center">InActive Seller Details</h5>
        </div>
    </div>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('activate.seller') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $inactive_seller_details->id }}">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ $inactive_seller_details->name }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Shop Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="username" class="form-control" value="{{ $inactive_seller_details->username }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0"> Seller Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ $inactive_seller_details->email }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0"> Seller Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" name="phone" class="form-control" value="{{ $inactive_seller_details->phone }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0"> Seller Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control" value="{{ $inactive_seller_details->address }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Seller Join Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" class="form-control" name="seler_join_date" value="{{ $inactive_seller_details->seler_join_date }}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Seller info</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="seller_short_info" rows="3">{{ $inactive_seller_details->seller_short_info }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img src="{{ (!empty($inactive_seller_details->image)) ? 
                                        url('upload/sellerPart/'.$inactive_seller_details->image):
                                         url('upload/no_image.jpg') }}" alt="" style="width: 100px; height: 100px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-danger px-4" value="Activate Seller" />
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