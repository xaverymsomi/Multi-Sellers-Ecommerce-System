@include('admin.includes.sidebar')
<div class="main_container">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 justify-center">
            <h5 class="text-center">{{ Auth::user()->name }} Profile</h5>
        </div>
    </div>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="" alt="User Image" class="rounded-circle p-1 " width="110">
                                {{-- <img src="{{ $userData->image }}" alt="Admin"  --}}
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-secondary mb-1">{{ Auth::user()->username }}</p>
                                    <p class="text-muted font-size-sm">{{ Auth::user()->address }}</p>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update_profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ $userData->name }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">User Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="username" class="form-control" value="{{ $userData->username }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ $userData->email }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" name="phone" class="form-control" value="{{ $userData->phone }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control" value="{{ $userData->address }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="image" class="form-group vms-btn"/>
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
</div>
@include('admin.includes.footer')