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
                        <i class="nav-icon fa-solid fa-house"></i>
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
                                <i class="nav-icon fa-solid fa-person-military-to-person"></i>
                                <p>
                                    Employee List
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('availtechIndex') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-people-group"></i>
                                <p>
                                    Available Technician
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('index_cp') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-key"></i>
                                <p>
                                    Change Password
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
                                <i class="nav-icon fa-brands fa-square-pied-piper"></i>
                                <p>
                                    Call Entry
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gofinalInvoiceIndex') }}" class="nav-link">
                                <i class="nav-icon fa-brands fa-pagelines"></i>
                                <p>
                                    Final Invoice
                                </p>
                            </a>
                        </li>
                        
                    </ul>
                </li>


                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a href="{{ route('lout') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-person-running"></i>
                        <p>
                           Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
