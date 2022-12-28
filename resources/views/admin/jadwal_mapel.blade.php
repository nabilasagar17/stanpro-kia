@extends('layouts/index')
@section('content')


<div class="page-heading">
    <h3>Mata Pelajaran</h3>
</div>
<div class="page-content">
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Master Mata Pelajaran</h4>
                    </div>

                    <div class="card-content">

                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Mapel</th>
                                        <th>Jadwal</th>
                                        <th>Ruangan </th>
                                        <th>Tentor</th>
                                        <th>Kuota</th>
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
                                        <td>M022</td>
                                        <td class="text-bold-500">Matematika</td>
                                        <td>Selasa, Pukul 12.00 WIB</td>
                                        <td>A02</td>
                                        <td>Ainun</td>
                                        <th>20 Siswa
                                        <th>
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
                                        <td>B002</td>
                                        <td class="text-bold-500">B.Ingris</td>
                                        <td>Rabu, Pukul 12.00 WIB</td>
                                        <td>A02</td>
                                        <td>Ainun</td>
                                        <th>20 Siswa
                                        <th>
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
                                        <td>I002</td>
                                        <td class="text-bold-500">B.Indonesia</td>
                                        <td>Selasa, Pukul 12.00 WIB</td>
                                        <td>A02</td>
                                        <td>Ainun</td>
                                        <th>20 Siswa
                                        <th>
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