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



        <div class="row">

            <div class="col-md-5">
                <div class="card border border-01 border-info">
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
            </div>
            <div class="col-md-7">
                <div class="card border border-01 border-success">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-list-ul" aria-hidden="true"></i> Invoice Preparation</h3>
                    </div>
                    <div class="card-body m-0">
                        <form id="myform">
                            @csrf

                            <div class="row m-0">
                                <div class="mb-1">
                                    <table id="inputTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">SN</th>
                                                <th style="width: 15%">Invoice Date</th>
                                                <th style="width: 35%">Item Name</th>
                                                <th style="width: 20%">QtyUnit</th>
                                                <th style="width: 15%">Rate</th>
                                                <th style="width: 15%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-info m-1" onclick="addField();"><i
                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-sm btn-info m-1" onclick="removeField();"><i
                                                class="fa fa-minus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" form="assignform" onclick="save();"
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
        $('.select2').select2();
        var firstValue = $("#myform").serialize();

        $(document).ready(function() {

            AutoItems();

        });

        function AutoTotal(params) {
            var qty = $(params).closest('tr').find("td:eq(2) input").val();
            var rate = $(params).closest('tr').find("td:eq(3) input").val();
            $(params).closest('tr').find("td:eq(4) input").val(qty * rate);
        }


        function addField(argument) {
            var ssl=+$('#inputTable tr:last').find('td:first').html();
            var ssln=isNaN(ssl) ? 0 : ssl ;
            var sl=(ssln+1);
            var html = '';
            html += '<tr>'
            html += '<td>'+sl+'</td>'
            html += '<td><input type="date" id="invoice_month" name="invoice_month[]" class="form-control"></td>';
            html +=
                    '<td><input type="text" value="' +sl +'" id="sl" hidden name="sl[]" class="form-control "></td>';
            html +=
                '<td><select class="form-control select2" name="invoice_item_id[]" form="myform" id="invoice_item_id" style="width: 100%;"> <option selected value="">=Select=</option>  @foreach ($Price_lists as $Price_list) <option value="{{ $Price_list->id }}" data-unit="{{ $Price_list->unit }}"> {{ $Price_list->name }} </option> @endforeach</select></td>';
            html +=
                '<td><div class="input-group"> <input type="number" oninput="AutoTotal(this)" min="1" form="myform" name="quantity[]" id="quantity" class="form-control w-70" aria-label="Input group example" aria-describedby="btnGroupAddon2"> <div class="input-group-prepend"><div class="input-group-text w-30" id="unitshow">Unit</div><input type="text" id="unit" form="myform" name="unit[]" value="" hidden>  </div></div></td>';
            html +=
                '<td><input type="number" min="1" oninput="AutoTotal(this)" name="rate[]" class="form-control" id="JOB_TITLE"></td>';
            html += '<td><input type="number" min="1" name="total_amount[]" class="form-control" id="JOB_TITLE"></td>';
            html += '</tr>'
            $('#inputTable').append(html);
        }

        function removeField() {
            var myTable = document.getElementById("inputTable");
            var currentIndex = myTable.rows.length;
            document.getElementById("inputTable").deleteRow(currentIndex - 1);
        }

        function AutoItems() {
            var arrays = @json($inv_items);
            var obj = jQuery.parseJSON(arrays);
            $.each(obj, function(key, value) {
                var asl=key+1;
                var html = '';
                html += '<tr>'
                html += '<td>'+asl+'</td>'
                html +=
                    '<td><input type="text" value="' +asl +'" id="sl" hidden name="sl[]" class="form-control "></td>';
                html +=
                    '<td><input type="date" value="' + value.dt +
                    '" id="invoice_month" name="invoice_month[]" class="form-control "></td>';
                html +=
                    '<td> <input type="text" readonly value="' + value.name +
                    '" id="item_name" class="form-control"> <input type="text" value="' + value.invoice_item_id +
                    '" id="item_name" hidden name="invoice_item_id[]" class="form-control"></td>';
                html +=
                    '<td><div class="input-group"> <input type="number" min="1" oninput="AutoTotal(this)" value="' +
                    value.quantity +
                    '" form="myform" name="quantity[]" id="quantity" class="form-control w-70" aria-label="Input group example" aria-describedby="btnGroupAddon2"> <div class="input-group-prepend"><div class="input-group-text w-30" id="unitshow">' +
                    value.unit + '</div><input type="text"  value="' + value.unit +
                    '" id="unit" form="myform" name="unit[]" value="" hidden>  </div></div></td>';
                html += '<td><input type="number"  min="1" value="' + Math.ceil(value.price) +
                    '" name="rate[]" oninput="AutoTotal(this)" class="form-control" id="JOB_TITLE"></td>';
                html += '<td><input type="number"  min="1" value="' + Math.ceil(value.total) +
                    '" name="total_amount[]" class="form-control" id="JOB_TITLE"></td>';
                html += '</tr>'
                $('#inputTable').append(html);

            });
        }

        function save() {

            var allInputs = $("#myform").serialize();
            var formData = new FormData(myform);
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
                    url: "{{ route('store-preinvoice') }}",
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
                            // $('#TechList').DataTable().ajax.reload();
                        }
                    }
                });
            }

        }
    </script>
@endpush
