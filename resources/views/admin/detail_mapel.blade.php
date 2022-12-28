@extends('layouts/index')
@section('content')


<div class="page-heading">
    <h4><a href="{{url('admin/view_mapel')}}">Mata Pelajaran <i class="bi bi-arrow-right"> </i> <span
                class="text-muted">Detail Mata Pelajaran<span></h4>
</div>
<div class="page-content">
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Detail Mata Pelajaran (Mapel Terpilih)</h4>
                    </div>

                    <div class="card-content">

                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mapel</th>
                                        <th>Kode</th>
                                        <th>Nama Tentor</th>
                                        <th>Status</th>
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
                                        <td class="text-bold-500">Matematika</td>
                                        <td>M022</td>
                                        <td>Anggi</td>
                                        <td class="text-bold-500">Aktif</td>
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
                                        <td class="text-bold-500">Matematika</td>
                                        <td>M022</td>
                                        <td>Budi</td>
                                        <td class="text-bold-500">Aktif</td>
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
                                        <td>3</td>
                                        <td class="text-bold-500">Matematika</td>
                                        <td>M022</td>
                                        <td>Indri</td>
                                        <td class="text-bold-500">Aktif</td>
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