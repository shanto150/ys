@extends('home.master')
@push('style')
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

        {{-- model --}}
        <div class="modal zoomer" tabindex="-1" id="myModal" data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Attachment</h5>

                        <img src="{{ URL::asset('/res/images/appimages/lod1.gif') }}" alt="profile Pic" height="30"
                            width="30" id="modelSpinner" />

                    </div>

                    <div class="modal-body">
                        <img class="centered" src="{{ URL::asset('/res/images/timage/03102023-1696337418.jpg') }}"
                            alt="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="document.getElementById('myform').reset();"
                            data-target="#myModal" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
                            Close</button>
                    </div>

                </div>
            </div>
        </div>
        {{-- End model --}}

        <div class="row">

            <div class="col-md-5">

                <div class="card border border-01 border-info">
                    <div class="card-tools">
                        <button type="button" id="Section_details" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center text-uppercase display-4 border-bottom mb-3">
                            <span class="badge badge-info mb-3 p-2">{{ $service_logs->status }}</span>
                        </div>

                        <div class="databox hvr-sweep-to-top">
                            <span class="icn"><i class="fa fa-chevron-right" style="color: #dd1933"
                                    aria-hidden="true"></i></span>
                            <span class="label">Outlet Code&nbsp;&nbsp;</span>
                            <span class="data">{{ $service_logs->outlet_code }}</span>
                        </div>
                        <div class="databox hvr-sweep-to-top">
                            <span class="icn"><i class="fa fa-chevron-right" style="color: #09c723"
                                    aria-hidden="true"></i></span>
                            <span class="label">Visi Id / Size&nbsp;&nbsp;</span>
                            <span class="data">{{ $service_logs->visi_id . ' / ' . $service_logs->visi_size }}</span>
                        </div>
                        <div class="databox hvr-sweep-to-top">
                            <span class="icn"><i class="fa fa-chevron-right" style="color: #d904f5"
                                    aria-hidden="true"></i></span>
                            <span class="label">Outlet Name</span>
                            <span class="data">{{ $service_logs->outlet_name }}</span>
                        </div>
                        <div class="databox hvr-sweep-to-top">
                            <span class="icn"><i class="fa fa-chevron-right" style="color: #37A3F0"
                                    aria-hidden="true"></i></span>
                            <span class="label">Address&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</span>
                            <span class="data">{{ $service_logs->outlet_address }}</span>
                        </div>
                        <div class="databox hvr-sweep-to-top">
                            <span class="icn"><i class="fa fa-chevron-right" style="color: #f39406"
                                    aria-hidden="true"></i></span>
                            <span class="label">Contacts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</span>
                            <span class="data">{{ $service_logs->outlet_mobile }} -
                                {{ $service_logs->person_mobile }}</span>
                        </div>
                        <div class="databox hvr-sweep-to-top">
                            <span class="icn"><i class="fa fa-chevron-right" style="color: #06106e"
                                    aria-hidden="true"></i></span>
                            <span class="label">Complains&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span class="data">{{ $service_logs->complains }}</span>
                        </div>
                    </div>
                </div>

                <div class="card border border-01">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm table-striped table-hover" id="TableVisiHostry" width="100%">

                            <thead>
                                <tr>
                                    <th>Sn#</th>
                                    <th>Call Date</th>
                                    <th>Details</th>
                                    <th>Technician</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
            <div class="col-md-7">
                <div class="card border border-01 border-success">
                    <div class="card-body">
                        <form id="assignform">
                            @csrf
                            <div class="text-center">
                                <div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
                                    <label class="btn btn-outline-danger " id="Open">
                                        <input type="radio" value="Open" name="tech_status" checked> Open
                                    </label>
                                    <label class="btn btn-outline-danger" id="Closed">
                                        <input type="radio" value="Closed" name="tech_status"> Closed
                                    </label>
                                </div>
                            </div>
                            <div class="form-label-group in-border">
                                <select class="form-control select2" form="assignform" name="assigned_to"
                                    id="assigned_to" style="width: 100%;">
                                    <option selected value="0">Choose...</option>
                                    @foreach ($technicians as $value)
                                        <option value="{{ $value->machine_id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <label for="assigned_to">Assigned to</label>
                                <input type="text" value="0" name="id" form="assignform" id="id"
                                    hidden>
                                <input type="text" value="{{ $service_logs->id }}" form="assignform" name="log_id"
                                    id="log_id" hidden>
                            </div>
                            <div class="form-label-group in-border">
                                <textarea id="note" name="note" form="assignform" style="text-transform:capitalize" class="form-control"
                                    cols="50" rows="3"></textarea>
                                <label for="note">Note</label>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" form="assignform" onclick="FromsCheck();"
                            class="btn btn-success float-right"><i class="fa fa-check" aria-hidden="true"></i>
                            Save</button>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table class="table table-sm fl-table table-striped" id="TechList" width="100%">

                        <thead>
                            <tr>
                                <th>Sn#</th>
                                <th>Technician</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Actions</th>
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

        setTimeout(function() {
            $('#Section_details').trigger('click');
        }, 3000);

        var firstValue = $("#assignform").serialize();

        function FromsCheck() {
            var assigned_to = document.getElementById('assigned_to').value;
            if (assigned_to == 0) {
                message('Please Select Staff', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("assigned_to").focus();
                return false;
            }

            save();
            return true;
        }

        function save() {

            var allInputs = $("#assignform").serialize();
            console.log(allInputs);
            var formData = new FormData(assignform);
            if (firstValue == allInputs) {
                message('Nothing changed !', '#FECC43', '#1A389F', 'info', 'Info');
            } else {
                $.ajax({
                    beforeSend: function() {
                        $('#spinShowHide').show();
                    },
                    error: function(res) {
                        $('#spinShowHide').hide();
                        const ErrowArray = res.responseJSON['message'];
                        const EE = res.responseJSON['exception'];
                        const msgs = ErrowArray.split(':');
                        if (EE == 'ErrorException') {
                            message(ErrowArray, '#FF0000', 'white', 'error', 'Error');
                        } else {
                            message(msgs[2], '#FF0000', 'white', 'error', msgs[1]);
                        }
                    }, 
                    complete: function() {
                        $('#spinShowHide').hide();
                    },
                    type: 'POST',
                    url: "{{ route('service-log-Techstore') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(res) {
                        if (res.types == 'e') {
                            message(res.messege, '#FF0000', 'white', 'error', 'error');
                        } else {
                            message(res.messege, '#29912b', 'white', 'error', 'Success');
                            document.getElementById('assignform').reset();
                            $('#TechList').DataTable().ajax.reload();
                        }
                    }
                });
            }

        }

        function edit_model(assigned_to, note, log_id, id, tech_status) {

            $("#" + tech_status).button('toggle');

            $("#assigned_to").val(assigned_to).change();
            document.getElementById("note").value = (note == "null" ? "" : note);
            document.getElementById("log_id").value = (log_id == "null" ? "" : log_id);
            document.getElementById("id").value = (id == "null" ? "" : id);
            firstValue = $("#assignform").serialize();
        }

        aTable = $('#TechList').DataTable({
            dom: 't',
            ordering: false,
            paging: false,
            ajax: {
                "url": "{{ route('service-log-getTechList') }}",
                "data": {
                    "log_id": '{{ $service_logs->id }}'
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'tech_name',
                    name: 'tech_name'
                },
                {
                    data: 'note',
                    name: 'note'
                },
                {
                    render: function(data, type, row) {

                        var tech_status = row.tech_status;
                        if (tech_status == 'Open') {
                            var html = '';
                            html += '<span class="badge badge-pill badge-primary">Open</span>';
                            return html;
                        } else if (tech_status == 'Closed') {
                            var html = '';
                            html += '<span class="badge badge-pill badge-secondary">Closed</span>';
                            return html;
                        } else {
                            var html = '';
                            html += '<a href="{{ asset('') }}' + tech_status + '">Open File</a>';
                            return html;
                        }


                    }
                },
                {
                    render: function(data, type, row) {

                        var assigned_to = "'" + row.assigned_to + "'";
                        var note = "'" + row.note + "'";
                        var log_id = "'" + row.log_id + "'";
                        var id = "'" + row.id + "'";
                        var tech_status = "'" + row.tech_status + "'";
                        var file_path = row.file_path;
                        var add_techni_id_fk = row.add_techni_id_fk;

                        var html = '';

                        if (file_path) {
                            html +=
                                '<a href="{{ asset('') }}' + file_path +
                                '" type="button" target="_blank" data-hint="Show Image" class="btn btn-sm btn-outline-info mr-1 hint--top" ><i class="fa-solid fa-camera"></i></i></a>';
                        } else {
                            html +=
                                '<button type="button" data-hint="Show Image" onclick="Nofile();" class="btn btn-sm btn-outline-info mr-1 hint--top" ><i class="fa-solid fa-camera"></i></i></button>';
                        }

                        html +=
                            '<button type="button" data-hint="Close/Open only This Chat" onclick="CloseTask(' +
                            add_techni_id_fk + ',' + tech_status +
                            ');" class="btn btn-sm btn-outline-danger mr-1 hint--top" ><i class="fa fa-retweet"></i></button>';
                        html += '<button type="button" data-hint="Edit" onclick="edit_model(' +
                            assigned_to + ',' + note + ',' + log_id + ',' + id + ',' + tech_status +
                            ');" class="btn btn-sm btn-outline-warning mr-1 hint--top"><i class="fa fa-pen"></i></button>';
                        html +=
                            '<button type="button" onclick="CloseFullTask(' + log_id +
                            ')" data-hint="Close Call and Chat" class="btn btn-sm btn-outline-success hint--top" ><i class="fa-solid fa-c"></i></button>';

                        return html;
                    }
                },
            ]
        });

        TvisiHistory = $('#TableVisiHostry').DataTable({
            dom: 't',
            ordering: false,
            paging: false,
            ajax: {
                "url": "{{ route('getVisiHistory') }}",
                "data": {
                    "visi_id": '{{ $service_logs->visi_id }}'
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    render: function(data, type, row) {
                        var log_date = moment(row.log_date).format('DD-MMM-YYYY');
                        var html = '';
                        html += '<div>' + log_date + '</div>';
                        return html;
                    }
                },
                {
                    data: 'details',
                    name: 'details'
                },
                {
                    data: 'tech_men',
                    name: 'tech_men'
                },
            ]
        });

        function Nofile() {
            message('No Attachment !', '#FECC43', '#1A389F', 'info', 'Info');
        }

        function RadioBut(tech_status) {

            if (tech_status == 'Open') {
                $("#Open").attr('checked', true);
                $("#Open").addClass('btn-danger');
                $("#Open").removeClass('btn-outline-danger');

                $("#Closed").attr('checked', false);
                $("#Closed").addClass('btn-outline-danger');
                $("#Closed").removeClass('btn-danger');

            } else {
                $("#Closed").attr('checked', true);
                $("#Closed").addClass('btn-danger');
                $("#Closed").removeClass('btn-outline-danger');

                $("#Open").attr('checked', false);
                $("#Open").addClass('btn-outline-danger');
                $("#Open").removeClass('btn-danger');
            }
        }

        function CloseTask(add_techni_id_fk, log_status) {
            $.ajax({
                beforeSend: function() {
                    $('#spinShowHide').show();
                },
                error: function() {
                    $('#spinShowHide').hide();
                },
                complete: function() {
                    $('#spinShowHide').hide();
                },
                type: "GET",
                url: "{{ route('service-log-CloseOpenTask') }}", // Route
                data: {
                    'add_techni_id_fk': add_techni_id_fk,
                    'log_status': log_status
                },
                success: function(res) {
                    message(res.messege, '#29912b', 'white', 'error',
                        'Success');
                    $('#TechList').DataTable().ajax.reload();
                }
            })

        }

        function CloseFullTask(log_id) {
            $.ajax({
                beforeSend: function() {
                    $('#spinShowHide').show();
                },
                error: function() {
                    $('#spinShowHide').hide();
                },
                complete: function() {
                    $('#spinShowHide').hide();
                },
                type: "GET",
                url: "{{ route('FullTaskClose') }}", // Route
                data: {
                    'log_id': log_id
                },
                success: function(res) {
                    message(res.messege, '#29912b', 'white', 'error',
                        'Success');
                    $('#TechList').DataTable().ajax.reload();
                }
            })

        }
    </script>
@endpush
