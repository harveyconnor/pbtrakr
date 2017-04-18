<header id="topnav">
    <div class="topbar-main">
        <div class="container">
            <div class="topbar-left">
                <a href="{{ url('/') }}" class="logo">
                    <span>PBTrakr.com</span>
                </a>
            </div>
            <div class="menu-extras">
                <ul class="nav navbar-nav pull-right">

                    <li class="nav-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    @if(Auth::check())
                        <li class="nav-item hidden-sm-down">
                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                        <li class="nav-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="@if(Auth::user()->googles->first()->avatar){{ Auth::user()->googles->first()->avatar }}@else{{ asset('img/avatar.png') }}@endif" alt="user" class="img-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">

                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>{{ Auth::user()->first_name." ".Auth::user()->last_name }}</small> </h5>
                                </div>

                                <a href="{{ url('/profile') }}" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                                </a>

                                <a href="{{ url('/logout') }}" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>
                        @else
                        <li class="nav-item nav-link">
                            <a href="{{ url('/login') }}">
                                Login
                            </a>
                        </li>
                        <li class="nav-item nav-link">
                            <a href="{{ url('/register') }}">
                                Register
                            </a>
                        </li>
                        <li class="nav-item"><span>Login</span></li>
                        <li class="nav-item">Register</li>
                        @endif

                </ul>

            </div>
            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li>
                        <a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-collection-text"></i><span> Results </span> </a>
                        <ul class="submenu">
                            <li><a href="{{ url('/results') }}"><i class="fa fa-list"></i> View all</a></li>
                            <li><a href="{{ url('/result/new') }}"><i class="fa fa-plus"></i> Add New</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->