@extends('home.master')
@push('style')
    <style>
        .autocomplete-suggestions {
            border: 1px solid #999;
            background: #FFF;
            cursor: default;
            overflow: auto;
        }

        .autocomplete-suggestion {
            padding: 2px 5px;
            white-space: nowrap;
            overflow: hidden;
        }

        .autocomplete-selected {
            background: #F0F0F0;
        }

        .autocomplete-suggestions strong {
            font-weight: normal;
            color: #FF0000;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">

        <div class="card card-none">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-bolt text-danger"></i> Filters</h3>
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

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <div class="card card-body h-100 justify-content-center align-items-center pb-0 pt-0 pr-2 pl-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group form-label-group in-border" id="range_id">
                                        <input type="text" value="" class="form-control daterange" id="daterangea">
                                        <label for="daterange">Date Range</label>
                                        <div class="input-group-append">
                                            <div class="input-group-text" id="rangeButton"><i class="fa fa-calendar"
                                                    style="color:blue"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-label-group in-border">
                                        <select class="form-control select2" form="myform" name="SE" id="SE"
                                            style="width: 100%;">
                                            <option selected value="">ALL</option>
                                            @foreach ($se as $value)
                                                <option value="{{ $value->se_area }}">{{ $value->se_area }}</option>
                                            @endforeach
                                        </select>
                                        <label for="assigned_to">SE</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-label-group in-border">
                                        <select class="form-control select2" form="myform" name="ASM" id="ASM"
                                            style="width: 100%;">
                                            <option selected value="">ALL</option>
                                            @foreach ($asm as $value)
                                                <option value="{{ $value->asm_area }}">{{ $value->asm_area }}</option>
                                            @endforeach
                                        </select>
                                        <label for="assigned_to">ASM</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 " onclick="ClickALL()">
                                <div class="counter brown">
                                    <span class="counter-value" id="all">1</span>
                                    <h3>ALL</h3>
                                    <div class="counter-icon">
                                        <i class="fa-brands fa-amilia"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 " onclick="ClickRec()">
                                <div class="counter yellow">
                                    <span class="counter-value" id="Recived1">1</span>
                                    <h3>Recived</h3>
                                    <div class="counter-icon">
                                        <i class="fa-solid fa-handshake"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 " onclick="ClickAssigned()">
                                <div class="counter">
                                    <span class="counter-value" id="Assigned1">1</span>
                                    <h3>Assigned</h3>
                                    <div class="counter-icon">
                                        <i class="fa-solid fa-thumbtack"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 " onclick="ClickHold()">
                                <div class="counter magenta">
                                    <span class="counter-value" id="Hold1">1</span>
                                    <h3>Hold</h3>
                                    <div class="counter-icon">
                                        <i class="fa-solid fa-hand"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 " onclick="ClickVoid()">
                                <div class="counter red">
                                    <span class="counter-value" id="Void1">1</span>
                                    <h3>Void</h3>
                                    <div class="counter-icon">
                                        <i class="fa-solid fa-trash"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 " onclick="ClickClosed()">
                                <div class="counter green">
                                    <span class="counter-value" id="Closed1">1</span>
                                    <h3>Closed</h3>
                                    <div class="counter-icon">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        {{-- model --}}
        <div class="modal zoomer" tabindex="-1" id="myModal" data-backdrop="static" data-keyboard="false"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form id="myform" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Request</h5>

                            <img src="{{ URL::asset('/res/images/appimages/lod1.gif') }}" alt="profile Pic"
                                height="30" width="30" id="modelSpinner" />
                            <div class="card-tools">
                                <button type="button" onclick="document.getElementById('myform').reset();"
                                    class="btn btn-tool" data-target="#myModal" data-dismiss="modal">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="row justify-content-center mb-3 ml-2 mr-2 p-2">

                                <div class="icheck-success d-inline">
                                    <input type="radio" name="status" value="Received" checked id="Received">
                                    <label for="Received">Received</label>
                                </div>
                                &nbsp;&nbsp;&nbsp;
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="status" value="Assigned" id="Assigned">
                                    <label for="Assigned">Assigned</label>
                                </div>
                                &nbsp;&nbsp;&nbsp;
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="status" value="Hold" id="Hold">
                                    <label for="Hold">Hold</label>
                                </div>
                                &nbsp;&nbsp;&nbsp;
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="status" value="Void" id="Void">
                                    <label for="Void">Void</label>
                                </div>
                                &nbsp;&nbsp;&nbsp;
                                <div class="icheck-success d-inline ">
                                    <input type="radio" name="status" value="Closed" id="Closed">
                                    <label for="Closed">Closed</label>
                                </div>

                            </div>

                            <div class="row m-0">

                                <div class="col-md-2">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="outlet_code" name="outlet_code" class="form-control"
                                            placeholder="Outlet Code" autocomplete="off">
                                        <label for="outlet_code">Outlet Code</label>
                                    </div>

                                </div>

                                <input type="text" name="id" id="id" value="0" hidden>

                                <div class="col-md-4">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="outlet_name" name="outlet_name"
                                            style="text-transform:capitalize" class="form-control"
                                            placeholder="Outlet Name" autocomplete="off">
                                        <label for="outlet_name">Outlet Name</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="outlet_mobile" onkeyup="MobileCountValidate(this);"
                                            maxlength="11" name="outlet_mobile" class="form-control"
                                            placeholder="Outlet Mobile" autocomplete="off">
                                        <label for="outlet_mobile">Outlet Mobile</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="tel" maxlength="11" id="person_mobile" name="person_mobile"
                                            onkeyup="MobileCountValidate(this)" class="form-control"
                                            placeholder="Person Mobile" autocomplete="off">
                                        <label for="person_mobile">Per Mobile</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="form-label-group in-border">
                                    <input type="text" id="outlet_address" style="text-transform:capitalize"
                                        name="outlet_address" class="form-control" placeholder="Outlet Address"
                                        autocomplete="off">
                                    <label for="outlet_address">Outlet Address</label>
                                </div>
                            </div>

                            <div class="row m-0">

                                <div class="col-md-2 col-6">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="visi_id" name="visi_id" class="form-control"
                                            placeholder="visi ID" autocomplete="off">
                                        <label for="visi_id">visi ID</label>
                                    </div>
                                </div>

                                <div class="col-md-2 col-6">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="visi_size" name="visi_size" class="form-control"
                                            placeholder="visi Size" autocomplete="off">
                                        <label for="visi_size">visi Size</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="db_name" name="db_name"
                                            style="text-transform:capitalize" class="form-control" placeholder="DB Name"
                                            autocomplete="off">
                                        <label for="db_name">DB Name</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="se_area" name="se_area"
                                            style="text-transform:capitalize" class="form-control" placeholder="SE Area"
                                            autocomplete="off">
                                        <label for="se_area">SE Area</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="asm_area" name="asm_area"
                                            style="text-transform:capitalize" class="form-control" placeholder="asm Area"
                                            autocomplete="off">
                                        <label for="asm_area">asm Area</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="form-label-group in-border">
                                    <input type="text" id="complains" name="complains"
                                        style="text-transform:capitalize" class="form-control border-danger"
                                        placeholder="Complains" autocomplete="off">
                                    <label for="complains">Complains</label>
                                </div>
                            </div>

                            <div class="row m-0">

                                <div class="col-md-2">
                                    <div class="form-label-group in-border">
                                        <input type="date" id="log_date" name="log_date" class="form-control"
                                            value="{{ date('Y-m-d') }}">
                                        <label for="log_date">Call Date</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-label-group in-border">
                                        <input type="date" id="first_response_date" name="first_response_date"
                                            class="form-control" value="">
                                        <label for="first_response_date">First Response</label>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="brand" name="brand" class="form-control"
                                            placeholder="Brand" autocomplete="off">
                                        <label for="brand">Brand</label>
                                    </div>
                                </div>


                            </div>

                            <div class="col-12">
                                <div class="form-label-group in-border">
                                    <textarea id="remarks" name="remarks" style="text-transform:capitalize" class="form-control" cols="50"
                                        rows="3"></textarea>
                                    <label for="remarks">Note</label>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="document.getElementById('myform').reset();"
                                class="btn btn-sm btn-warning me-5"><i class="fa fa-eraser" aria-hidden="true"></i>
                                Clear</button>
                            <button type="button" onclick="FromsCheck();" class="btn btn-sm btn-success"><i
                                    class="fa fa-check" aria-hidden="true"></i> Save</button>
                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="document.getElementById('myform').reset();" data-target="#myModal"
                                data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End model --}}
        <div class="card card-none">
            <div class="card-header ">
                <h3 class="card-title"><i class="fa fa-cogs text-danger" aria-hidden="true"></i> &nbsp; Service List</h3>
                <div class="card-tools">
                    <button type="button"  data-toggle="modal" data-target="#myModal"
                        class="btn btn-sm bg-gradient-success"><i class="fa fa-plus" aria-hidden="true"></i> New</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped" id="EntryTable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center w-5">Sn#</th>
                            <th class="text-center w-5">Code</th>
                            <th class="text-center w-15">Name</th>
                            <th class="text-center w-10">Visi</th>
                            <th class="text-center w-10">Dates</th>
                            <th class="text-center w-10">Area</th>
                            <th class="text-center w-10">Complains</th>
                            <th class="text-center w-10">Status</th>
                            <th class="text-center w-10">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $('#spinShowHide').hide();
        $(document).ready(function() {

            dTable('', '', '', '');

        });
        $('#modelSpinner').hide();

        var allval = '';
        var datevalue = '';
        var SEval = '';
        var ASMval = '';



        // $("#outlet_mobile").inputmask("99999-999-999");

        var firstValue = $("#myform").serialize();

        function FromsCheck() {
            var outlet_code = document.getElementById('outlet_code').value;
            if (outlet_code == '') {
                message('Please Enter Code', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("outlet_code").focus();
                return false;
            }
            var outlet_name = document.getElementById('outlet_name').value;
            if (outlet_name == '') {
                message('Please Enter Outlet Name', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("outlet_name").focus();
                return false;
            }
            var outlet_mobile = document.getElementById('outlet_mobile').value;
            if (outlet_mobile == '') {
                message('Please Enter Outlet Mobile', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("outlet_mobile").focus();
                return false;
            }
            var outlet_address = document.getElementById('outlet_address').value;
            if (outlet_address == '') {
                message('Outlet Aaddress', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("outlet_address").focus();
                return false;
            }
            var visi_id = document.getElementById('visi_id').value;
            if (visi_id == '') {
                message('Enter visi id', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("visi_id").focus();
                return false;
            }
            var visi_size = document.getElementById('visi_size').value;
            if (visi_size == '') {
                message('Enter visi size', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("visi_size").focus();
                return false;
            }
            var db_name = document.getElementById('db_name').value;
            if (db_name == '') {
                message('Enter db name', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("db_name").focus();
                return false;
            }
            var se_area = document.getElementById('se_area').value;
            if (se_area == '') {
                message('Enter se area', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("se_area").focus();
                return false;
            }
            var asm_area = document.getElementById('asm_area').value;
            if (asm_area == '') {
                message('Enter asm area', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("asm_area").focus();
                return false;
            }
            var complains = document.getElementById('complains').value;
            if (complains == '') {
                message('Enter complains', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("complains").focus();
                return false;
            }
            save();
            return true;
        }

        function save() {

            var allInputs = $("#myform").serialize();
            var formData = new FormData(myform);
            if (firstValue == allInputs) {
                message('Nothing changed !', '#FECC43', '#1A389F', 'info', 'Info');
            } else {
                $.ajax({
                    beforeSend: function() {
                        $('#modelSpinner').show();
                    },
                    error: function(res) {
                        $('#modelSpinner').hide();
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
                        $('#modelSpinner').hide();
                    },
                    type: 'POST',
                    url: "{{ route('service-log-store') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(res) {
                        if (res.types == 'e') {
                            message(res.messege, '#FF0000', 'white', 'error', 'error');
                        } else {
                            message(res.messege, '#29912b', 'white', 'error', 'Success');
                            document.getElementById('myform').reset();
                            $('#myModal').modal('hide');
                            $('#EntryTable').DataTable().ajax.reload(function(settings, json) {});
                        }
                    }
                });
            }

        }

        function edit_model(status, outlet_code, outlet_name, outlet_mobile, person_mobile, outlet_address, visi_id,
            visi_size, db_name, se_area, asm_area, complains, log_date, first_response_date,
            brand, remarks, rwid) {
            $("#" + status).prop('checked', true);
            document.getElementById("outlet_code").value = (outlet_code == "null" ? "" : outlet_code);
            document.getElementById("outlet_name").value = (outlet_name == "null" ? "" : outlet_name);
            document.getElementById("outlet_mobile").value = (outlet_mobile == "null" ? "" : outlet_mobile);
            document.getElementById("person_mobile").value = (person_mobile == "null" ? "" : person_mobile);
            document.getElementById("outlet_address").value = (outlet_address == "null" ? "" : outlet_address);
            document.getElementById("visi_id").value = (visi_id == "null" ? "" : visi_id);
            document.getElementById("visi_size").value = (visi_size == "null" ? "" : visi_size);
            document.getElementById("db_name").value = (db_name == "null" ? "" : db_name);
            document.getElementById("se_area").value = (se_area == "null" ? "" : se_area);
            document.getElementById("asm_area").value = (asm_area == "null" ? "" : asm_area);
            document.getElementById("complains").value = (complains == "null" ? "" : complains);
            document.getElementById("log_date").value = (log_date == "null" ? "" : log_date);
            document.getElementById("first_response_date").value = (first_response_date == "null" ? "" :
                first_response_date);
            document.getElementById("brand").value = (brand == "null" ? "" : brand);
            document.getElementById("remarks").value = (remarks == "null" ? "" : remarks);
            document.getElementById("id").value = rwid;
            $('#myModal').modal('show');
            firstValue = $("#myform").serialize();
        }

        function dTable(dateRange, Status, SEarea, ASMarea) {

            $('#EntryTable').DataTable({
                processing: false,
                serverSide: false,
                responsive: true,
                bDestroy: true,
                dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                        extend: 'print',
                        text: '<i class="fa fa-print text-info"></i> Print',
                        title: 'Call Data',
                        className: 'btn btn-warning btn-sm text-secondary',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel text-warning"></i> Excel',
                        title: 'Call Data',
                        className: 'btn btn-info btn-sm text-white',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }
                ],
                columnDefs: [{
                    "defaultContent": "N/A",
                    "targets": "_all",
                    "orderable": false,
                    
                },
                { "width": "10%", "targets": 8 }
            ],
                initComplete: function(settings, json) {

                    var sum = $('#EntryTable').DataTable().column(0).data().count();
                    $('#all').html(sum);

                    var table = $('#EntryTable').DataTable();

                    var cReceived = table.rows(function(idx, data, node) {
                        return data.status == 'Received';
                    }).count();

                    var cAssigned = table.rows(function(idx, data, node) {
                        return data.status == 'Assigned';
                    }).count();

                    var cHold = table.rows(function(idx, data, node) {
                        return data.status == 'Hold';
                    }).count();

                    var cVoid = table.rows(function(idx, data, node) {
                        return data.status == 'Void';
                    }).count();

                    var cClosed = table.rows(function(idx, data, node) {
                        return data.status == 'Closed';
                    }).count();

                    $('#Recived1').html(cReceived);
                    $('#Assigned1').html(cAssigned);
                    $('#Hold1').html(cHold);
                    $('#Void1').html(cVoid);
                    $('#Closed1').html(cClosed);

                    $('.counter-value').each(function() {
                        $(this).prop('Counter', 0).animate({
                            Counter: $(this).text()
                        }, {
                            duration: 1000,
                            easing: 'swing',
                            step: function(now) {
                                $(this).text(Math.ceil(now));
                            }
                        });
                    });
                },
                ajax: {
                    url: "{{ route('get-log-data') }}",
                    data: {
                        dateRange: dateRange,
                        Status: Status,
                        SEarea: SEarea,
                        ASMarea: ASMarea,
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'outlet_code',
                        name: 'outlet_code'
                    },
                    {
                        render: function(data, type, row) {
                            var ttl = row.ttl;
                            var outlet_name = row.outlet_name;
                            var outlet_mobile = row.outlet_mobile;
                            var person_mobile = row.person_mobile;
                            var outlet_address = row.outlet_address;
                            var html = '';
                            html += '<div>' + outlet_name + '</div>';
                            html += '<div>' + outlet_mobile + '-' + person_mobile + '</div>';
                            html += '<div>' + outlet_address + '</div>';
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var visi_id = row.visi_id;
                            var visi_size = row.visi_size;
                            var brand = row.brand;
                            var html = '';
                            html += '<div> Visi id : ' + visi_id + '</div>';
                            html += '<div> Size :' + visi_size + '</div>';
                            html += '<div> Brand :' + brand + '</div>';
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var log_date = moment(row.log_date).format('DD-MMM-YYYY');
                            var assigned_date = row.assigned_date ? moment(row.assigned_date).format('DD-MMM-YYYY h:mm:ss a') : 'Not Found';
                            var close_date = row.close_date ? moment(row.close_date).format('DD-MMM-YYYY') : 'Not Found';
                            var html = '';
                            html += '<div> Call : ' + log_date + '</div>';
                            html += '<div> Assign : ' + assigned_date + '</div>';
                            html += '<div> Close : ' + close_date + '</div>';
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var sear = row.se_area;
                            var asma = row.asm_area;
                            var html = '';
                            html += '<div> SE Area : ' + sear + '</div>';
                            html += '<div> ASM Area : ' + asma + '</div>';
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var complains = row.complains;
                            var t_status = row.t_status;
                            var assigned_to = row.asin? row.asin:'Not Assigned';
                            var html = '';
                            html += '<div> comp : ' + complains + '</div>';
                            if (t_status=='Open') {
                                html += '<div> Tech : '+assigned_to+' <span style="font-size: 8px" class="badge badge-pill badge-info">' + t_status +
                                        '</span></div>';
                            } else {
                                html += '<div> Tech : '+assigned_to+' <span style="font-size: 8px" class="badge badge-pill badge-danger">' + t_status +
                                        '</span></div>';
                            }
                            
                            return html;
                        }
                    },
                    {

                        render: function(data, type, row) {
                            var status = row.status;
                            var mid = row.id;
                            var pre_invoice_status = row.pre_invoice_status;
                            if (pre_invoice_status == 'Yes') {
                                var html = '';

                                if (status == 'Received') {
                                    html += '<div><span class="badge badge-pill badge-warning">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else if (status == 'Assigned') {
                                    html += '<div><span class="badge badge-pill badge-info">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else if (status == 'Hold') {
                                    html += '<div><span class="badge badge-pill badge-muted">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else if (status == 'Void') {
                                    html += '<div><span class="badge badge-pill badge-muted">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else {
                                    html += '<div><span class="badge badge-pill badge-success">' + status +
                                        '</span><i class="fa fa-check" style="color: green; margin-left: 1px;"></i></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                }

                            } else {
                                var html = '';
                                if (status == 'Received') {
                                    html += '<div><span class="badge badge-pill badge-warning">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else if (status == 'Assigned') {
                                    html += '<div><span class="badge badge-pill badge-info">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else if (status == 'Hold') {
                                    html += '<div><span class="badge badge-pill badge-muted">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else if (status == 'Void') {
                                    html += '<div><span class="badge badge-pill badge-muted">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                } else {
                                    html += '<div><span class="badge badge-pill badge-success">' + status +
                                        '</span></div>';
                                        html += '<div class="text-center">'+mid+'</div>';
                                    return html;
                                }


                            }

                        }

                    },
                    {
                        render: function(data, type, row) {

                            var status = "'" + row.status + "'";
                            var outlet_code = "'" + row.outlet_code + "'";
                            var outlet_name = "'" + row.outlet_name + "'";
                            var outlet_mobile = "'" + row.outlet_mobile + "'";
                            var person_mobile = "'" + row.person_mobile + "'";
                            var outlet_address = "'" + row.outlet_address + "'";
                            var visi_id = "'" + row.visi_id + "'";
                            var visi_size = "'" + row.visi_size + "'";
                            var db_name = "'" + row.db_name + "'";
                            var se_area = "'" + row.se_area + "'";
                            var asm_area = "'" + row.asm_area + "'";
                            var complains = "'" + row.complains + "'";
                            var log_date = "'" + row.log_date + "'";
                            var first_response_date = "'" + row.first_response_date + "'";
                            var brand = "'" + row.brand + "'";
                            var remarks = "'" + row.remarks + "'";
                            var id = "'" + row.id + "'";

                            var html = '';
                            html += '<div class="d-block" >';
                            html +=
                                '<button type="button" class="btn btn-xs btn-primary hvr-grow mr-1" style="width: 40px" onclick="edit_model(' +
                                status + ',' + outlet_code + ',' + outlet_name +
                                ',' + outlet_mobile + ',' + person_mobile + ',' + outlet_address + ',' +
                                visi_id + ',' + visi_size + ',' + db_name + ',' + se_area + ',' + asm_area +
                                ',' + complains +
                                ',' + log_date + ',' + first_response_date + ',' + brand +
                                ',' + remarks + ',' + id + ')">';
                            html += 'Edit</button>';
                            html +=
                                '<button type="button" class="btn btn-xs btn-info hvr-grow " style="width: 40px" onclick="callAddt(' +
                                id + ')">Tech</button>';
                            html += '</div>';
                            html += '<div class="d-block mt-1" >';
                            html +=
                                '<button type="button" class="btn btn-xs btn-success hvr-grow  mr-1" style="width: 40px" onclick="CallPreInvoice(' +
                                id + ',' + status + ',' + visi_id +
                                ')">P-Inv</button>';
                            html +=
                                '<button type="button" class="btn btn-xs btn-danger hvr-grow " style="width: 40px" onclick="del(' +
                                id + ');">Del</button>';
                            html += '</div>';
                            return html;
                        }
                    },
                ]
            });
        }

        getOutletCode();

        function getOutletCode() {

            $.ajax({
                beforeSend: function() {
                    $('#modelSpinner').show();
                },
                error: function(res) {
                    $('#modelSpinner').hide();
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
                    $('#modelSpinner').hide();
                },
                type: 'GET',
                url: "{{ route('get-outlet_code') }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#outlet_code').autocomplete({
                        lookup: res.suggestion,
                        onSelect: function(suggestion) {

                            console.log(suggestion.value);
                            var parts = suggestion.value.split("-");
                            var oCode = parts[0];
                            var oVisi = parts[1];
                            $('#outlet_code').val(oCode);
                            getOutletDetails(oCode, oVisi);
                        }
                    });
                }
            });

        }

        function getOutletDetails(outletCode, visi_id) {

            $.ajax({
                beforeSend: function() {
                    $('#modelSpinner').show();
                },
                error: function(res) {
                    $('#modelSpinner').hide();
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
                    $('#modelSpinner').hide();
                },
                type: 'GET',
                url: "{{ route('get-outlet_detais') }}",
                data: {
                    'outlet_code': outletCode,
                    'visi_id': visi_id,
                },
                success: function(res) {
                    // console.log(res.suggestion[0].outlet_name);
                    $('#outlet_name').val(res.suggestion[0].outlet_name);
                    $('#outlet_mobile').val(res.suggestion[0].outlet_mobile);
                    $('#person_mobile').val(res.suggestion[0].person_mobile);
                    $('#outlet_address').val(res.suggestion[0].outlet_address);
                    $('#visi_id').val(res.suggestion[0].visi_id);
                    $('#visi_size').val(res.suggestion[0].visi_size);
                    $('#db_name').val(res.suggestion[0].db_name);
                    $('#se_area').val(res.suggestion[0].se_area);
                    $('#asm_area').val(res.suggestion[0].asm_area);
                }
            });
        }

        function callAddt(callid) {

            // var url = '{{ route('serviceTechAddindex', ':id') }}';
            // url = url.replace(':id', callid);
            var url = route('serviceTechAddindex', {
                id: callid
            });
            window.location.href = url;

        }

        function CallPreInvoice(callid, status, visi_id) {

            if (status == 'Closed') {
                var url = route('goPreInvoice', {
                    id: callid,
                    visi_id: visi_id
                });
                window.location.href = url;
            } else {
                message('Task Not Closed.', '#FF0000', 'white', 'error', 'Error');
            }

        }

        //Date range picker
        $('#daterangea').daterangepicker({
            autoApply: true,
            showDropdowns: true,
            autoUpdateInput: false,
            "locale": {
                "format": "DD-MMM-YYYY",
            }
        });


        $('#daterangea').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MMM-YYYY') + '~' + picker.endDate.format('DD-MMM-YYYY'));
            console.log(picker.startDate.format('YYYY-MM-DD'));
            console.log(picker.endDate.format('YYYY-MM-DD'));
            var dr = picker.startDate.format('YYYY-MM-DD') + ',' + picker.endDate.format('YYYY-MM-DD');
            datevalue = dr;
            dTable(dr, allval, SEval, ASMval);
        });

        $('#daterangea').on('hide.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MMM-YYYY') + '~' + picker.endDate.format('DD-MMM-YYYY'));
            $('#daterangea').val('');
            datevalue='';
            dTable(datevalue, allval, SEval, ASMval);
        });

        $('#rangeButton').on('click', function() {
            $('input[id="daterangea"]').trigger('click');
        });

        function ClickALL() {
            $('#daterangea').val('');
            datevalue = '';
            dTable('', '', '', '');
            allval = '';
            datevalue = '';
            SEval = '';
            ASMval = '';
            $('#SE').val(null).trigger('change');
            $('#ASM').val(null).trigger('change');
        }

        function ClickRec() {
            dTable(datevalue, 'Received');
            allval = 'Received';
        }

        function ClickAssigned() {
            dTable(datevalue, 'Assigned');
            allval = 'Assigned';
        }

        function ClickHold() {
            dTable(datevalue, 'Hold');
            allval = 'Hold';
        }

        function ClickVoid() {
            dTable(datevalue, 'Void');
            allval = 'Void';
        }

        function ClickClosed() {
            dTable(datevalue, 'Closed');
            allval = 'Closed';
        }

        $('#SE').on('select2:select', function(e) {
            SEval = e.params.data.id;
            dTable(datevalue, allval, SEval, ASMval);
        });
        $('#ASM').on('select2:select', function(e) {
            ASMval = e.params.data.id;
            dTable(datevalue, allval, SEval, ASMval);
        });
    </script>
@endpush
