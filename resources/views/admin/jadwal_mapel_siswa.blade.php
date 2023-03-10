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
                        <li class="breadcrumb-item active">Daftar Siswa </li>
                    </ol>
                </div>
                <h4 class="page-title">Daftar Siswa </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Standard modal content -->


    <div id="hapus_absensi_siswas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Pesan Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/hapus_jadwal_siswa')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <h4> Hapus Data?
                                </h4>
                                <input type="text" name="id_siswa" hidden>
                                <input type="text" name="id_jadwal" hidden>
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
                        <div class="col-xl-12">
                            <h4 class="header-title">Table Daftar Siswa </h4>
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
                                            <th>Nama Siswa</th>
                                            <th>Email</th>
                                            <th>Nama Mapel</th>
                                            <th>Nama Tentor</th>
                                            <th>Ruangan</th>

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
                                            <td class="text-bold-500">{{$datas->nama}}
                                                <input value="{{$datas->id_siswa}}" name="id_siswa[]" hidden>
                                                <input value="{{$datas->id_jadwal}}" name="id_jadwal[]" hidden>
                                            </td>
                                            <td>{{$datas->email}}</td>
                                            <td>{{$datas->nama_mapel}}</td>
                                            <td class="text-bold-500">{{$datas->nama_tentor}}</td>
                                            <td>{{$datas->nama_ruang}}</td>

                                            <td>{{$datas->created_at}}</td>
                                            <td>{{$datas->created_by}}</td>
                                            <td></td>
                                            <td></td>
                                            <td><button
                                                    onClick="hapus_absensi_siswa('{{ $datas->id_siswa}}','{{ $datas->id_jadwal}}')"
                                                    class="btn btn-danger btn-sm"> <i class="mdi mdi-trash-can-outline">
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
function edit_absensi_siswa(id, keterangan) {
    $('#edit_absensi_siswas').modal('show');
    $('input[name="id_absensi_siswa"]').val(id);
    $('input[name="keterangan"]').val(keterangan);

}

function hapus_absensi_siswa(id_siswa, id_jadwal) {
    $('#hapus_absensi_siswas').modal('show');
    $('input[name="id_jadwal"]').val(id_jadwal);
    $('input[name="id_siswa"]').val(id_siswa);

}
</script>