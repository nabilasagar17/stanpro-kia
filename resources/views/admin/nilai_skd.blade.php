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
                        <li class="breadcrumb-item active">Nilai SKD</li>
                    </ol>
                </div>
                <h4 class="page-title">Nilai SKD</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Standard modal content -->
    <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Input Mapel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <form action="{{url('admin/tambah_materi_proses')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Nama Materi</label>
                                <input type="text" id="simpleinput" class="form-control" name="nama_materi">
                            </div>


                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">File Materi</label>
                                <input type="file" id="example-fileinput" class="form-control-file" name="file">
                            </div>
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Keterangan</label>
                                <textarea class="form-control" id="example-textarea" rows="2"
                                    name="keterangan"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success  float-right">Save </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  my-2 ">
                        <div class="col-lg-10">
                            <h4 class="header-title">Nilai SKD</h4>
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
                                            <th>Nama Siswa</th>
                                            <th>TWK</th>
                                            <th>TIU</th>
                                            <th>TKP</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>
                                        @foreach($data as $datas)
                                        <tr data-row="{{ $no}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{ $datas->twk}}</td>
                                            <td>{{ $datas->tiu}}</td>
                                            <td>{{ $datas->tkp}}</td>
                                            <td>{{ $datas->created_at}}</td>
                                            <td>{{ $datas->created_by}}</td>
                                            <td>{{ $datas->updated_at }}</td>
                                            <td>{{ $datas->updated_by }}</td>

                                            <td><a href="{{url('admin/detail_mapel')}}" data-toggle="tooltip"
                                                    data-placement="top" title="Detail Mapel"> <i class="bi bi-eye">
                                                    </i>
                                                </a>
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



</div> <!-- End Content -->
@endsection