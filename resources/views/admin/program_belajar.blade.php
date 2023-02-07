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
                        <li class="breadcrumb-item active">Mata Pelajaran</li>
                    </ol>
                </div>
                <h4 class="page-title">Program Belajar</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Standard modal content -->
    <div id="edit_programs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Edit Program</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/edit_program')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Nama Program</label>
                                <input type="text" name="nama_program" id="simpleinput" class="form-control">
                                <input type="text" name="kode" id="simpleinput" class="form-control" hidden>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Harga</label>
                                <input type="number" name="harga" id="simpleinput" class="form-control">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">


                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Keterangan</label>
                                <textarea class="form-control" id="example-textarea" name="keterangan"
                                    rows="2"></textarea>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Status</label>
                                <select class="form-control" id="example-select" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="2">Deactive</option>

                                </select>

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

    <div id="tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Input Program Belajar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/tambah_siswa_proses')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Nama Program</label>
                                <input type="text" name="nama_program" id="simpleinput" class="form-control">
                                <input type="text" name="kode" id="simpleinput" class="form-control" hidden>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Harga</label>
                                <input type="number" name="harga" id="simpleinput" class="form-control">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">


                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Keterangan</label>
                                <textarea class="form-control" id="example-textarea" name="keterangan"
                                    rows="2"></textarea>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Status</label>
                                <select class="form-control" id="example-select" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="2">Deactive</option>

                                </select>

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

    <div id="hapus_programs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Pesan Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/hapus_program')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <h4> Hapus Data?
                                </h4>
                                <input type="text" name="kode" hidden>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya, Saya Yakin!</button>
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
                        <div class="col-xl-10">
                            <h4 class="header-title">List Program</h4>
                        </div>
                        <div class="col-lg-auto float-right">
                            <button class="btn btn-success btn-sm header-title" data-toggle="modal"
                                data-target="#tambah_data" type="button" class="btn btn-primary float-right"
                                title="Detail"><i class="mdi mdi-plus "></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                        <div class="col-lg-auto float-right">
                            <a class="btn btn-primary  btn-sm header-title" type="button" title="Detail"
                                href="{{url('admin/report_program')}}"><i class="mdi mdi-printer "></i>
                                <span>Print</span>
                            </a>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button tyWarning alert preview. This alert is dismissable.pe="button" class="close"
                                    data-dismiss="alert" aria-hidden="true"></button>
                                <h4><i class="icon fa fa-check"></i> Sukses !</h4>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                            @endif
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>

                                            <th>Nama</th>
                                            <th>Keterangan</th>
                                            <th>Harga</th>
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

                                            <td class="text-bold-500">{{$datas->nama_program}}</td>
                                            <td>{{$datas->keterangan}}</td>
                                            <td>Rp. {{number_format($datas->harga)}}</td>
                                            @if($datas->status == 1)
                                            <td><span class="badge badge-success">Aktif</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Deactive</span></td>
                                            @endif
                                            <td>{{$datas->created_at}}</td>
                                            <td>{{$datas->created_by}}</td>
                                            <td><button
                                                    onClick="edit_program('{{ $datas->kode}}','{{ $datas->nama_program}}','{{ $datas->keterangan}}','{{ $datas->harga}}','{{ $datas->status}}')"
                                                    class="btn btn-success btn-sm"> <i class="mdi mdi-pencil">
                                                    </i>
                                                </button>
                                                <a type="button" onClick="hapus_program('{{ $datas->kode}}')"
                                                    class="btn btn-danger"><i class=" dripicons-trash">
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



    <!-- end row-->

</div> <!-- End Content -->
@endsection


<script>
function edit_program(kode, nama_program, keterangan, harga, status) {
    $('#edit_programs').modal('show');
    $('input[name="kode"]').val(kode);
    $('input[name="nama_program"]').val(nama_program);
    $('input[name="keterangan"]').val(keterangan);
    $('input[name="harga"]').val(harga);
    $('input[name="status"]').val(status);

}


function hapus_program(kode) {
    $('#hapus_programs').modal('show');
    $('input[name="kode"]').val(kode);

}
</script>