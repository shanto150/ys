@extends('home.master')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card border border-01 border-warning">
                <div class="card-header">

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="input-group form-label-group in-border" id="range_id">
                                <input type="text" value="" class="form-control daterange" id="daterangea">
                                <label for="daterange">Date Range</label>
                                <div class="input-group-append">
                                    <div class="input-group-text" id="rangeButton"><i class="fa fa-calendar" style="color:blue"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-body m-0">

                    <div class="row m-0">
                        <table border="1" id="tbl1" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th>Call Date</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Asset ID</th>
                                    <th>Outlet Code</th>
                                    <th>Coutel Name</th>
                                    <th>Phone</th>
                                    <th>DB Name</th>
                                    <th>SE Area</th>
                                    <th>ASM Area</th>
                                    <th>Work Details</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>Taka</th>
                                    <th>Total</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($invs_items as $val)
                                <tr class="text-center">
                                    <td class="text-center">{{ $val->log_date }}</td>
                                    <td class="text-center">{{ $val->brand }}</td>
                                    <td class="text-center">{{ $val->visi_size }}</td>
                                    <td class="text-center">{{ $val->visi_id }}</td>
                                    <td class="text-center">{{ $val->outlet_code }}</td>
                                    <td class="text-center">{{ $val->outlet_name }}</td>
                                    <td class="text-center">{{ $val->outlet_mobile }}</td>
                                    <td class="text-center">{{ $val->db_name }}</td>
                                    <td class="text-center">{{ $val->se_area }}</td>
                                    <td class="text-center">{{ $val->asm_area }}</td>
                                    <td class="text-center text-nowrap">{{ $val->work_item }}</td>
                                    <td class="text-center">{{ ceil($val->quantity) }}</td>
                                    <td class="text-center">{{ ceil($val->rate) }}</td>
                                    <td class="text-center">{{ ceil($val->total_amount) }}</td>
                                    <td class="text-center">{{ ceil($val->ttl) }}</td>
                                    <td class="text-center">{{ $val->note }}</td>
                                </tr>
                                @endforeach
                            </tbody>
    
                            <tfoot>
                                <tr>
                                    <th class="text-center">{{ collect($invs_items)->count('work_item') }}</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="download" class="btn btn-sm btn-info me-5"> <i class="fa-solid fa-cloud-arrow-down" style="color: #52d3f4;"></i> Download</button>
                </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border border-01 border-info">

                <div class="card-body m-0">

                    <div class="row m-0">
                        <table border="1" id="tbl2" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th>Spare Items</th>
                                    <th>QTY</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($summery as $val)
                                <tr class="text-center">
                                    <td class="text-center">{{ $val->parts }}</td>
                                    <td class="text-center">{{ $val->Qty }}</td>
                                    <td class="text-center">{{ $val->amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-right">Total</th>
                                    <th class="text-center">{{ collect($summery)->sum('Qty') }}</th>
                                    <th class="text-center">{{ collect($summery)->sum('amount') }}</th>
                                </tr>
                                <tr>
                                    <th class="text-right">VAT (15%)</th>
                                    <th class="text-right"></th>
                                    <th class="text-center">
                                        @php
                                        $x=collect($summery)->sum('amount');
                                        $y=15;
                                        $a = (($y/100)*$x);
                                        echo $a;
                                        @endphp
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-right">Grand Total</th>
                                    <th class="text-right"></th>
                                    <th class="text-center">
                                        @php
                                        $x=collect($summery)->sum('amount');
                                        $y=15;
                                        $a = (($y/100)*$x);
                                        $f=$x+$a;
                                        echo $f;
                                        @endphp
                                    </th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="summery_download" class="btn btn-sm btn-info me-5"> <i class="fa-solid fa-cloud-arrow-down" style="color: #52d3f4;"></i> Download</button>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
@push('script')
<script>
    $('#spinShowHide').hide();
    var std = "{{$dates}}";
    $('#daterangea').val(std);

    $("#download").click(function() {
        $("#tbl1").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: "report", //do not include extension
            fileext: ".xls", // file extension
            preserveColors: true
        });
    });

    $("#summery_download").click(function() {
        $("#tbl2").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: "Summery", //do not include extension
            fileext: ".xls", // file extension
            preserveColors: true
        });
    });

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
        var url = route('gofinalInvoiceIndex', {
            sd: picker.startDate.format('YYYY-MM-DD'),
            ed: picker.endDate.format('YYYY-MM-DD')
        });
        window.location.href = url;
    });

    $('#daterangea').on('hide.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MMM-YYYY') + '~' + picker.endDate.format('DD-MMM-YYYY'));
    });

    $('#rangeButton').on('click', function() {
        $('input[id="daterangea"]').trigger('click');
    });

    $(function() {

        function groupTable($rows, startIndex, total) {
            if (total === 0) {
                return;
            }
            var i, currentIndex = startIndex,
                count = 1,
                lst = [];
            var tds = $rows.find('td:eq(' + currentIndex + ')');
            var ctrl = $(tds[0]);
            lst.push($rows[0]);
            for (i = 1; i <= tds.length; i++) {
                if (ctrl.text() == $(tds[i]).text()) {
                    count++;
                    $(tds[i]).addClass('deleted');
                    lst.push($rows[i]);
                } else {
                    if (count > 1) {
                        ctrl.attr('rowspan', count);
                        groupTable($(lst), startIndex + 1, total - 1)
                    }
                    count = 1;
                    lst = [];
                    ctrl = $(tds[i]);
                    lst.push($rows[i]);
                }
            }
        }
        groupTable($('#tbl1 tr:has(td)'), 0, 11);
        $('#tbl1 .deleted').remove();
    });

    const table = document.querySelector('#tbl1');

    let headerCell = null;

    for (let row of table.rows) {
        const firstCell = row.cells[14];

        if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
            headerCell = firstCell;
        } else {
            headerCell.rowSpan++;
            firstCell.remove();
        }
    }
</script>
@endpush