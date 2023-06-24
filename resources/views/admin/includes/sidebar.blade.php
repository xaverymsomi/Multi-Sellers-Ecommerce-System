@php
    $id = Auth::user()->id;
    $data = App\Models\User::find($id);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Online Business Center">
    <meta name="author" content="Online Business Center">
    <link rel="icon" href="{{ asset('logo/favicon.png') }}" type="image/png">
    <title>OBC | Online Business</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/kvm.css') }}" rel="stylesheet">

    {{-- tooster messages --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

     <!-- Custom styles for this page -->
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--plugins-->
	<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <style type="text/css">
        .bg {
            background-color: #024e5a;
        }
        .vms-btn {
            background-color: #024e5a;
            color: whitesmoke;
            transition: ease-in 0.4s all;
        }
        .vms-btn:hover {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .vms-btn:focus {
            background-color: #024e5a;
            color: whitesmoke;
        }

        .btn-success {
            background-color: #024e5a;
        }

        .kvm-bg {
            background-color: #024e5a;
        }

        .kvm-color {
            color: #024e5a;
        }

        #search_date, #search_exipendture_type {
            cursor: pointer;
        }
        #search_date, #search_exipendture_type:hover {
            color: #04AA6D;
        }

        .form-control{
            border: none;
            border-radius: 0px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #024e5a;
        }
        .form-control: focus{
            outline: none;
            box-shadow: none;
            border: none;
            border-radius: 0px;
            margin-top: 13px;
            margin-bottom: 20px;
            border-bottom: 1px solid #024e5a;
        }

        /*checkbox customization*/
             .checkbox input {
            cursor: pointer;
        }

        .checkbox input[type='checkbox'] {
            display: none;
        }

        .checkbox span {
            background-color: #fff;
            padding: 10px 30px;
            color: #024e5a;
            border-radius: 30px;
            position: relative;
            display: inline-block;
            font-size: 16px;
            user-select: none;
            overflow: hidden;
            transition: 0.5s all;
            border: 1px solid #024e5a;
        }

        .checkbox span:hover {
            background-color: #024e5a;
            padding: 10px 30px;
            color: #fff;
            border-radius: 30px;
            position: relative;
            display: inline-block;
            font-size: 16px;
            user-select: none;
            overflow: hidden;
        }

        .checkbox input[type='checkbox']:checked ~ span {
            background-color: #024e5a;
            box-shadow: 0 2px 10px #024e5a;
            color: #fff;
        }
        /*end checkbox customization*/

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav kvm-bg sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="img-profile rounded-circle" src="{{ asset('logo/logo.jpg') }}" alt="" style="width: 60px;">
                </div>
                <div class="sidebar-brand-text mx-1">OBC</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#home"
                    aria-expanded="true" aria-controls="home">
                    <i class="fas fa-fw fa-building"></i>
                    <span> Home Management</span>
                </a>
                <div id="home" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Home Images:</h6>
                        <a class="collapse-item" href="{{ route('all.brand') }}"> 
                            <i class="fa fa-file text-danger"></i> Brands
                        </a>
                        <a class="collapse-item" href="{{ route('all.slider') }}">
                            <i class="fas text-danger fa-book"></i>
                            <span>Sliders</span></a>
                        <a class="collapse-item" href="{{ route('all.banner') }}">
                            <i class="fas text-danger fa-home"></i>
                            <span>Banners</span></a>
                            <h6 class="collapse-header">Blog management:</h6>
                            <a class="collapse-item" href="{{ route('all.blog_category') }}">
                                <i class="fas text-danger fa-home"></i>
                                <span>Blog Category</span>
                            </a>
                            <a class="collapse-item" href="{{ route('all.blog_post') }}">
                                <i class="fas text-danger fa-home"></i>
                                <span>Blog Posts</span>
                            </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Component"
                    aria-expanded="true" aria-controls="Component">
                    <i class="fas fa-fw fa-users"></i>
                    <span> User Management</span>
                </a>
                <div id="Component" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Management:</h6>
                        <a class="collapse-item" href="{{ route('seller.manage') }}"> 
                            <i class="fa fa-user text-danger"></i> Sellers
                        </a>
                        <a class="collapse-item" href="{{ route('customer.manage') }}">
                            <i class="fa fa-users text-danger"></i> Customers
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rolesandpermission"
                    aria-expanded="true" aria-controls="rolesandpermission">
                    <i class="fas fa-fw fa-database"></i>
                    <span> Roles And Permission </span>
                </a>
                <div id="rolesandpermission" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Permission:</h6>
                        <a class="collapse-item" href="{{ route('users.permission') }}"> 
                            <i class="fa fa-user text-danger"></i> Permission
                        </a>
                        <h6 class="collapse-header">User Role:</h6>
                        <a class="collapse-item" href="{{ route('users.roles') }}">
                            <i class="fa fa-users text-danger"></i> Roles
                        </a>
                        <h6 class="collapse-header">Role in Permission:</h6>
                        <a class="collapse-item" href="{{ route('users.roles.permissions') }}">
                            <i class="fa fa-users text-danger"></i> R&P
                        </a>
                        <a class="collapse-item" href="{{ route('all.roles.permissions') }}">
                            <i class="fa fa-users text-danger"></i>All R And P
                        </a>
                    </div>
                </div>
            </li>

              <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#carcomponent"
                    aria-expanded="true" aria-controls="carcomponent">
                    <i class="fas fa-fw fa-bus"></i>
                    <span>  Product Management  </span>
                </a>
                <div id="carcomponent" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories Management:</h6>
                        <a class="collapse-item" href="{{ route('category.index') }}">
                            <i class="fas fa-fw fa-car text-danger"></i> Category
                        </a>
                        <a class="collapse-item" href="{{ route('sub_category.index') }}">
                            <i class="fas fa-fw fa-wrench text-danger"></i> Sub Category
                        </a>
                        <h6 class="collapse-header">Product Management:</h6>
                        <a class="collapse-item" href="{{ route('product.index') }}">
                            <i class="fa fa-database text-danger"></i> Products
                        </a>
                        <h6 class="collapse-header">Order Management:</h6>
                        <a class="collapse-item" href="{{ route('order.index') }}">
                            <i class="fa fa-database fa-sm text-danger"></i> Order
                        </a>
                        <a href="{{ route('return.order.request') }}" class="collapse-item">
                            <i class="fas fa-gas-pump text-danger"></i> Order Request
                        </a>
                        <h6 class="collapse-header">Stock Management:</h6>
                        <a class="collapse-item" href="{{ route('product.stock') }}">
                            <i class="fa fa-database fa-sm text-danger"></i>Product Stock
                        </a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
               <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#income"
                    aria-expanded="true" aria-controls="Component">
                    <i class="fa fa-fw fa- "></i>
                    <span> Coupon </span>
                </a>
                <div id="income" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <h6 class="collapse-header">Coupon Management:</h6>
                        <a class="collapse-item" href="{{ route('coupon.index') }}"> 
                            <i class="fa fa-database text-danger"></i> Coupon
                        </a>
                        
                        
                        <h6 class="collapse-header">Shipping Area Management:</h6>

                        <a class="collapse-item" href="{{ route('ship.region') }}">
                            <i class="fa fa-ship text-danger"></i> Shipping Region
                        </a>
                        <a class="collapse-item" href="{{ route('ship.district') }}">
                            <i class="fa fa-ship text-danger"></i> Shipping District
                        </a>
                        <a class="collapse-item" href="{{ route('ship.state') }}">
                            <i class="fa fa-ship text-danger"></i> Shipping State
                        </a>

                        <h6 class="collapse-header">Expenditure Management:</h6>
                        <a class="collapse-item" href="expenditure.php"> 
                            <i class="fa fa-money text-danger"></i> Expenditures
                        </a>
                        <a class="collapse-item" href="expenditure-type.php">
                            <i class="fa fa-gears text-danger"></i> Expenditure type
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report"
                    aria-expanded="true" aria-controls="report">
                    <i class="fas fa-fw fa-file"></i>
                    <span> Reports Management</span>
                </a>
                <div id="report" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports Management:</h6>
                        <a class="collapse-item" href="{{ route('admin.report_view') }}"> 
                            <i class="fa fa-file text-danger"></i> Reports
                        </a>
                        <a class="collapse-item" href="{{ route('admin.order.by_user') }}"> 
                            <i class="fa fa-user text-danger"></i> Order By User
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sitesetting"
                    aria-expanded="true" aria-controls="sitesetting">
                    <i class="fas fa-fw fa-users"></i>
                    <span> Setting Management</span>
                </a>
                <div id="sitesetting" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">My Setting:</h6>
                        <a class="collapse-item" href="{{ route('admin.setting') }}"> 
                            <i class="fa fa-user text-danger"></i> Setting
                        </a>
                        {{-- <a class="collapse-item" href="{{ route('deduct.orders') }}"> 
                            <i class="fa fa-house text-danger"></i> Shop Comssion
                        </a> --}}
                        <a class="collapse-item" href="{{ route('shop.orders') }}"> 
                            <i class="fa fa-house text-danger"></i> Today Comssion
                        </a>
                    </div>
                </div>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>
                       

                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ asset('upload/adminPart/' . $data->image) }}">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                    <p class="designattion mb-0">{{ Auth::user()->username }}</p>
                                </div>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.change_password') }}">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change password
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="logs.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    