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
                        <li class="breadcrumb-item active">Siswa</li>
                    </ol>
                </div>
                <h4 class="page-title">Master Data Siswa</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div id="tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Input Data Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/tambah_siswa_proses')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Nama Siswa</label>
                                <input type="text" name="nama" id="simpleinput" class="form-control" required>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Pendidikan Terakhir</label>
                                <select class="form-control" id="example-select" name="pendidikan_terakhir" required>
                                    <option value="SMA">SMA</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Telp</label>
                                <input type="text" name="telp" id="simpleinput" class="form-control" required>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Alamat</label>
                                <textarea class="form-control" id="example-textarea" name="alamat" rows="2"
                                    required></textarea>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Nama Program</label>
                                <select class="form-control" id="example-select" name="program" required>
                                    @foreach($program as $programs)
                                    <option value="{{$programs->kode}}">{{$programs->nama_program}}</option>
                                    @endforeach
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

    <!-- Standard modal content -->
    <div id="edit_siswas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Edit Data Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/edit_siswa')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Nama Siswa</label>
                                <input type="text" name="namas" id="simpleinput" class="form-control" required>
                                <input type="text" name="id_siswas" id="simpleinput" class="form-control" hidden>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Telp</label>
                                <input type="text" name="telps" id="simpleinput" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">


                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Alamat</label>
                                <textarea class="form-control" id="example-textarea" name="alamats" rows="2"
                                    required></textarea>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Status</label>
                                <select class="form-control" id="example-select" name="statuss" required>
                                    <option value="1">Aktif</option>
                                    <option value="2">Deactive</option>

                                </select>

                            </div>

                        </div>
                        <div class="form-group m-form__group row">

                            <div class="col-lg-6 my-2">
                                <label for="simpleinput">Pendidikan Terakhir</label>
                                <select class="form-control" id="example-select" name="pendidikan_terakhirs" required>
                                    <?php $pend = array('SMA','S1','S2');?>
                                    @foreach($pend as $pends)
                                    <option value="{{$pends}}" selected>{{$pends}}</option>
                                    @endforeach
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

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  my-2 ">
                        <div class="col-lg-10">
                            <h4 class="header-title">Table Data Siswa</h4>
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
                                href="{{url('admin/report_siswa')}}"><i class="mdi mdi-printer "></i>
                                <span>Print</span>
                            </a>
                        </div>
                    </div>


                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button tyWarning alert preview. This alert is dismissable.pe="button" class="close"
                                        data-dismiss="alert" aria-hidden="true"></button>
                                    <h4><i class="icon fa fa-check"></i> Sukses !</h4>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Nama Program</th>
                                            <th>Alamat</th>
                                            <th>Telp</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Status</th>
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
                                            <td>{{$datas->pendidikan_terakhir}}</td>
                                            <td>{{Helpers::field_program($datas->kode_program,"nama_program")}}</td>
                                            <td>{{$datas->alamat}}</td>
                                            <td>{{$datas->telp}}</td>
                                            <td>{{$datas->created_at}}</td>
                                            <td>{{$datas->created_by}}</td>
                                            <td>{{$datas->updated_at}}</td>
                                            <td>{{$datas->updated_by}}</td>
                                            @if($datas->status == 1)
                                            <td><span class="badge badge-success">Aktif</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Deactive</span></td>
                                            @endif

                                            <td><button
                                                    onClick="edit_user('{{ $datas->id}}','{{ $datas->nama}}','{{ $datas->alamat}}','{{ $datas->telp}}','{{ $datas->status}}','{{ $datas->pendidikan_terakhir}}')"
                                                    class="btn btn-success btn-sm"> <i class="mdi mdi-pencil">
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end table-responsive-->
                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix my-2">
                                {!! $data->appends(Request::all())->links() !!}
                            </div>
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
function edit_user(id, nama, alamat, telp, status, pend) {
    $('#edit_siswas').modal('show');
    $('input[name="id_siswa"]').val(id);
    $('input[name="namas"]').val(nama);
    $('input[name="alamats"]').val(alamat);
    $('input[name="telps"]').val(telp);
    $('input[name="statuss"]').val(status);
    $('input[name="pendidikan_terakhirs"]').val(pend);
}
</script>