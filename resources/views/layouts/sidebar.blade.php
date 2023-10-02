<aside class="main-sidebar sidebar-dark-success elevation-1">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link" style="background: linear-gradient(45deg,#204352,#203A43,#DC3545);"> --}}
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('/res/images/appimages/mainlogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">HOME</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Employees
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('goEmp') }}" class="nav-link">
                                <i class="nav-icon fa fa-address-card"></i>
                                <p>
                                    Add Staff
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact-index') }}" class="nav-link">
                                <i class="nav-icon fa fa-birthday-cake"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-wrench"></i>
                        <p>
                            Service Log
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('FirstCall-index') }}" class="nav-link">
                                <i class="nav-icon fa fa-address-card"></i>
                                <p>
                                    Request Entry
                                </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route('contact-index') }}" class="nav-link">
                                <i class="nav-icon fa fa-birthday-cake"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                

                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="nav-icon fas fa-sign-in-alt"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
