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
                        <li class="breadcrumb-item active">Materi</li>
                    </ol>
                </div>
                <h4 class="page-title">Materi</h4>
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
                                <label for="simpleinput">Nama Mata Pelajaran</label>
                                <select class="form-control" id="example-select" name="id_mapel">
                                    @foreach($mapel as $mapels)
                                    <option value="{{$mapels->id}}">{{$mapels->nama_mapel}}</option>
                                    @endforeach
                                </select>
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


    <div class="modal fade" id="edit_materi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Edit Detail Mapel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <form action="{{url('admin/edit_materi')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Nama Materi</label>
                                <input type="text" id="simpleinput" class="form-control" name="nama_materi">
                                <input type="text" id="simpleinput" class="form-control" name="id_materi" hidden>
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
                            <h4 class="header-title">Daftar Materi</h4>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <div class="col-lg-2 float-right">
                            <button class="btn btn-success btn-sm header-title" data-toggle="modal"
                                data-target="#tambah_data" type="button" class="btn btn-primary float-right"
                                title="Detail"><i class="mdi mdi-plus "></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mapel</th>
                                            <th>Nama Materi</th>
                                            <th>Keterangan</th>
                                            <th>File</th>
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
                                            <td>{{Helpers::get_mapel( $datas->id_mapel,'nama_mapel') }}</td>
                                            <td>{{ $datas->nama_materi}}</td>
                                            <td>{{ $datas->keterangan }}</td>
                                            <td><a href="{{url('admin/download_materi/'.($datas->file_path))}}">
                                                    {{ $datas->file_path}}
                                                </a>
                                            </td>
                                            <td>{{ $datas->created_at }}</td>
                                            <td>{{ $datas->created_by }}</td>


                                            <td><button
                                                    onClick="edit_detail_mapel( '{{ $datas->id}}','{{ $datas->id_mapel}}','{{ $datas->file_path}}','{{ $datas->nama_materi}}')"
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



</div> <!-- End Content -->
@endsection

<script>
function edit_detail_mapel(id, id_mapel, file_path, nama_materi) {
    $('#edit_detail_mapels').modal('show');
    $('input[name="id_materi"]').val(id);
    $('input[name="id_mapel"]').val(id_mapel);
    $('input[name="file_path"]').val(file_path);
    $('input[name="nama_materi"]').val(nama_materi);
    $('#nama_tentor').text(nama);



}
</script>