@extends('template/index')
@section('content')

<div class="content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Absensi</li>
                    </ol>
                </div>
                <h4 class="page-title">Absensi</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  my-2 ">
                        <div class="col-xl-12">
                            <h4 class="header-title">Table Mata Pelajaran <button type="button"
                                    class="btn btn-success float-right "><i class="mdi mdi-plus "></i>
                                    <span>Tambah</span> </button></h4>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Email</th>
                                            <th>Nama Mapel</th>
                                            <th>Nama Tentor</th>
                                            <th>Ruangan</th>
                                            <th>Keterangan</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-bold-500">Randi</td>
                                            <td>randi@gmail.com</td>
                                            <td>Matematika</td>
                                            <td class="text-bold-500">Indri</td>
                                            <td>A22</td>
                                            <td>Absen</td>
                                            <td>27 Desember 2022</td>
                                            <td>System</td>
                                            <td></td>
                                            <td></td>
                                            <td><a href="{{url('admin/detail_mapel')}}" data-toggle="tooltip"
                                                    data-placement="top" title="Detail Mapel"> <i class="bi bi-eye">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-bold-500">Rindi</td>
                                            <td>rindi@gmail.com</td>
                                            <td>Matematika</td>
                                            <td class="text-bold-500">Indri</td>
                                            <td>A22</td>
                                            <td>Absen</td>
                                            <td>27 Desember 2022</td>
                                            <td>System</td>
                                            <td></td>
                                            <td></td>
                                            <td><a href="{{url('admin/detail_mapel')}}" data-toggle="tooltip"
                                                    data-placement="top" title="Detail Mapel"> <i class="bi bi-eye">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end preview-->


                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

    </div>
    <!-- end row-->



    <!-- end row-->

</div> <!-- End Content -->
@endsection