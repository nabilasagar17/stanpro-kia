<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Aplikasi Stanpro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

    <!-- third party css -->
    <link href="{{asset('hyp/dist/modern/assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('hyp/dist/modern/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('hyp/dist/modern/assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css"
        id="light-style" />
    <link href="{{asset('hyp/dist/modern/assets/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css"
        id="dark-style" />
    <style>
    .img {
        background-color: rgb(300, 300, 300);
    }
    </style>
</head>

<body class="loading" data-layout="detached"
    data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <!-- Topbar Start -->
    @include('template/header')
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu left-side-menu-detached">

                <div class="leftbar-user">
                    <a href="javascript: void(0);">
                        <img src="{{asset('img/user.png')}}" alt="user-image" height="50"
                            class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name">{{Auth::user()->nama}}</span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <ul class="metismenu side-nav">

                    @if(Auth::user()->role == 'admin')
                    <li class="side-nav-title side-nav-item">Dashboard</li>


                    <li class="side-nav-item">
                        <a href="{{url('admin/dashboard')}}" class="side-nav-link">
                            <i class=" uil-home-alt"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-title side-nav-item">Materi & Kelas</li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/view_mapel')}}" class="side-nav-link">
                            <i class=" uil-book-alt"></i>
                            <span> Mata Pelajaran </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/jadwal_mapel')}}" class="side-nav-link">
                            <i class=" uil-clock-eight"></i>
                            <span>Jadwal Mata Pelajaran </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/absensi')}}" class="side-nav-link">
                            <i class=" uil-list-ul"></i>
                            <span>Absensi</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/materi')}}" class="side-nav-link">
                            <i class=" uil-book-open"></i>
                            <span>Materi</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/nilai')}}" class="side-nav-link">
                            <i class="  uil-medal"></i>
                            <span>Nilai SKD & UTBK</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/ruang_kelas')}}" class="side-nav-link">
                            <i class=" uil-home"></i>
                            <span>Ruang Kelas</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/program_belajar')}}" class="side-nav-link">
                            <i class=" uil-clipboard-notes"></i>
                            <span>Program Belajar</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/agenda')}}" class="side-nav-link">
                            <i class="mdi mdi-chart-timeline"></i>
                            <span>Agenda</span>
                        </a>
                    </li>
                    <li class="side-nav-title side-nav-item">User & Account</li>

                    <li class="side-nav-item">
                        <a href="{{url('admin/siswa')}}" class="side-nav-link">
                            <i class=" uil-book-reader"></i>
                            <span>Siswa</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/tentor')}}" class="side-nav-link">
                            <i class=" uil-user-square"></i>
                            <span>Tentor</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/user_management')}}" class="side-nav-link">
                            <i class=" uil-users-alt"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                            class="side-nav-link">
                            <i class=" uil-user"></i>
                            <span>Logout</span>
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @elseif(Auth::user()->role =='tentor')
                    <li class="side-nav-title side-nav-item">Dashboard</li>

                    <li class="side-nav-item">
                        <a href="{{url('admin/dashboard')}}" class="side-nav-link">
                            <i class=" uil-home-alt"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-title side-nav-item">Materi & Kelas</li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/view_mapel')}}" class="side-nav-link">
                            <i class=" uil-book-alt"></i>
                            <span> Mata Pelajaran </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/jadwal_mapel')}}" class="side-nav-link">
                            <i class=" uil-clock-eight"></i>
                            <span>Jadwal Mata Pelajaran </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/absensi')}}" class="side-nav-link">
                            <i class=" uil-list-ul"></i>
                            <span>Absensi</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/materi')}}" class="side-nav-link">
                            <i class=" uil-book-open"></i>
                            <span>Materi</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/nilai_skd')}}" class="side-nav-link">
                            <i class="  uil-medal"></i>
                            <span>Nilai SKD</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/nilai_utbk')}}" class="side-nav-link">
                            <i class="  uil-medal"></i>
                            <span>Nilai UTBK</span>
                        </a>
                    </li>
                    <li class="side-nav-title side-nav-item">User & Account</li>


                    <li class="side-nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                            class="side-nav-link">
                            <i class=" uil-user"></i>
                            <span>Logout</span>
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                    @else
                    <li class="side-nav-title side-nav-item">Dashboard</li>


                    <li class="side-nav-item">
                        <a href="{{url('admin/dashboard')}}" class="side-nav-link">
                            <i class=" uil-home-alt"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-title side-nav-item">Materi & Kelas</li>

                    <li class="side-nav-item">
                        <a href="{{url('admin/jadwal_mapel')}}" class="side-nav-link">
                            <i class=" uil-clock-eight"></i>
                            <span>Jadwal Mata Pelajaran </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('siswa/jadwal_siswa')}}" class="side-nav-link">
                            <i class=" uil-clock-eight"></i>
                            <span>Jadwal Siswa</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('admin/materi')}}" class="side-nav-link">
                            <i class=" uil-book-open"></i>
                            <span>Materi</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{url('admin/nilai')}}" class="side-nav-link">
                            <i class="  uil-medal"></i>
                            <span>Nilai SKD & UTBK</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('siswa/program')}}" class="side-nav-link">
                            <i class=" uil-clipboard-notes"></i>
                            <span>Program Belajar</span>
                        </a>
                    </li>

                    <li class="side-nav-title side-nav-item">User & Account</li>


                    <li class="side-nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                            class="side-nav-link">
                            <i class=" uil-user"></i>
                            <span>Logout</span>
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </ul>


                <!-- End Sidebar -->

                <div class="clearfix"></div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <div class="content-page">
                @yield('content')
                <!-- End Content -->

                <!-- Footer Start -->
                @include('template/footer')
                <!-- end Footer -->

            </div> <!-- content-page -->

        </div> <!-- end wrapper-->
    </div>
    <!-- END Container -->


    <!-- Right Sidebar -->
    <div class="right-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->

            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /Right-bar -->


    <!-- bundle -->
    <script src="{{asset('hyp/dist/modern/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('hyp/dist/modern/assets/js/app.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{asset('hyp/dist/modern/assets/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{asset('hyp/dist/modern/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('hyp/dist/modern/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{asset('hyp/dist/modern/assets/js/pages/demo.dashboard.js')}}"></script>
    <!-- end demo js-->

    <script src="{{asset('modal.js')}}"></script>

</body>

</html>