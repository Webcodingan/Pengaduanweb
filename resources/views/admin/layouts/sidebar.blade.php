<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title') | Page </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            @if (Auth::user()->role == 0)
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('/user/pengaduan') }}" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Pengaduan</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu:</h6>
                            <a class="collapse-item" href="{{ url('user/pengaduan') }}">List</a>
                            <a class="collapse-item" href="{{ route('pengaduan.create') }}">Create</a>
                        </div>
                    </div>
                </li>
            @elseif(Auth::user()->role == 1)
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('pengaduan.index') }}" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Pengaduan</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu:</h6>
                            <a class="collapse-item" href="{{ route('pengaduan.index') }}">List</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('laporan') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span> Cetak Laporan</span></a>
                </li>


            @elseif(Auth::user()->role == 2)
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('pengaduan.index') }}" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Pengaduan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Components:</h6>
                            <a class="collapse-item" href="{{ route('pengaduan.create') }}">Create</a>
                            <a class="collapse-item" href="{{ route('pengaduan.index') }}">List</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->

                <!-- Heading -->
                <div class="sidebar-heading">
                </div>
                <!-- Nav Item - Utilities Collapse Menu -->


                <!-- Divider -->



                <!-- Nav Item - Pages Collapse Menu -->
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesTwo"
                        aria-expanded="true" aria-controls="collapsePagesTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Role</span>
                    </a>
                    <div id="collapsePagesTwo" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" href="{{ route('role.create') }}">Create</a>
                            <a class="collapse-item" href="{{ route('role.index') }}">List</a>


                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse"
                        data-target="#collapsePagesThree" aria-expanded="true" aria-controls="collapsePagesThree">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Permission</span>
                    </a>
                    <div id="collapsePagesThree" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" href="{{ route('permission.create') }}">Create</a>
                            <a class="collapse-item" href="{{ route('permission.index') }}">List</a>

                        </div>
                    </div>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('laporan') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span> Cetak Laporan</span></a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{ asset('template/img/undraw_rocket.svg') }}"
                    alt="...">
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Danniel</a>
            </div>

        </ul>
        <!-- End of Sidebar -->
