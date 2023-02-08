@extends('template/index')
@section('content')

<div class="content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a> <a
                                href="{{url('admin/dashboard')}}">Mata Pelajaran</a></li>
                        <li class="breadcrumb-item active">Detail Mata Pelajaran</li>
                    </ol>
                </div>
                <h4 class="page-title">Mata Pelajaran</h4>
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

                    <form action="{{url('admin/tambah_detail_mapel_proses/'.(Request::segment(3)))}}" method="post">
                        @csrf
                        <div class="form-group m-form__group row">

                            <!-- <div class="col-lg-12 my-2">
                                <label for="simpleinput">Nama Tentor</label>
                                <select class="form-control" id="example-select" name="id_mapel">
                                    @foreach($mapel as $mapels)
                                    <option value="{{$mapels->id}}">{{$mapels->nama_mapel}}</option>
                                    @endforeach
                                </select>
                            </div> -->

                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Nama Tentor</label>
                                <select class="form-control" id="example-select" name="id_tentor">
                                    @foreach($tentor as $tentors)
                                    <option value="{{$tentors->id}}">{{$tentors->nama . '-'. $tentors->email}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success  float-right">Save </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="edit_detail_mapels" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Edit Detail Mapel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <form action="{{url('admin/edit_detail_mapel')}}" method="post">
                        @csrf
                        <div class="form-group m-form__group row">

                            <input type="text" name="id_detail_mapel" hidden>
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Nama Tentor</label>
                                <select class="form-control" id="example-select" name="id_tentor" value="">
                                    @foreach($tentor as $tentors)
                                    <option value="{{$tentors->id}}" selected>{{$tentors->nama . '-'. $tentors->email}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success  float-right">Save </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="hapus_detail_mapels" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Pesan Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/hapus_detail_mapel')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <h4> Data jadwal pada detail mapel ini juga akan terhapus. Anda yakin?
                                </h4>
                                <input type="text" name="id_detail_mapel" hidden>
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
                        <div class="col-lg-10">
                            <h4 class="header-title">Table Detail Mata Pelajaran </h4>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <div class="col-lg-auto float-right">
                            <button class="btn btn-success btn-sm header-title" data-toggle="modal"
                                data-target="#tambah_data" type="button" class="btn btn-primary float-right"
                                title="Detail"><i class="mdi mdi-plus "></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                        @endif
                        <div class="col-lg-auto float-right">
                            <a class="btn btn-primary btn-sm  float-right" type="button"
                                href="{{url('admin/report_detail_mapel').'/'.(Request::segment(3))}}" title="Detail"><i
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
                                            <th>Nama Mapel</th>
                                            <th>Nama Tentor</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $no = 10 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>
                                        @foreach($data as $datas)
                                        <tr data-row="{{ $no}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{$datas->nama_mapel}}</td>
                                            <td>{{$datas->nama_tentor}}</td>

                                            <td>
                                                @if(Auth::user()->role =='admin')
                                                <button
                                                    onClick="edit_detail_mapel('{{ $datas->id}}','{{ $datas->id_tentor}}','{{ $datas->nama_tentor}}')"
                                                    class="btn btn-success btn-sm"> <i class="mdi mdi-pencil">
                                                    </i></button>
                                                <button onClick="hapus_detail_mapel('{{ $datas->id}}')"
                                                    class="btn btn-danger btn-sm"> <i class="mdi mdi-trash-can-outline">
                                                    </i>
                                                </button>
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



    <!-- end row-->

</div> <!-- End Content -->
@endsection

<script>
function edit_detail_mapel(id, id_tentor, nama_tentor) {
    $('#edit_detail_mapels').modal('show');
    $('input[name="id_detail_mapel"]').val(id);
    $('input[name="id_tentor"]').val(id_tentor);
    $('#nama_tentor').text(nama);



}

function hapus_detail_mapel(id) {
    $('#hapus_detail_mapels').modal('show');
    $('input[name="id_detail_mapel"]').val(id);




}
</script>