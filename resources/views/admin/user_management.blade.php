@extends('layouts/index')
@section('content')


<div class="page-heading">
    <h3>User Management</h3>
</div>
<div class="page-content">
    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Daftar User</h4>
                    </div>

                    <div class="card-content">

                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
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
                                        <td class="text-bold-500">Michael Right</td>
                                        <td>admin@gmail.com</td>
                                        <td class="text-bold-500">Admin</td>

                                        <td>27 Desember 2022</td>
                                        <td>System</td>
                                        <td></td>
                                        <td></td>
                                        <td><a href="{{url('admin/detai_user_management')}}"> <i class="bi bi-eye"> </i>
                                            </a> </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="text-bold-500">Annisa</td>
                                        <td>annisa@gmail.com</td>
                                        <td class="text-bold-500">Siswa</td>

                                        <td>27 Desember 2022</td>
                                        <td>System</td>
                                        <td></td>
                                        <td></td>
                                        <td><a href="{{url('admin/detai_user_management')}}"> <i class="bi bi-eye"> </i>
                                            </a> </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="text-bold-500">Amina</td>
                                        <td>amina@gmail.com</td>
                                        <td class="text-bold-500">Tentor</td>

                                        <td>27 Desember 2022</td>
                                        <td>System</td>
                                        <td></td>
                                        <td></td>
                                        <td><a href="{{url('admin/detai_user_management')}}"> <i class="bi bi-eye"> </i>
                                            </a> </td>
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