@extends('template.bootstrap')

@section('content')

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Page</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.valasRead')}}">
            <i class="fa-solid fa-money-bill"></i>
            <span>Valas</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.customerRead')}}">
            <i class="fa-solid fa-people-group"></i>
            <span>Customer</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.transaksiRead')}}">
            <i class="fa-solid fa-bag-shopping"></i>
            <span>Transaction</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{route('auth.handleLogout')}}">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span></a>
        </li>
    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="navbar-brand mb-0 h1">
                            @yield('titleNavigation')
                        </span>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">

                @yield('inner-content')

            </div>

        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright Valas App &copy;</span>
                </div>
            </div>
        </footer>

    </div>
</div>

@endsection
