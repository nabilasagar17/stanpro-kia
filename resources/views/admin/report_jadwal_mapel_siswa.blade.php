<?php 
use Illuminate\Support\Carbon;
?>
<!DOCTYPE html>
</title>
<style>
.text-center {
    text-align: center;
}

.table {
    margin-left: -15px;
}

.table,
.table th,
.table td {
    border: 1px solid #333;
    border-collapse: collapse;
    padding-left: 5px;
    font-size: 13px;
}
</style>
</head>

<body>
    <div class="">
        <div id="element-to-print" style="font-family: arial;">
            <table width="100%" style="border-bottom: 1px solid #333;">
                <tr>
                    <td width="">
                        <div>
                            <img src="{{ asset('img/logo.png') }}" height="80">
                        </div>
                    </td>
                    <td width="85%" valign="middle">
                        <div class="text-center" style="line-height: 25px; margin-left: -150px;">
                            <div style="font-size: 16pt;"><b>STANPRO LEARNING CENTER</b></div>

                        </div>
                    </td>
                </tr>
            </table>

            <div class="text-center" style="margin-top: 20px;">

                <H1 class="uppercase mr-5">Laporan Detail Mapel</h1>

            </div>
            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">
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
                            <td>{{$datas->nama_ruang}}</td>

                            <td>{{$datas->created_at}}</td>
                            <td>{{$datas->created_by}}</td>
                            <td></td>
                            <td></td>
                            <td><button onClick="hapus_absensi_siswa('{{ $datas->id_siswa}}','{{ $datas->id_jadwal}}')"
                                    class="btn btn-danger btn-sm"> <i class="mdi mdi-trash-can-outline">
                                    </i></button>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <p>&nbsp;</p>

                <div style=" position:absolute; left: 0;">
                    Tanggal Cetak <b>{{ date("d-M-Y H:i:s", strtotime(Carbon::now())) }}</b><br>

                </div>

            </div>
        </div>
    </div>
</body>

</html>