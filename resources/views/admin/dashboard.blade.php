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

                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-2 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class=" dripicons-user widget-icon bg-info rounded-circle text-white"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Revenue">{{$judul_1}}</h5>
                    <h3 class="mt-3 mb-3">{{$angka_1}}</h3>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xl-2 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="dripicons-user-group widget-icon bg-info rounded-circle text-white"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Revenue">{{$judul_2}}</h5>
                    <h3 class="mt-3 mb-3">{{$angka_2}}</h3>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xl-2 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class=" dripicons-user-id widget-icon bg-info rounded-circle text-white"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Revenue">{{$judul_3}}</h5>
                    <h3 class="mt-3 mb-3">{{$angka_3}}</h3>

                </div>
            </div>
        </div> <!-- end col-->


    </div>
    <div class="row">
        <div class="col-lg-12">
            @if(Auth::user()->role == 'siswa')
            <div class="col-lg-3">
                <div class="card">
                    <div id="skd_siswa"></div>
                </div>
            </div>
            <!-- end col-->

            <div class="col-lg-3">
                <div class="card">
                    <div id="utbk_siswa"></div>
                </div> <!-- end card-->

            </div> <!-- end col -->
            @else
            <div class="col-lg-3">
                <div class="card">
                    <div id="skd"></div>
                </div>
            </div>
            <!-- end col-->

            <div class="col-lg-3">
                <div class="card">
                    <div id="utbk"></div>
                </div> <!-- end card-->

            </div> <!-- end col -->
            @endif
            <div class="col-xl-3 col-lg-6 order-lg-1">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-2">Agenda</h4>

                        <div data-simplebar style="max-height: 424px;">
                            @foreach($agenda as $agendas)
                            <div class="timeline-alt pb-0">
                                <div class="timeline-item">
                                    <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="#"
                                            class="text-info font-weight-bold mb-1 d-block">{{$agendas->nama_agenda}}</a>
                                        <small>{{$agendas->jadwal_mulai}}</small>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- end timeline -->
                        </div> <!-- end slimscroll -->
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card-->
            </div>


        </div>

    </div>

</div> <!-- End Content -->

<style>
.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#skd,
#utbk,
#skd_siswa,
#utbk_siswa {
    height: 350px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
Highcharts.chart('utbk', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data UTBK'
    },

    xAxis: {
        categories: [
            <?php foreach( $utbk  as $utbks ) { ?> '<?php echo $utbks->tgl_ujian; ?>',
            <?php } ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,

    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '<?php echo $chart_text;?>',
        data: [<?php foreach($utbk_nilai as $rows ) { ?> <?php echo $rows->nilai?>,
            <?php } ?>

        ]

    }]
});
</script>



<script type="text/javascript">
Highcharts.chart('skd', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data SKD'
    },

    xAxis: {
        categories: [

            <?php foreach( $skd as $skds ) { ?> '<?php echo $skds->tgl_ujian; ?>',
            <?php } ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,

    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '<?php echo $chart_text;?>',
        data: [<?php foreach($skd_nilai as $rows ) { ?> <?php echo $rows->nilai?>,
            <?php } ?>

        ]

    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('skd_siswa', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Data SKD',
        align: 'left'
    },

    xAxis: {
        categories: [<?php foreach( $skd as $skds ) { ?> '<?php echo $skds->tgl_ujian; ?>',
            <?php } ?>
        ]
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Count medals'
        }
    },

    tooltip: {
        formatter: function() {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },

    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },

    series: [{
        name: 'Norway',
        data: [148, 133, 124],

    }, {
        name: 'Germany',
        data: [102, 98, 65],

    }, {
        name: 'United States',
        data: [113, 122, 95],

    }, {
        name: 'Canada',
        data: [77, 72, 80],

    }]
});
</script>
@endsection