@extends('home.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('/res/css/availcounter.css') }}">
    <style>
        /* Table Styles */

        .table-wrapper {
            border-radius: 7px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            border-radius: 7px;
            font-size: 15px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td,
        .fl-table th {
            text-align: center;
        }

        .fl-table td {
            font-size: 15px;
            border: 1px solid #e6e6e6;
        }

        .fl-table th {
            color: #ffffff;
            background: #ad0505;
        }

        tr th:first-child {
            border-radius: 7px 0px 0px 0px;
        }

        tr th:last-child {
            border-radius: 0px 7px 0px 0px;
        }

        .databox {
            display: block;
            width: 100%;
            margin-bottom: 3px;
            padding: 5px;
            border: 1px solid #d2d2d2;
            font-size: 18px;
        }

        .databox .label {
            padding: 0 10px 0 0;
            margin: 0 10px 0 0;
            border-right: 1px solid #d2d2d2;
            font-weight: 600;
        }

        .databox .icn {
            padding: 0;
            margin: 0;
        }

        .databox .data {
            font-weight: 500;
            text-transform: capitalize;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6" onclick="getFilerTech('ALL')">
                        <div class="counter1 blue">
                            <div class="counter1-icon">
                                <span><i class="fa-solid fa-users"></i></span>
                            </div>
                            <h3>Total</h3>
                            <span class="counter1-value">{{ $ttl_tech }}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" onclick="getFilerTech('MARKET')">
                        <div class="counter1 red">
                            <div class="counter1-icon">
                                <span><i class="fa-solid fa-person-digging"></i></span>
                            </div>
                            <h3>Market</h3>
                            <span class="counter1-value">{{ $ttl_inmarket }}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" onclick="getFilerTech('FREE')">
                        <div class="counter1 ">
                            <div class="counter1-icon">
                                <span><i class="fa-solid fa-chair"></i></span>
                            </div>
                            <h3>Free</h3>
                            <span class="counter1-value">{{ $free }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="table-wrapper">
                    <table class="table table-sm fl-table table-striped table-hover" id="TechList" width="100%">

                        <thead>
                            <tr>
                                <th>Sn#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Job Age</th>
                                <th>Contact</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($techs as $index => $data)
                                <tr style="cursor: pointer;" >
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->age }}</td>
                                    <td>{{ $data->job_age }}</td>
                                    <td>{{ $data->contact }}</td>
                                    <td class="d-none">{{ $data->machine_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-wrapper">
                    <table class="table table-sm fl-table table-striped" id="TechTaskList" width="100%">

                        <thead>
                            <tr>
                                <th style="background-color: #13286e">Sn#</th>
                                <th style="background-color: #13286e">Name</th>
                                <th style="background-color: #13286e">Total Task</th>
                                <th style="background-color: #13286e">Closed</th>
                                <th style="background-color: #13286e">Open</th>
                                <th style="background-color: #13286e">others</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $('#spinShowHide').hide();

        $(document).ready(function() {

            $('.counter-value').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3500,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });

        function getFilerTech(filterType) {

            $("#TechList > tbody").html("");

            $('#TechList').DataTable({
                dom: 't',
                ordering: false,
                paging: false,
                destroy: true,
                responsive: true,
                columnDefs: [{
                    "defaultContent": "N/A",
                    "targets": "_all",
                    "orderable": false
                }],
                ajax: {
                    "url": "{{ route('getFilterTechData') }}",
                    "data": {
                        "filterType": filterType
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        render: function(data, type, row) {
                                var name = row.name;
                                var html = '';
                                html += '<div style="cursor: pointer;">' + name + '</div>';
                                return html;
                            }
                    },
                    {
                        data: 'age',
                        name: 'age'
                    },
                    {
                        data: 'job_age',
                        name: 'job_age'
                    },
                    {
                        data: 'contact',
                        name: 'contact'
                    }
                ]
            });
        }

        $('#TechList tr').click(function() {
            var currentRow = $(this).closest("tr");
            log_id = currentRow.find("td:eq(5)").html();
            alert(log_id);
        });
    </script>
@endpush
