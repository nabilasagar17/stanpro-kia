@extends('template/index')
@section('content')

<div class="content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>

                        <li class="breadcrumb-item active">Program Siswa</li>
                    </ol>
                </div>
                <h4 class="page-title">Program Siswa</h4>
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
                <form action="{{url('siswa/update_program_siswa')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 my-2">
                                <h4> Kamu yakin memilih program <span class="text-primary" id="nama_program"></span> ?
                                </h4>
                                <input type="text" name="id_program" hidden>
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
        @foreach($data as $datas)
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">{{$datas->nama_program}}</h5>
                <div class="card-body">

                    <p class="card-text">{{$datas->keterangan}}</p>

                    @if(Helpers::get_siswa(Auth::user()->email,'kode_program') == $datas->kode)
                    <button class="btn btn-success" title="Sedang Mengikuti Program">Sedang Mengikuti</button>
                    @else
                    @if(Helpers::get_siswa(Auth::user()->email,'kode_program') == null)
                    <button onClick="update_program_siswa('{{ $datas->kode}}','{{ $datas->nama_program}}')"
                        class="btn btn-primary">Ikuti
                        Program</button>
                    @endif
                    @endif
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        @endforeach
    </div>
    <!-- end row -->


</div> <!-- End Content -->
@endsection