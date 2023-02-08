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

    <div id="update_program_siswas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Pesan Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/hapus_nilai_skd')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <h4> Hapus Data?
                                </h4>
                                <input type="text" name="id_nilai_skd" hidden>
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

    <!-- Standard modal content -->
    <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Input Data SKD</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <form action="{{url('admin/tambah_nilai_skd_proses').'/'.(Request::segment(3))}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Nama Siswa</label>
                                <select class="form-control select2" data-toggle="select2" name="id_siswa">
                                    <option>Select</option>
                                    @foreach($siswa as $siswas)
                                    <option value="{{$siswas->id}}">{{$siswas->id .'-' . $siswas->nama}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">TWK</label>
                                <input type="number" id="simpleinput" class="form-control" name="twk">
                            </div>
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">TIU</label>
                                <input type="number" id="simpleinput" class="form-control" name="tiu">
                            </div>
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">TKP</label>
                                <input type="number" id="simpleinput" class="form-control" name="tkp">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success  float-right">Save </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Standard modal content -->
    <div class="modal fade" id="edit_nilai_skds" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Input Data SKD</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <form action="{{url('admin/edit_nilai_skd')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group m-form__group row">

                            <input type="text" id="simpleinput" class="form-control" name="id_nilai_skd" hidden>
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">TWK</label>
                                <input type="number" id="simpleinput" class="form-control" name="twk">
                            </div>
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">TIU</label>
                                <input type="number" id="simpleinput" class="form-control" name="tiu">
                            </div>
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">TKP</label>
                                <input type="number" id="simpleinput" class="form-control" name="tkp">
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
                    <div class="row  mb-2 ">
                        <div class="col-lg-10">
                            <h4 class="header-title">Nilai SKD</h4>
                        </div>
                        @if(Auth::user()->role == 'tentor')
                        <div class="col-lg-auto float-right">
                            <button class="btn btn-success btn-sm header-title" data-toggle="modal"
                                data-target="#tambah_data" type="button" class="btn btn-primary float-right"
                                title="Detail"><i class="mdi mdi-plus "></i>
                                <span>Tambah</span>
                            </button>
                        </div>

                        @endif
                        <div class="col-lg-auto float-right">
                            <a class="btn btn-primary  btn-sm header-title" type="button" title="Detail"
                                href="{{url('admin/report_nilai_skd').'/'.(Request::segment(3))}}"><i
                                    class="mdi mdi-printer "></i>
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
                            @elseif(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button tyWarning alert preview. This alert is dismissable.pe="button" class="close"
                                    data-dismiss="alert" aria-hidden="true"></button>
                                <h4><i class="icon fa fa-check"></i> Error !</h4>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>TWK</th>
                                            <th>Ket.TWK</th>
                                            <th>TIU</th>
                                            <th>Ket.TIU</th>
                                            <th>TKP</th>
                                            <th>Ket.TKP</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $no = 10 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>
                                        @foreach($data as $datas)
                                        <tr data-row="{{ $no}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{$datas->nama}}</td>
                                            <td>{{ $datas->twk}}</td>
                                            @if($datas->ket_twk == 1)
                                            <td><span class="badge badge-success">Lulus</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Tidak Lulus</span></td>
                                            @endif
                                            <td>{{ $datas->tiu}}</td>
                                            @if($datas->ket_tiu == 1)
                                            <td><span class="badge badge-success">Lulus</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Tidak Lulus</span></td>
                                            @endif
                                            <td>{{ $datas->tkp}}</td>
                                            @if($datas->ket_tkp == 1)
                                            <td><span class="badge badge-success">Lulus</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Tidak Lulus</span></td>
                                            @endif
                                            <td>{{ $datas->created_at}}</td>
                                            <td>{{ $datas->created_by}}</td>
                                            <td>{{ $datas->updated_at }}</td>
                                            <td>{{ $datas->updated_by }}</td>

                                            <td>
                                                @if(Auth::user()->role == 'tentor')
                                                <button
                                                    onClick="edit_nilai_skd('{{ $datas->id}}','{{ $datas->twk}}','{{ $datas->tiu}}','{{ $datas->tkp}}')"
                                                    class="btn btn-success btn-sm" title="Edit Nilai"> <i
                                                        class="mdi mdi-pencil">
                                                    </i></button>
                                                <button onClick="hapus_data_skd('{{ $datas->id}}')"
                                                    class="btn btn-danger btn-sm"> <i class="mdi mdi-trash-can-outline">
                                                    </i></button>
                                                @endif

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



</div> <!-- End Content -->
@endsection
<script>
function hapus_data_skd(id) {
    $('#update_program_siswas').modal('show');
    $('input[name="id_nilai_skd"]').val(id);


}

function edit_nilai_skd(id, twk, tiu, tkp) {
    $('#edit_nilai_skds').modal('show');
    $('input[name="id_nilai_skd"]').val(id);
    $('input[name="twk"]').val(twk);
    $('input[name="tiu"]').val(tiu);
    $('input[name="tkp"]').val(tkp);


}
</script>