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

                <H1 class="uppercase mr-5">Laporan Nilai SKD</h1>
                <H4 class="uppercase mr-5">{{$date}}</h4>

            </div>
            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">
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

                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>
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