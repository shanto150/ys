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
            <div class="col-md-12">
                <div class="card border border-01 border-info">
                    <div class="card-body">
                        <div class="row justify-content-center text-uppercase display-4 border-bottom mb-3">
                            <span class="badge badge-info mb-3 p-2">{{ $service_logs->status }}</span>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="databox hvr-sweep-to-top">
                                    <span class="icn"><i class="fa fa-chevron-right" style="color: #dd1933"
                                            aria-hidden="true"></i></span>
                                    <span class="label">Outlet Code&nbsp;&nbsp;</span>
                                    <span class="data">{{ $service_logs->outlet_code }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="databox hvr-sweep-to-top">
                                    <span class="icn"><i class="fa fa-chevron-right" style="color: #09c723"
                                            aria-hidden="true"></i></span>
                                    <span class="label">Visi Id / Size&nbsp;&nbsp;</span>
                                    <span
                                        class="data">{{ $service_logs->visi_id . ' / ' . $service_logs->visi_size }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="databox hvr-sweep-to-top">
                                    <span class="icn"><i class="fa fa-chevron-right" style="color: #d904f5"
                                            aria-hidden="true"></i></span>
                                    <span class="label">Outlet Name</span>
                                    <span class="data">{{ $service_logs->outlet_name }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="databox hvr-sweep-to-top">
                                    <span class="icn"><i class="fa fa-chevron-right" style="color: #f39406"
                                            aria-hidden="true"></i></span>
                                    <span class="label">Contacts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</span>
                                    <span class="data">{{ $service_logs->outlet_mobile }} -
                                        {{ $service_logs->person_mobile }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="databox hvr-sweep-to-top">
                                    <span class="icn"><i class="fa fa-chevron-right" style="color: #37A3F0"
                                            aria-hidden="true"></i></span>
                                    <span class="label">Address&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</span>
                                    <span class="data">{{ $service_logs->outlet_address }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="databox hvr-sweep-to-top">
                                    <span class="icn"><i class="fa fa-chevron-right" style="color: #06106e"
                                            aria-hidden="true"></i></span>
                                    <span class="label">Complains&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span class="data">{{ $service_logs->complains }}</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card border border-01 border-success">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-list-alt text-danger" aria-hidden="true"></i> Invoice
                            Preparation</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body m-0">
                        <form id="myform">
                            @csrf

                            <input type="text" hidden id="log_id" name="log_id" value="{{ $log_id }}">
                            <input type="text" hidden id="visi_id" name="visi_id" value="{{ $service_logs->visi_id }}">

                            <div class="row m-0">
                                <div class="mb-1">
                                    <table id="inputTable">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 5%">SN</th>
                                                <th style="width: 10%">Invoice Date</th>
                                                <th style="width: 20%">Item Name</th>
                                                <th style="width: 10%">QtyUnit</th>
                                                <th style="width: 10%">Rate</th>
                                                <th style="width: 10%">Total</th>
                                                <th style="width: 35%">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-info m-1" onclick="addField();"><i
                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-sm btn-info m-1"
                                            onclick="removeField();"><i class="fa fa-minus"
                                                aria-hidden="true"></i></button>
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

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card border border-01 border-warning">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-recycle text-danger" aria-hidden="true"></i> Visi Parts
                            History
                        </h3>
                        <div class="card-tools">
                            <input class="form-control form-control-sm" id="hSearch" type="search"
                                placeholder="Search">
                        </div>

                    </div>
                    <div class="card-body m-0">

                        <table class="table table-sm fl-table table-striped" id="3monthhistory" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10%">Date</th>
                                    <th style="width: 10%">O-Code</th>
                                    <th style="width: 25%">Name</th>
                                    <th style="width: 15%">Quantity</th>
                                    <th style="width: 10%">Rate</th>
                                    <th style="width: 40%">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($last3monthvalue as $val)
                                    <tr>
                                        <td>{{ $val->inv_date }}</td>
                                        <td>{{ $val->outlet_code }}</td>
                                        <td>{{ $val->item_name }}</td>
                                        <td>{{ $val->quantity }}</td>
                                        <td>{{ $val->rate }}</td>
                                        <td>{{ $val->note }}</td>
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
    <script>
        $('#spinShowHide').hide();
        $('.select2').select2();
        var firstValue = $("#myform").serialize();

        $(document).ready(function() {

            AutoItems();

        });


        var Tmonthhistory = $("#3monthhistory").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "pageLength": 10,
            "paging": true,
            "ordering": false,
            "bFilter": false,
            "searching": true,
            "dom": 'tp'
        });

        $('#hSearch').on('input', function() {
            Tmonthhistory.search(this.value).draw();
        });

        function getClick(id) {
            var unit = $(id).find(':selected').data('unit');
            var price = $(id).find(':selected').data('price');
            const cvb = $(id).attr('data-id')
            $('#unitshow_' + cvb).html(unit);
            $('#unit_' + cvb).val(unit);
            $('#rate_' + cvb).val(price);
        }

        function AutoTotal(params) {
            var qty = $(params).closest('tr').find("td:eq(3) input").val();
            var rate = $(params).closest('tr').find("td:eq(4) input").val();
            $(params).closest('tr').find("td:eq(5) input").val(qty * rate);
        }


        function addField(argument) {
            var ssl = +$('#inputTable tr:last').find('td:first input').val();
            var ssln = isNaN(ssl) ? 0 : ssl;
            var sl = (ssln + 1);
            var html = '';
            html += '<tr>'
            html += '<td><input type="text" readonly value="' + sl + '" id="sl" name="sl[]" class="form-control "></td>'
            html += '<td><input type="date" id="invoice_month" name="invoice_month[]" class="form-control"></td>';
            html +=
                '<td><select class="form-control select2" name="invoice_item_id[]" form="myform" data-id=' + sl +
                ' onchange=getClick(this); id="invoice_item_id_' + sl +
                '" style="width: 100%;"> <option selected value="">=Select=</option>  @foreach ($Price_lists as $Price_list) <option value="{{ $Price_list->id }}" data-price="{{ $Price_list->price }}" data-unit="{{ $Price_list->unit }}"> {{ $Price_list->name }} </option> @endforeach</select></td>';
            html +=
                '<td><div class="input-group"> <input type="number" oninput="AutoTotal(this)" min="1" form="myform" name="quantity[]" id="quantity" class="form-control w-70" aria-label="Input group example" aria-describedby="btnGroupAddon2"> <div class="input-group-prepend"><div class="input-group-text w-30" id="unitshow_' +
                sl + '" style="width: 45px">Unit</div><input type="text" id="unit_' + sl +
                '" form="myform" name="unit[]" value="" hidden>  </div></div></td>';
            html +=
                '<td><input type="number" min="1" oninput="AutoTotal(this)" name="rate[]" class="form-control" id="rate_' +
                sl + '"></td>';
            html += '<td><input type="number" min="1" name="total_amount[]" class="form-control" id="JOB_TITLE"></td>';
            html += '<td><input type="text" name="note[]" class="form-control" id="note"></td>';
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
                var asl = key + 1;
                var html = '';
                html += '<tr>'
                html += '<td><input type="text" readonly value="' + asl +
                    '" id="sl" name="sl[]" class="form-control "></td>'
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
                    '" form="myform" name="quantity[]" id="quantity" class="form-control w-70" aria-label="Input group example" aria-describedby="btnGroupAddon2"> <div class="input-group-prepend"><div class="input-group-text w-30 text-center" style="width: 45px" id="unitshow">' +
                    value.unit + '</div><input type="text"  value="' + value.unit +
                    '" id="unit" form="myform" name="unit[]" value="" hidden>  </div></div></td>';
                html += '<td><input type="number"  min="1" value="' + Math.ceil(value.price) +
                    '" name="rate[]" oninput="AutoTotal(this)" class="form-control" id="JOB_TITLE"></td>';
                html += '<td><input type="number"  min="1" value="' + Math.ceil(value.total) +
                    '" name="total_amount[]" class="form-control" id="JOB_TITLE"></td>';
                html += '<td><input type="text" name="note[]" class="form-control" id="note"></td>';
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
                            message(res.messege, '#FF0000', 'white', 'error', 'Error');
                        } else {
                            message(res.messege, '#29912b', 'white', 'error', 'Success');
                        }
                    }
                });
            }

        }
    </script>
@endpush
