@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{ route('dashboard') }}">Home</a></li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
    </div>
  </div>
  <div class="body-content outer-top-xs">
    <div class='container'>
        <div class="col-lg-12">
      <div class='row'>
        @include('user-dashboard.components.user-sidebar')
        <div class="col-lg-8">
                <div class="col-lg-4">
                    <div class="track-order-page">
                    <img src="{{ asset('upload/customerPart/' . $data->image) }}" alt="User Image" class="rounded-circle p-1 " style="width: 120px; height:120px;">
                    <div class="">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-secondary mb-1">{{ Auth::user()->username }}</p>
                        <p class="text-muted font-size-sm">{{ Auth::user()->address }}</p>
                        <button class="btn btn-primary">Message</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                           <div class="track-order-page">
                                    <h2 class="heading-title">My Profile</h2>
                                    <form action="{{ route('user.profile_store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="name" class="form-control" value="{{ $data->name }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">User Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="username" class="form-control" value="{{ $data->username }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" name="email" class="form-control" value="{{ $data->email }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="number" name="phone" class="form-control" value="{{ $data->phone }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="address" class="form-control" value="{{ $data->address }}" />
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
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
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
@endsection