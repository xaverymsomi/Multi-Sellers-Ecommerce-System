<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar">
            <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Dashboard</div>
            <nav class="yamm megamenu-horizontal">
              <ul class="nav">
                <li class="dropdown menu-item">
                   <a href="{{ route('user.profile') }}">
                   <i class="icon fa fa-user"></i> Profile
                   </a>
                </li>
                 <li class="dropdown menu-item">
                    <a href="{{ route('user.change_password') }}">
                    <i class="icon fa fa-lock"></i>Change Password
                    </a>
                 </li>
                 <li class="dropdown menu-item">
                    <a href="{{ route('user.view_order') }}">
                    <i class="icon fa fa-database"></i>Order</a>
                 </li>
                 <li class="dropdown menu-item">
                    <a href="{{ route('user.track_order') }}">
                    <i class="icon fa fa-database"></i>Track Order</a> 
                 </li>
              </ul>
           </nav>
          </div>
        </div>
    