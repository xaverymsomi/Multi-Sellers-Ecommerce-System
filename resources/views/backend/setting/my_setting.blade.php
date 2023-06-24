@include('admin.includes.sidebar')
<div class="main_container">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 justify-center">
            <h5 class="text-center">{{ Auth::user()->name }} Setting</h5>
        </div>
    </div>
    <div class="container">
            
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.setting_update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $setting->id }}">
                                <input type="hidden" name="image" value="{{ $setting->logo }}">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Support Contact</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="support_phone" class="form-control" value="{{ $setting->support_phone }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Phones</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="contacts" class="form-control" value="{{ $setting->contacts }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ $setting->email }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Company Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="company_addres" class="form-control" value="{{ $setting->company_addres }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Facebook</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Instagram</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="instagram" class="form-control" value="{{ $setting->instagram }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Youtube</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Capy Right</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="copyright" class="form-control" value="{{ $setting->copyright }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Logo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="logo" class="form-group vms-btn"/>
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
    
@include('admin.includes.footer')