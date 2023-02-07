@extends('template/index')
@section('content')

<?php
 $id_siswa = Helpers::get_siswa(Auth::user()->email,'id');
?>

<div class="content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Jadwal Mata Pelajaran</li>
                    </ol>
                </div>
                <h4 class="page-title">Jadwal Mata Pelajaran</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div id="tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Tambah Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/tambah_jadwal_proses')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <label for="simpleinput">Nama Mapel - Nama Tentor</label>
                                <select class="form-control" id="example-select" name="detail_mapel">
                                    @foreach(Helpers::get_detail_mapel() as $detail_mapels)
                                    <option value="{{$detail_mapels->id}}">
                                        {{$detail_mapels->nama_mapel.' - '. $detail_mapels->nama_tentor}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4 my-2">
                                <label for="simpleinput">Tanggal</label>
                                <input type="text" class="form-control" data-provide="datepicker" name="tanggal">

                            </div>

                            <div class="col-lg-4 my-2">
                                <label for="simpleinput">Jam Mulai</label>

                                <input class="form-control" id="example-time" type="time" name="time_start">
                            </div>
                            <div class="col-lg-4 my-2">
                                <label for="simpleinput">Jam Selesai</label>

                                <input class="form-control" id="example-time" type="time" name="time_end">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4 my-2">
                                <label for="simpleinput">Ruangan</label>
                                <select class="form-control" id="example-select" name="ruangan">
                                    @foreach(Helpers::get_ruangan() as $ruangans)
                                    <option value="{{$ruangans->id}}">
                                        {{$ruangans->nama_ruang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 my-2">
                                <label for="simpleinput">Kuota Siswa</label>
                                <input type="number" min="1" value="1" name="kuota" class="form-control"
                                    placeholder="Qty" style="width: 90px;">

                            </div>
                            <div class="col-lg-4 my-2">
                                <label for="simpleinput">Nama Kelas</label>
                                <select class="form-control" id="example-select" name="kelas">
                                    @foreach(Helpers::get_kelas() as $kelas)
                                    <option value="{{$kelas->id}}">
                                        {{$kelas->nama_kelas}}</option>
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

    <div id="tambah_jadwal_siswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Pesan Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('siswa/tambah_jadwal')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <h4> Tambahkan ke jadwal kamu?</h4>
                                <input type="text" name="id_mapel" hidden>
                            </div>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya, Tambahkan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="hapus_jadwals" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Pesan Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{url('admin/hapus_jadwal')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <h4> Data absensi pada jadwal ini juga akan terhapus. Anda yakin?
                                </h4>
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
                @if(Auth::user()->role == 'siswa' && Helpers::get_siswa(Auth::user()->email,'kode_program') == null)
                <h1> Pilih Program Belajar Kamu Terlebih Dahulu, Ya!</h1>
                @else
                <div class="card-body">
                    <div class="row  my-2 ">
                        <div class="col-lg-10">
                            <h4 class="header-title">Jadwal Mata Pelajaran</h4>
                        </div>
                        @if(Auth::user()->role =='admin' && Request::segment(2) !='absensi')
                        <div class="col-lg-auto float-right">
                            <button class="btn btn-success btn-sm header-title" data-toggle="modal"
                                data-target="#tambah_data" type="button" class="btn btn-primary float-right"
                                title="Detail"><i class="mdi mdi-plus "></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                        @endif
                        @if(Request::segment(2) != 'absensi')
                        <div class="col-lg-auto float-right">
                            <a class="btn btn-primary  btn-sm header-title" type="button" title="Detail"
                                href="{{url('admin/report_jadwal_mapel')}}"><i class="mdi mdi-printer "></i>
                                <span>Print</span>
                            </a>
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
                                            <th>Jadwal Mulai</th>
                                            <th>Jadwal Selesai</th>
                                            <th>Ruangan </th>
                                            <th>Tentor</th>
                                            <th>Kuota Tersedia</th>
                                            <th>Nama Kelas</th>
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
                                            <td>{{$datas->nama_mapel}}</td>
                                            <td>{{$datas->jadwal_mulai}}</td>
                                            <td>{{$datas->jadwal_selesai}}</td>
                                            <td>{{$datas->nama_ruang}}</td>
                                            <td>{{$datas->nama_tentor}} </td>
                                            <td>{{$datas->kuota_kelas}} </td>
                                            <td>{{$datas->nama_kelas}} </td>
                                            <td>{{$datas->created_at}} </td>
                                            <td>{{$datas->created_by}} </td>
                                            <td>{{$datas->updated_at}} </td>
                                            <td>{{$datas->updated_by}} </td>

                                            <td>
                                                @if(Auth::user()->role == 'siswa')
                                                @if(Helpers::cek_jadwal_is_null($datas->id,Helpers::get_siswa(Auth::user()->email,'id'))
                                                ->isEmpty())
                                                <button type="button" class="btn btn-primary" title="Ikuti Kelas"
                                                    onClick="tambah_jadwal_siswa('{{ $datas->id}}' )">Ikuti
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-success"
                                                    title="Sedang Mengikuti">Sedang Mengikuti
                                                </button>
                                                @endif
                                                @elseif(Auth::user()->role == 'tentor')
                                                @if(Request::segment(2) != 'jadwal_mapel')
                                                <a type="button" href="{{url('admin/detail_absensi'.'/'.($datas->id))}}"
                                                    class="btn btn-success btn-sm" title="Input Absensi"> <i
                                                        class="mdi mdi-pen">
                                                    </i>
                                                </a>
                                                @endif
                                                <a type="button"
                                                    href="{{url('admin/laporan_absensi'.'/'.($datas->id))}}"
                                                    class="btn btn-primary btn-sm" title="Lihat Absen"> <i
                                                        class="mdi mdi-eye">
                                                    </i>
                                                </a>

                                                @else

                                                <button onClick="hapus_jadwal('{{ $datas->id}}')"
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
                        </div> <!-- end preview-->


                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->

                @endif
            </div> <!-- end card -->
        </div><!-- end col-->

    </div>
    <!-- end row-->



    <!-- end row-->

</div> <!-- End Content -->
@endsection
<script>
function hapus_jadwal(id) {
    $('#hapus_jadwals').modal('show');
    $('input[name="id_jadwal"]').val(id);

}
</script>