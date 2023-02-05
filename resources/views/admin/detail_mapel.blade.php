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

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  my-2 ">
                        <div class="col-lg-10">
                            <h4 class="header-title">Table Detail Mata Pelajaran </h4>
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
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>
                                        @foreach($data as $datas)
                                        <tr data-row="{{ $no}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{$datas->nama_mapel}}</td>
                                            <td>{{$datas->nama_tentor}}</td>

                                            <td>
                                                <button
                                                    onClick="edit_detail_mapel('{{ $datas->id}}','{{ $datas->id_tentor}}','{{ $datas->nama_tentor}}')"
                                                    class="btn btn-success btn-sm"> <i class="mdi mdi-pencil">
                                                    </i></button>
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
function edit_detail_mapel(id, id_tentor, nama_tentor) {
    $('#edit_detail_mapels').modal('show');
    $('input[name="id_detail_mapel"]').val(id);
    $('input[name="id_tentor"]').val(id_tentor);
    $('#nama_tentor').text(nama);



}
</script>