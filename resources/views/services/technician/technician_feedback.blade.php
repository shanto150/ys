<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Home</title>

        <link rel="icon" href="{{ url('/res/images/appimages/mainlogo.png') }}">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="{{ asset('/res/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/res/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/res/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/res/plugins/daterangepicker/daterangepicker.css') }}">

        {{-- select2 --}}
        <link rel="stylesheet" href="{{ asset('/res/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/res/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

        <!-- toast CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('/res/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('/res/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('/res/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" />

        <!-- Animation $ Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="{{ asset('/res/css/switcher.css') }}">
        <link rel="stylesheet" href="{{ asset('/res/css/anim.css') }}">
        <link rel="stylesheet" href="{{ asset('/res/css/hover-min.css') }}">

        {{-- Direct Print --}}
        <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css" />

        {{-- Crop Image --}}
        <link rel="stylesheet" href="{{ asset('/res/css/croppie.css') }}">
        {{-- floating levels --}}
        <link rel="stylesheet" href="{{ asset('/res/css/floating-labels.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            .select2-selection {
                height: 40px !important;
                border-color: #ced4da !important;
            }

            .main-sidebar {
                background: radial-gradient(#8C1116, #300405);
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
                color: black;
                opacity: 22;
                !important
            }

            .mc {
                display: flex;
                align-items: center;
                height: 180px;
                width: 180px;
                border-radius: 10px;
                background: #fff;
                border-color: #000000;
                color: #14093a;
                transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
                cursor: pointer;
            }

            .mc:hover {
                color: #ffffff;
                background-color: #08436B !important;
                border-color: #9c0c0c;
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
            }

            .buyhead {
                display: inline-block;
                margin: 0;
                line-height: 1em;
                font-family: 'RobofanFree';
                font-weight: bold;
                font-size: 35px;
                background: linear-gradient(to right, #1c87c9 40%, #2CBC77 50%);
                background-clip: text;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
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
        </style>
        @stack('style')

    </head>

    <body>


        <nav class="navbar navbar-light bg-danger">
            <a class="btn btn-outline-dark btn-sm text-uppercase">{{ Auth::user()->name }}</a>
            <form class="form-inline">
                <img src="{{ URL::asset('/res/images/appimages/lod1.gif') }}" alt="profile Pic" height="30"
                    width="30" id="spinShowHide" />
                <a class="btn btn-outline-dark btn-sm" href="{{ route('lout') }}"><i
                        class="fa-solid fa-person-running"></i> বন্ধ করুন</a>
            </form>
        </nav>


        <div class="container-fluid">

            <div class="row m-3">

                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                কাজের লিস্ট
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="worklist" width="100%">

                                    <thead>
                                        <tr>
                                            <th>নং</th>
                                            <th>বিবরণ</th>
                                            <th>ঠিকানা</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($techDatas as $index => $data)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td class="text-center">
                                                    <div class="row text-center">{{ $data->note }}</div>
                                                    <div class="row text-center"><span
                                                            class="badge badge-pill badge-warning">
                                                            {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans(
                                                                now(),
                                                                Carbon\CarbonInterface::DIFF_RELATIVE_AUTO,
                                                                true,
                                                                3,
                                                            ) }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row text-center">{{ $data->outlet_address }}</div>
                                                </td>
                                                <td class="d-none">{{ $data->from_user }}</td>
                                                <td class="d-none">{{ $data->id }}</td>
                                                <td class="d-none">{{ $data->log_id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                সকল তথ্য
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="databox hvr-sweep-to-top">
                                <span class="icn"><i class="fa fa-chevron-right" style="color: #dd1933"
                                        aria-hidden="true"></i></span>
                                <span class="label">আউটলেট কোড&nbsp;&nbsp;</span>
                                <span class="data" id="outlet_code"></span>
                            </div>
                            <div class="databox hvr-sweep-to-top">
                                <span class="icn"><i class="fa fa-chevron-right" style="color: #09c723"
                                        aria-hidden="true"></i></span>
                                <span class="label">ভিসি আইডি/সাইজ&nbsp;&nbsp;</span>
                                <span class="data" id="visi_id"></span>
                            </div>
                            <div class="databox hvr-sweep-to-top">
                                <span class="icn"><i class="fa fa-chevron-right" style="color: #d904f5"
                                        aria-hidden="true"></i></span>
                                <span class="label">আউটলেট নাম</span>
                                <span class="data" id="outlet_name"></span>
                            </div>
                            <div class="databox hvr-sweep-to-top">
                                <span class="icn"><i class="fa fa-chevron-right" style="color: #37A3F0"
                                        aria-hidden="true"></i></span>
                                <span class="label">ঠিকানা&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</span>
                                <span class="data" id="outlet_address"></span>
                            </div>
                            <div class="databox hvr-sweep-to-top">
                                <span class="icn"><i class="fa fa-chevron-right" style="color: #f39406"
                                        aria-hidden="true"></i></span>
                                <span class="label">মোবাইল&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</span>
                                <span class="data" id="conta"></span>
                            </div>
                            <div class="databox hvr-sweep-to-top">
                                <span class="icn"><i class="fa fa-chevron-right" style="color: #06106e"
                                        aria-hidden="true"></i></span>
                                <span class="label">Complains&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span class="data" id="probs"></span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <form id="myform" enctype="multipart/form-data">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    কি লাগবে বা লাগানো হয়েছে
                                </h3>
                                <div class="card-tools">

                                </div>
                            </div>

                            <div class="card-body">
                                <p class="text-center text-danger bolder" id="mes"></p>
                                <input type="text" hidden name="log_id" id="log_id" value=""
                                    placeholder="log_id" form="myform">
                                <input type="text" hidden name="id" id="id" value=""
                                    form="myform" placeholder="id">
                                <input type="text" hidden name="to_user" id="to_user" value=""
                                    form="myform" placeholder="to_user">
                                <input type="text" hidden name="add_techni_id_fk" id="add_techni_id_fk"
                                    value="" form="myform" placeholder="fk">
                                <input type="text" hidden name="from_user" form="myform" id="from_user"
                                    value="{{ Auth::user()->machine_id }}">

                                <div class="col-md-12">
                                    <div class="form-label-group in-border">
                                        <select id="request_type" name="request_type" form="myform"
                                            class="form-control">
                                            <option value="">=নির্বাচন করুন=</option>
                                            <option value="Install">যন্ত্র লাগিয়েছি</option>
                                            <option value="Require">যন্ত্র লাগবে</option>
                                            <option value="Note">মন্তব্য</option>
                                        </select>
                                        <label for="first_response_date">Type</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-label-group in-border">
                                                <select class="form-control select2" name="invoice_item_id"
                                                    form="myform" id="invoice_item_id" style="width: 100%;">
                                                    <option selected value="">=নির্বাচন করুন=</option>
                                                    @foreach ($Price_lists as $Price_list)
                                                        <option value="{{ $Price_list->id }}"
                                                            data-unit="{{ $Price_list->unit }}">
                                                            {{ $Price_list->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <label for="first_response_date">যন্ত্র নির্বাচন</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="input-group">
                                                <input type="number" min="1" form="myform" name="quantity"
                                                    id="quantity" class="form-control w-60"
                                                    placeholder="পিস/সেট/ফুট" aria-label="Input group example"
                                                    aria-describedby="btnGroupAddon2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text w-40" id="unitshow">Unit</div>
                                                    <input type="text" id="unit" form="myform"
                                                        name="unit" value="" hidden>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-label-group in-border">
                                        <textarea id="note" name="note" form="myform" style="text-transform:capitalize" class="form-control"
                                            cols="4" placeholder="" rows="3"></textarea>
                                        <label for="note">আপনার মন্তব্য লিখুন</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="file" form="myform" name="f_path" id="f_path">
                                </div>


                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary float-right" onclick="FromsCheck()" type="button"><i
                                        class="fa fa-check-square" aria-hidden="true"></i> সেভ</button>
                                <button class="btn btn-info float-left" onclick="TachClose()" type="button"><i
                                        class="fa fa-check-square" aria-hidden="true"></i> ক্লোজ</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="table-wrapper">
                        <table class="table table-sm fl-table table-striped" id="TechList" width="100%">

                            <thead>
                                <tr>
                                    <th>Sn#</th>
                                    <th>Technician</th>
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

        </div>

        <!-- REQUIRED SCRIPTS -->
        <script src="{{ asset('/res/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/res/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/res/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('/res/js/adminlte.js') }}"></script>
        <script src="{{ asset('/res/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('/res/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('/res/plugins/moment/moment.min.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

        <!-- Page specific script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
        <script src="{{ asset('/res/js/myfunctions.js') }}"></script>
        <script src="{{ asset('/res/js/switcher.js') }}"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{ asset('/res/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/res/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/res/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

        {{-- Direct Print --}}
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

        {{-- Crop Image --}}
        <script src="{{ asset('/res/js/croppie.js') }}"></script>
        {{-- Autocomplete --}}
        <script src="{{ asset('/res/js/jquery.autocomplete.js') }}"></script>

        {{-- mask --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>


        <script>
            $('#spinShowHide').hide();
            $('.select2').select2();
            var firstValue = $("#myform").serialize();

            var log_id = '';
            var to_user = '';
            var add_techni_id_fk = '';

            $('#worklist tr').click(function() {
                var currentRow = $(this).closest("tr");
                log_id = currentRow.find("td:eq(5)").html();
                to_user = currentRow.find("td:eq(3)").html();
                add_techni_id_fk = currentRow.find("td:eq(4)").html();
                $('#log_id').val(log_id);
                $('#to_user').val(to_user);
                $('#add_techni_id_fk').val(add_techni_id_fk);
                getLogdetails(log_id);
                Generatetable(log_id)
            });

            $("#invoice_item_id").change(function() {
                $('#unitshow').html($(this).find(':selected').data('unit'));
                $('#unit').val($(this).find(':selected').data('unit'));
            });

            function FromsCheck() {

                var log_id = $('#log_id').val();
                if (log_id == '') {
                    $('#mes').html('কোন কাজটি করবেন সেটি আগে নির্বাচন করুন');
                    animateCSS('#mes', 'shakeX');
                    $('#mes').show(1000).delay(5000).hide(1000);
                    return false;
                }

                var request_type = $('#request_type').val();
                if (request_type == 'Note') {
                    var note = $('#note').val();
                    if (note == '') {
                        $('#mes').html('মন্তব্য লিখুন');
                        animateCSS('#mes', 'shakeX');
                        $('#mes').show(1000).delay(5000).hide(1000);
                        $('#note').focus();
                        return false;
                    }
                }

                var request_type = $('#request_type').val();
                if (request_type == '') {
                    $('#mes').html('টাইপ নির্বাচন করুন');
                    animateCSS('#mes', 'shakeX');
                    $('#mes').show(1000).delay(5000).hide(1000);
                    return false;
                }

                var request_type = $('#request_type').val();
                if (request_type == 'Install') {
                    var invoice_item_id = $('#invoice_item_id').val();
                    if (invoice_item_id == '') {
                        $('#mes').html('কি যন্ত্র লাগিয়েছেন নির্বাচন করুন');
                        animateCSS('#mes', 'shakeX');
                        $('#mes').show(1000).delay(5000).hide(1000);
                        $('#invoice_item_id').focus();
                        return false;
                    }
                    var quantity = $('#quantity').val();
                    if (quantity <= 0) {
                        $('#mes').html('সঠিক পরিমান দিন ');
                        animateCSS('#mes', 'shakeX');
                        $('#mes').show(1000).delay(5000).hide(1000);
                        $('#quantity').focus();
                        return false;
                    }
                }

                var request_type = $('#request_type').val();
                if (request_type == 'Require') {
                    var invoice_item_id = $('#invoice_item_id').val();
                    if (invoice_item_id == '') {
                        $('#mes').html('কি যন্ত্র লাগবে নির্বাচন করুন');
                        animateCSS('#mes', 'shakeX');
                        $('#mes').show(1000).delay(5000).hide(1000);
                        $('#invoice_item_id').focus();
                        return false;
                    }
                    var quantity = $('#quantity').val();
                    if (quantity <= 0) {
                        $('#mes').html('সঠিক পরিমান দিন ');
                        animateCSS('#mes', 'shakeX');
                        $('#mes').show(1000).delay(5000).hide(1000);
                        $('#quantity').focus();
                        return false;
                    }
                }

                save();
                return true;
            }

            function getLogdetails(slog_id) {

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
                    type: 'GET',
                    url: "{{ route('getLogdetails') }}",
                    data: {
                        'slog_id': slog_id
                    },
                    success: function(res) {
                        $('#spinShowHide').hide();
                        $('#outlet_code').html(res.suggestion[0].outlet_code);
                        $('#visi_id').html(res.suggestion[0].visi_id + '/' + res.suggestion[0].visi_size);
                        $('#outlet_name').html(res.suggestion[0].outlet_name);
                        $('#outlet_address').html(res.suggestion[0].outlet_address);
                        $('#conta').html(res.suggestion[0].outlet_mobile + ' , ' + res.suggestion[0].person_mobile);
                        $('#probs').html(res.suggestion[0].complains);
                    }
                });
            }

            const animateCSS = (element, animation, prefix = 'animate__') =>
                // We create a Promise and return it
                new Promise((resolve, reject) => {
                    const animationName = `${prefix}${animation}`;
                    const node = document.querySelector(element);

                    node.classList.add(`${prefix}animated`, animationName);

                    // When the animation ends, we clean the classes and resolve the Promise
                    function handleAnimationEnd(event) {
                        event.stopPropagation();
                        node.classList.remove(`${prefix}animated`, animationName);
                        resolve('Animation ended');
                    }

                    node.addEventListener('animationend', handleAnimationEnd, {
                        once: true
                    });
                });




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
                        url: "{{ route('store-titem') }}",
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
                                $('#TechList').DataTable().ajax.reload();
                            }
                        }
                    });
                }

            }

            function Generatetable(params) {
                aTable = $('#TechList').DataTable({
                    dom: 't',
                    ordering: false,
                    destroy: true,
                    searching: false,
                    paging: false,
                    responsive: true,
                    columnDefs: [{
                        "defaultContent": "N/A",
                        "targets": "_all",
                        "orderable": false
                    }],
                    ajax: {
                        "url": "{{ route('getfeedbackist') }}",
                        "data": {
                            "log_id": params
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            render: function(data, type, row) {
                                var item = row.item;
                                var note = row.note;
                                var html = '';
                                html += '<div class="d-flex flex-column">';
                                html += '<div>' + item + '</div>';
                                html += '<div style="color: blue;font-size: 14px;">' + note + '</div>';
                                html += '</div>';
                                return html;
                            }
                        },
                        {
                            render: function(data, type, row) {

                                var log_id = "'" + row.log_id + "'";
                                var id = "'" + row.id + "'";
                                var request_type = "'" + row.request_type + "'";
                                var invoice_item_id = "'" + row.invoice_item_id + "'";
                                var quantity = "'" + row.quantity + "'";
                                var unit = "'" + row.unit + "'";
                                var note = "'" + row.note + "'";
                                var to_user = "'" + row.to_user + "'";

                                var html = '';
                                html += '<button type="button" onclick="edit_model(' + log_id + ',' + id +
                                    ',' + request_type + ',' + invoice_item_id + ',' + quantity + ',' + unit +
                                    ',' + note + ',' + to_user +
                                    ');" class="btn btn-sm btn-outline-success mr-1"><i class="fa fa-pen"></i></button>';
                                return html;
                            }
                        },
                    ]
                });
            }

            function edit_model(log_id, id, request_type, invoice_item_id, quantity, unit, note, to_user) {

                document.getElementById("log_id").value = (log_id == "null" ? "" : log_id);
                document.getElementById("id").value = (id == "null" ? "" : id);
                $("#request_type").val(request_type).change();
                $("#invoice_item_id").val(invoice_item_id).change();
                document.getElementById("quantity").value = (quantity == "null" ? "" : quantity);
                document.getElementById("unit").value = (unit == "null" ? "" : unit);
                document.getElementById("note").value = (note == "null" ? "" : note);
                document.getElementById("to_user").value = (to_user == "null" ? "" : to_user);
                firstValue = $("#myform").serialize();

            }

            function TachClose() {

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
                    url: "{{ route('techCallClose') }}",
                    data: {
                        'log_id': log_id,
                    },
                    success: function(res) {
                        if (res.types == 'e') {
                            message(res.messege, '#FF0000', 'white', 'error', 'error');
                        } else {
                            message(res.messege, '#29912b', 'white', 'error', 'Success');
                        }
                    }
                });
            }
        </script>
        <script>
            @if (!empty($errors->all()))
                @foreach ($errors->all() as $eerror)
                    message("{{ $eerror }}", '#FF0000', 'white', 'error', 'Error');
                @endforeach
            @endif

            @if (Session::has('messege'))
                var type = "{{ Session::get('alert-type') }}"
                var mess = "{{ Session::get('messege') }}"
                switch (type) {
                    case 's':
                        message(mess, '#53C75F', 'white', 'error', 'Success');
                        break;
                    case 'e':
                        message(mess, '#FF0000', 'white', 'error', 'Error');
                        break;
                }
            @endif
        </script>
    </body>

</html>
