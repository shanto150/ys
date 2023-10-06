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
        {{-- model --}}
        <div class="modal zoomer" tabindex="-1" id="myModal" data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form id="myform" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Request</h5>

                            <img src="{{ URL::asset('/res/images/appimages/lod1.gif') }}" alt="profile Pic" height="30"
                                width="30" id="modelSpinner" />

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
                                            style="text-transform:capitalize" class="form-control" placeholder="Outlet Name"
                                            autocomplete="off">
                                        <label for="outlet_name">Outlet Name</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="outlet_mobile" onkeyup="MobileCountValidate(this);" maxlength="11" name="outlet_mobile" class="form-control"
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
                                        style="text-transform:capitalize" class="form-control border-danger" placeholder="Complains"
                                        autocomplete="off">
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
                                class="btn btn-warning me-5"><i class="fa fa-eraser" aria-hidden="true"></i>
                                Clear</button>
                            <button type="button" onclick="FromsCheck();" class="btn btn-success"><i
                                    class="fa fa-check" aria-hidden="true"></i> Save</button>
                            <button type="button" class="btn btn-danger"
                                onclick="document.getElementById('myform').reset();" data-target="#myModal"
                                data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        {{-- End model --}}
        <div class="card card-none">
            <div class="card-header bg-gradient-info">
                <h3 class="card-title"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp; Service List</h3>
                <div class="card-tools">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn bg-info"><i
                            class="fa fa-plus" aria-hidden="true"></i> New</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped" id="EntryTable" width="100%">

                    <thead>
                        <tr>
                            <th class="text-center">Sn#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Visi Info</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">complains</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
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
        $('.select2').select2();
        $('#modelSpinner').hide();
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

        aTable = $('#EntryTable').DataTable({

            processing: false,
            serverSide: false,
            ajax: "{{ route('get-log-data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    render: function(data, type, row) {
                        var outlet_code = row.outlet_code;
                        var outlet_name = row.outlet_name;
                        var html = '';
                        html += '<div>' + outlet_code + '-' + outlet_name + '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var visi_id = row.visi_id;
                        var visi_size = row.visi_size;
                        var html = '';
                        html += '<div> Visi id : ' + visi_id + ' Size : ' + visi_size + '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var outlet_mobile = row.outlet_mobile;
                        var person_mobile = row.person_mobile;
                        var html = '';
                        html += '<div>' + outlet_mobile + '-' + person_mobile + '</div>';
                        return html;
                    }
                },
                {
                    data: 'complains',
                    name: 'complains'
                },
                {
                    data: 'status',
                    name: 'status'
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
                        html += '<div class="row justify-content-center align-items-center">';
                        html +=
                            '<button type="button" class="btn btn-sm btn-primary hvr-grow m-1" style="width: 120px" onclick="edit_model(' +
                            status + ',' + outlet_code + ',' + outlet_name +
                            ',' + outlet_mobile + ',' + person_mobile + ',' + outlet_address + ',' +
                            visi_id + ',' + visi_size + ',' + db_name + ',' + se_area + ',' + asm_area +
                            ',' + complains +
                            ',' + log_date + ',' + first_response_date + ',' + brand +
                            ',' + remarks + ',' + id + ')">';
                        html += '<i class="ri-arrow-up-line"></i> Edit</button>';
                        html +='<button type="button" class="btn btn-sm btn-info m-1" style="width: 120px" onclick="callAddt(' + id + ')"><i class="ri-arrow-up-line"></i> + Technician</button>';
                        html +='<button type="button" class="btn btn-sm btn-success m-1" style="width: 120px" onclick="#"><i class="ri-arrow-up-line"></i> Prepare Invoice</button>';
                        html +='<button type="button" class="btn btn-sm btn-danger m-1" style="width: 120px" onclick="del(' + id + ');"><i class="ri-arrow-up-line"></i> Delete</button>';
                        html += '</div>';
                        return html;
                    }
                },
            ]
        });

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
                            getOutletDetails(suggestion.value);
                        }
                    });
                }
            });

        }

        function getOutletDetails(outletCode) {

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
                    data: {'outlet_code': outletCode},
                    success: function(res) {
                        console.log(res.suggestion[0].outlet_name);
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

            var url = '{{ route("serviceTechAddindex", ":id") }}';
            url = url.replace(':id', callid);
            window.location.href = url;

        }
    </script>
@endpush
