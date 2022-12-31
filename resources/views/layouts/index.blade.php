<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Stanpro</title>

    <link rel="stylesheet" href="{{asset('mazer/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('mazer/assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('mazer/assets/css/shared/iconly.css')}}">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logos">
                            <a href="index.html">STANPRO</a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                            s

                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Dashboard</li>

                        <li class="sidebar-item  ">
                            <a href="{{url('admin/dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Materi & Kelas</li>

                        <li class="sidebar-item  ">
                            <a href="{{url('admin/view_mapel')}}" class='sidebar-link'>
                                <i class="bi bi-journal-bookmark-fill"></i>
                                <span> Mata Pelajaran</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{url('admin/jadwal_mapel')}}" class='sidebar-link'>
                                <i class="bi bi-clock-fill"></i>
                                <span>Jadwal Mata Pelajaran</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-list-check"></i>
                                <span>Absensi</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{url('admin/absensi_siswa')}}" class='sidebar-link'>
                                        <i class="bi bi-person-lines-fill"></i>
                                        <span>Absensi Siswa</span>
                                    </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{url('admin/absensi_tentor')}}" class='sidebar-link'>
                                        <i class="bi bi-person-lines-fill"></i>
                                        <span>Absensi Tentor</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{url('admin/materi')}}" class='sidebar-link'>
                                <i class="bi bi-book-fill"></i>
                                <span>Materi</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="table.html" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Ruang Kelas</span>
                            </a>
                        </li>


                        <li class="sidebar-title">User &amp; Account</li>

                        <li class="sidebar-item  ">
                            <a href="table.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="table.html" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Tentor</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{url('admin/user_management')}}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>User Management</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="bi bi-people-fill"></i>
                                <span>Logout</span>
                            </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')
        </div>
        @include('layouts/footer')

    </div>
    <script src="{{asset('mazer/assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('mazer/assets/js/app.js')}}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{asset('mazer/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('mazer/assets/js/pages/dashboard.js')}}"></script>



</body>

</html>