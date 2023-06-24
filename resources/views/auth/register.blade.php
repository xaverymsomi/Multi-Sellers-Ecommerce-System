@extends('user-dashboard.user_dashboard')
@section('index')
<div class="body-content outer-top-xs">
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row mt-3">
                <div class="body-content">
                    <div class="container">
                       <div class="track-order-page">
                          <div class="row">
                             <div class="col-md-12">
                                <h3 class="mb-0">Sign Up</h3>
                                <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Full name">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3">Password</label>
                                        <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Verify</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password (again)" required="">
                                    </div>
                                    <div class="form-group">
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button ml-3">Register</button>
                                    </div>
                                </form>
                             </div>
                          </div>
                          <!-- /.row -->
                       </div>
                    </div>
                    <!-- /.container -->
                 </div>
            </div>
        </div>
    </div>
    </div>
@endsection