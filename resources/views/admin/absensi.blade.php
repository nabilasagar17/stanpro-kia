@extends('layouts/index')
@section('content')


<div class="page-heading">
    <h3><a href="{{url('admin/view_mapel')}}">Absensi</h3>
</div>
<div class="page-content">
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Histori Absensi Siswa</h4>
                    </div>

                    <div class="card-content">

                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
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
                                                data-placement="top" title="Detail Mapel"> <i class="bi bi-eye"> </i>
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
                                                data-placement="top" title="Detail Mapel"> <i class="bi bi-eye"> </i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Striped rows end -->
</div>


@endsection