@include('includes.head')


<!-- sidebar left start-->
<div class="sidebar-left">
    <div class="sidebar-left-info">

        <div class="user-box">
            <div class="d-flex justify-content-center">
                <img src="/syntra/assets/images/users/avatar-1.jpg" alt="" class="img-fluid rounded-circle">
            </div>
            <div class="text-center text-white mt-2">
                <h6>{{ Auth::user()->name }}</h6>
{{--                user type here--}}
                <p class="text-muted m-0">Admin</p>
            </div>
        </div>

        <!--sidebar nav start-->
        <ul class="side-navigation">


            <li>
                <h3 class="navigation-title">Setups</h3>
            </li>

            <li><a href="{{route('user.index')}}"><i class="fa fa-user"></i> <span>Users</span></a>

            </li>
            <li class="menu-list"><a href="javascript:;"><i class="mdi mdi-table"></i> <span>Tables</span></a>
                <ul class="child-list">
                    <li><a href="#"> Basic Table</a></li>

                </ul>
            </li>


        </ul><!--sidebar nav end-->
    </div>
</div><!-- sidebar left end-->

<!-- body content start-->
<div class="body-content">
    <!-- header section start-->
    <div class="header-section">
        <!--logo and logo icon start-->
        <div class="logo">
            <a href="#">
            {{--                    logo for the system below --}}
            {{--                            <span class="logo-img">--}}
            {{--                                <img src="" alt="" height="26">--}}
            {{--                            </span>--}}
            <!--<i class="fa fa-maxcdn"></i>-->
                <span class="brand-name">Hospital MIS</span>
            </a>
        </div>

        <!--toggle button start-->
        <a class="toggle-btn"><i class="ti ti-menu"></i></a>
        <!--toggle button end-->


        <div class="notification-wrap">
            <!--right notification start-->
            <div class="right-notification">
                <ul class="notification-menu">
                    <li>
                        <a href="javascript:;" data-toggle="dropdown">
                            <img src="/syntra/assets/images/users/avatar-1.jpg" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-menu">
                            <a class="dropdown-item" href="#"><i
                                    class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                            <a class="dropdown-item" href="#"><span
                                    class="badge badge-success pull-right">5</span><i
                                    class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i
                                    class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </li>


                </ul>
            </div><!--right notification end-->
        </div>
    </div>
    <!-- header section end-->

    <div class="container-fluid">
        <div class="page-head">
            <h4 class="mt-2 mb-2">Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                       @yield('content')
                    </div>
                </div>
            </div>
        </div><!--end row-->


    </div><!--end container-->

    <!--footer section start-->
    <footer class="footer">
        2018 &copy; Bright G.
    </footer>
    <!--footer section end-->


</div>
<!--end body content-->

@include('includes.footer')
@yield('scripts')
