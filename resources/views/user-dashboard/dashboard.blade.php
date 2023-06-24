@extends('user-dashboard.user_dashboard')
@section('index')
<div class="body-content outer-top-xs">
    
    @include('user-dashboard.components.sidebar')
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              Hellp  {{ Auth::user()->name }} Welcome
            </div>
            <div class="card-body">
              <img src="{{ asset('upload/customerPart/' . $data->image) }}" alt="User Image" class="rounded-circle p-1 " style="width: 120px; height:120px;">
                <p>
                    From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                    manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                </p>
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection