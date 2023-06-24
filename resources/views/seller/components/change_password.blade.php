@include('seller.include.sidebar')
<div class="main_container">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 justify-center">
            <h5 class="text-center">{{ Auth::user()->name }} Change Password</h5>
        </div>
    </div>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('upload/sellerPart/' . Auth::user()->image) }}" alt="" class="rounded-circle p-1 " width="110">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-secondary mb-1">{{ Auth::user()->username }}</p>
                                    <p class="text-muted font-size-sm">{{ Auth::user()->address }}</p>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('seller.update_password') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show">
                                        {{ $error }}
                                    </p>
                                @endforeach
                            @endif
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Old Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">New Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="newpassword" class="form-control" type="password" id="newpassword">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Confirm Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="confirm_password" class="form-control" type="password" id="confirm_password">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn vms-btn px-4" value="Save Changes" />
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
@include('seller.include.footer')