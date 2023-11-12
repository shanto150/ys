@push('style')
    <style>
        .dataTables_filter {
            display: none;
        }

        option {
            zoom: 1.2
        }

        thead {
            background: #395870;
            /* background: linear-gradient(#ed284f, #540212); */
            background: #990707;
            color: #fff;
            font-size: 11px;
            text-transform: uppercase;
        }
    </style>
@endpush
@extends('home.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $ttl_emp }}</h3>
                        <p>Total Staff</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $ttl_tech }}</h3>
                        <p>Total Technician</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-nurse"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $ttl_inmarket }}</h3>
                        <p>In Market</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-person-digging"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $free }}</h3>
                        <p>Free</p>
                    </div>
                    <div class="icon">
                        <i class="fa-brands fa-phoenix-framework"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-none">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-pie text-danger"></i> Monthly Earns</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-none">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-brands fa-squarespace text-danger"></i></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-hover" id="BakiTable" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">SL#</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Count</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($statusCount as $index => $val)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $val->status }}</td>
                                        <td>{{ $val->ctn }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="/res/plugins/chart.js/Chart.min.js"></script>
    <script src="/res/js/utils.js"></script>
    <script>
        $('#spinShowHide').hide();

        var Monthly_sell_Months = @json($Monthly_sell_Months);
        var Monthly_sell_values = @json($Monthly_sell_values);

        var ctx = document.getElementById("barChart");
        debugger;
        var data = {
            labels: Monthly_sell_Months,
            datasets: [{
                data: Monthly_sell_values,
                backgroundColor: color => {
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 255);
                    var b = Math.floor(Math.random() * 255);
                    return "rgba(" + r + "," + g + "," + b + ")";
                }
            }]
        }
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                "hover": {
                    "animationDuration": 0
                },
                "animation": {
                    "duration": 1000,
                    "onComplete": function() {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;

                        // ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        // ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function(dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function(bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 5);
                            });
                        });
                    }
                },
                legend: {
                    "display": false
                },
                title: {
                    display: true,
                    text: 'Monthly Earns'
                },
                tooltips: {
                    "enabled": true
                },
                pointLabels: {
                    fontColor: '#FF0000',
                    fontFamily: "'Raleway', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    fontSize: 29,
                    fontWeight: 900,
                },
                scales: {
                    yAxes: [{
                        display: true,
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            max: Math.max(...data.datasets[0].data) + 10,
                            display: false,
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
