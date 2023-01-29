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
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
                <h4 class="page-title">Master Data Admin</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div id="tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/tambah_admin_proses')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Nama Admin</label>
                                <input type="text" name="nama" id="simpleinput" class="form-control">
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Telp</label>
                                <input type="text" name="telp" id="simpleinput" class="form-control">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">

                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Alamat</label>
                                <textarea class="form-control" id="example-textarea" name="alamat" rows="2"></textarea>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  my-2 ">
                        <div class="col-lg-10">
                            <h4 class="header-title">Table Data Admin</h4>
                        </div>
                        <div class="col-lg-2 float-right">
                            <button class="btn btn-success btn-sm header-title" data-toggle="modal"
                                data-target="#tambah_data" type="button" class="btn btn-primary float-right"
                                title="Detail"><i class="mdi mdi-plus "></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>


                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>

                                            <th>Telp</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>
                                        @foreach($data as $datas)
                                        <tr data-row="{{ $no}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{$datas->email}}</td>

                                            <td>{{$datas->alamat}}</td>
                                            <td>{{$datas->telp}}</td>
                                            @if($datas->status == 1)
                                            <td><span class="badge badge-success">Aktif</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Deactive</span></td>
                                            @endif
                                            <td>{{$datas->created_at}}</td>
                                            <td>{{$datas->created_by}}</td>
                                            <td>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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