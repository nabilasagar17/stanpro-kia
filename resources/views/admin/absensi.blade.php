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
                        <li class="breadcrumb-item active">Absensi</li>
                    </ol>
                </div>
                <h4 class="page-title">Absensi</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Standard modal content -->



    <div class="modal fade" id="tambah_absensi_siswas" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Edit Absensi Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <form action="{{url('admin/tambah_absensi_proses')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group m-form__group row">

                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Tanggal Ujian</label>
                                <input type="text" class="form-control date" id="birthdatepicker"
                                    data-toggle="date-picker" data-single-date-picker="true" name="tgl_ujian">
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
                        <div class="col-xl-12">
                            <h4 class="header-title">Table Absensi</h4>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <form action="{{url('admin/tambah_absensi_proses')}}" method="post">
                                @csrf
                                <div class="table-responsive-sm">

                                    <table class="table table-striped table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Email</th>
                                                <th>Nama Mapel</th>
                                                <th>Nama Tentor</th>
                                                <th>Nama Kelas</th>
                                                <th>Ruangan</th>
                                                <th>Keterangan</th>
                                                <th>Created At</th>
                                                <th>Created By</th>
                                                <th>Updated At</th>
                                                <th>Updated By</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $no = 30 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

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
                                                <td class="text-bold-500">
                                                    {{Helpers::get_kelas_jadwal($datas->id_jadwal,"nama_kelas")}}</td>
                                                <td>{{$datas->nama_ruang}}</td>
                                                <td>
                                                    <select class="form-control" id="example-select"
                                                        name="keterangan[]">
                                                        <option value="1" selected>Tidak Hadir</option>
                                                        <option value="2">Hadir</option>
                                                        <option value="3">Sakit</option>
                                                        <option value="4">Izin</option>

                                                    </select>

                                                </td>
                                                <td>{{$datas->created_at}}</td>
                                                <td>{{$datas->created_by}}</td>
                                                <td></td>
                                                <td></td>
                                                <!-- <td><a href="{{url('admin/detail_mapel')}}" data-toggle="tooltip"
                                                        data-placement="top" title="Detail Mapel"> <i class="bi bi-eye">
                                                        </i>
                                                    </a>
                                                    <a type="button"
                                                        onClick="tambah_absen_siswa('{{ $datas->id_siswa}}','{{ $datas->id_jadwal}}')"
                                                        class="btn btn-success"><i class="mdi mdi-pencil">
                                                        </i>
                                                    </a>
                                                    <a type="button"
                                                        onClick="hapus_jadwal_siswa('{{ $datas->id_siswa}}','{{ $datas->id_jadwal}}')"
                                                        class="btn btn-danger"><i class=" dripicons-trash">
                                                        </i>
                                                    </a>
                                                </td> -->
                                            </tr>
                                            @endforeach


                                        </tbody>

                                    </table>

                                </div> <!-- end table-responsive-->
                                @if(Helpers::get_absensi_is_null(Request::segment(3))->isEmpty())
                                <div class="row my-2">


                                    <button type="submit" class="btn btn-success">Simpan
                                    </button>

                                </div>
                                @endif
                            </form>
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