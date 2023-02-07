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
                    <h5 class="text-muted font-weight-normal mt-0" title="Revenue">Siswa Aktif</h5>
                    <h3 class="mt-3 mb-3">{{$siswa_aktif}}</h3>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xl-2 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="dripicons-user-group widget-icon bg-info rounded-circle text-white"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Revenue">Tentor</h5>
                    <h3 class="mt-3 mb-3">{{$tentor}}</h3>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xl-2 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class=" dripicons-user-id widget-icon bg-info rounded-circle text-white"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Revenue">Siswa Lulus</h5>
                    <h3 class="mt-3 mb-3">{{$siswa_lulus}}</h3>

                </div>
            </div>
        </div> <!-- end col-->

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

    </div>
    <div class="row">
        <div class="col-lg-12">
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
#utbk {
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
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        name: 'Nilai',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
            194.1, 95.6, 54.4
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
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        name: 'Nilai',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
            194.1, 95.6, 54.4
        ]

    }]
});
</script>
@endsection