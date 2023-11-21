@extends('home.master')
@section('content')
    <div class="container ">
        <div class="mx-auto ">

            <div id="imageModel" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Select Face by drag and zoom</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-block justify-content-center align-items-center m-2">
                                <div class="w-100 h-100 p-2" id="image_demo">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary crop_image">Crop</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-primary card-outline">
                <form id="myform" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="d-flex flex-1 px-5 align-items-center justify-content-center justify-content-lg-center">
                            <center>
                                <input type="file" id="upload" accept=".png,.jpg,.jpeg,.gif,.tif" class="form-control"
                                    onchange="readURL(this);" style="visibility: hidden; width: 1px; height: 1px" />
                                <a href="" onclick="document.getElementById('upload').click(); return false">
                                    <div class="w-32 h-32 flex-none image-fit position-relative">
                                        <img alt="Rubick" id="blah" height="150" width="150"
                                            class="rounded-circle border border-info p-1"
                                            src="res/images/appimages/manedit.png"
                                            onerror="this.src='res/images/appimages/manedit.png'">
                                    </div>
                                </a>
                                <center>
                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-label-group in-border">
                                    <input type="text" id="name" class="form-control form-control-sm" name="name"
                                        placeholder="Enter Name" autocomplete="off">
                                    <label for="name">Enter Name</label>
                                    <input type="text" id="id" hidden name="id" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center justify-content-center">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-label-group in-border">
                                    <input type="text" id="desig" class="form-control form-control-sm" name="desig"
                                        placeholder="Enter Designation" autocomplete="off">
                                    <label for="desig">Enter Designation</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-label-group in-border">
                                    <input type="text" id="emp_id" name="emp_id"
                                        class="form-control form-control-sm" placeholder="EMP ID"
                                        autocomplete="off">
                                    <label for="nid">EMP ID</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="text" id="fathers_name" name="fathers_name"
                                        class="form-control form-control-sm" placeholder="Father's Name" autocomplete="off">
                                    <label for="fathers_name">Father's Name</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="text" id="mothers_name" name="mothers_name"
                                        class="form-control form-control-sm" placeholder="Mother's Name" autocomplete="off">
                                    <label for="mothers_name">Mother's Name</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="text" id="home_distrit" name="home_distrit"
                                        class="form-control form-control-sm" placeholder="Home distrit" autocomplete="off">
                                    <label for="home_distrit">Home distrit</label>
                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="date" id="dob" class="form-control form-control-sm"
                                        name="dob" autocomplete="off">
                                    <label for="dob">Birth Date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="date" id="doj" name="doj"
                                        class="form-control form-control-sm" autocomplete="off">
                                    <label for="doj">Date Of Joining</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" selected>Active</option>
                                        <option value="0" >Inactive </option>
                                    </select>
                                    <label for="emp_type">Is Employee Active?</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="email" id="email" name="email"
                                        class="form-control form-control-sm" placeholder="Email" >
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="col-md-2">

                                <div class="form-label-group in-border">
                                    <select class="form-control" id="blood_group" name="blood_group">
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option selected>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                    </select>
                                    <label for="blood_group">Blood Group</label>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-label-group in-border">
                                    <select class="form-control" id="religion" name="religion">
                                        <option value="" selected>Choose...</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Buddhism">Buddhism</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <label for="blood_group">Religion</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-label-group in-border">
                                    <select class="form-control" id="gender" name="gender">
                                        <option selected>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <label for="gender">Gender</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-label-group in-border">
                                    <select class="form-control" id="emp_type" name="emp_type">
                                        <option>Probationary</option>
                                        <option>Contractual </option>
                                        <option selected>Confirmed</option>
                                    </select>
                                    <label for="emp_type">Emp Type</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-label-group in-border">
                                    <select class="form-control" id="role" name="role">
                                        <option>Admin</option>
                                        <option>Management</option>
                                        <option selected>Distribution</option>
                                        <option>Technical</option>
                                        <option>Others</option>
                                    </select>
                                    <label for="role">Department</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="text" id="Mobile_personal" name="Mobile_personal"
                                        class="form-control form-control-sm" placeholder="Personal Mobile"
                                        autocomplete="off">
                                    <label for="nid">Personal Mobile</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="text" id="Mobile_official" name="Mobile_official"
                                        class="form-control form-control-sm" placeholder="Office Mobile"
                                        autocomplete="off">
                                    <label for="nid">Mobile Official</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="number" id="salary" name="salary"
                                        class="form-control form-control-sm" placeholder="Enter Salary"
                                        autocomplete="off">
                                    <label for="nid">Salary</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-label-group in-border">
                                    <input type="number" id="nid" name="nid"
                                        class="form-control form-control-sm" placeholder="National ID"
                                        autocomplete="off">
                                    <label for="nid">National ID</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-label-group in-border">
                                    <input type="text" id="present_address" name="present_address"
                                        class="form-control form-control-sm" placeholder="Present Address"
                                        autocomplete="off">
                                    <label for="present_address">Present Address</label>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-label-group in-border">
                                    <input type="text" id="permanent_address" name="permanent_address"
                                        class="form-control form-control-sm" placeholder="Permanent Address"
                                        autocomplete="off">
                                    <label for="permanent_address">Permanent Address</label>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="card-footer text-right mt-10">
                        <button type="button" onclick="document.getElementById('myform').reset();"
                            class="btn btn-warning btn-sm me-5"><i class="fa fa-eraser" aria-hidden="true"></i> Clear</button>
                        <button type="button" onclick="FromsCheck();" class="btn btn-sm btn-success"><i class="fa fa-check"
                                aria-hidden="true"></i> Save</button>
                    </div>
                </form>
            </div>

            <div class="card card-none">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-list-ul text-danger" aria-hidden="true"></i> Employee List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="EntryTable" width="100%">

                        <thead>
                            <tr>
                                <th class="text-center">Sn#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Desig</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Mobile2</th>
                                <th class="text-center">Active?</th>
                                <th class="text-center">Actions</th>
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
        var firstValue = $("#myform").serialize();
        var ListRowID = "";
        var cropImage;


        function FromsCheck() {

            var x = [ 'name', 'email', 'desig','doj','salary','Mobile_personal','role'];
            if (EmptyValueFocus(x)) {
                save();
            }

        }

        //DataTable
        aTable = $('#EntryTable').DataTable({
            processing: false,
            serverSide: false,
            initComplete: function(settings, json) {
                $.switcher();

                const element1 = document.querySelectorAll('#isactive');
                if (element1.length !== 0) {
                    for (var i = 0; i < element1.length; i++) {
                        element1[i].addEventListener('change', function() {
                            if ($(this).prop("checked") == true) {

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
                                    url: "{{ route('update-emp-status') }}", // Route
                                    data: {
                                        'rowId': ListRowID,
                                        'Status_value': 1
                                    },
                                    success: function(res) {
                                        message(res.mes, '#29912b', 'white', 'error',
                                            'Success');
                                    }
                                })

                            } else {

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
                                    url: "{{ route('update-emp-status') }}", // Route
                                    data: {
                                        'rowId': ListRowID,
                                        'Status_value': 0
                                    },
                                    success: function(res) {
                                        message(res.mes, '#29912b', 'white', 'error',
                                            'Success');
                                    }
                                })
                            }
                        });
                    }
                }

            },
            ajax: "{{ route('get-emp-data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'desig',
                    name: 'desig'
                },
                {
                    data: 'Mobile_personal',
                    name: 'Mobile_personal'
                },
                {
                    data: 'Mobile_official',
                    name: 'Mobile_official'
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        if (data == 1) {
                            var idd = "'" + row.id + "'";
                            var html = '<input type="checkbox" checked id="isactive"  onchange="aChange(' +
                                idd + ')"/>';
                            return html;
                        } else {
                            var idd = "'" + row.id + "'";
                            var html = '<input type="checkbox" id="isactive"  onchange="aChange(' + idd +
                                ')"/>';
                            return html;
                        }
                        return data;
                    }
                },
                {
                    render: function(data, type, row) {
                        var name = "'" + row.name + "'";
                        var desig = "'" + row.desig + "'";
                        var fathers_name = "'" + row.fathers_name + "'";
                        var mothers_name = "'" + row.mothers_name + "'";
                        var home_distrit = "'" + row.home_distrit + "'";
                        var dob = "'" + row.dob + "'";
                        var doj = "'" + row.doj + "'";
                        var nid = "'" + row.nid + "'";
                        var blood_group = "'" + row.blood_group + "'";
                        var religion = "'" + row.religion + "'";
                        var gender = "'" + row.gender + "'";
                        var emp_type = "'" + row.emp_type + "'";
                        var Mobile_personal = "'" + row.Mobile_personal + "'";
                        var Mobile_official = "'" + row.Mobile_official + "'";
                        var salary = "'" + row.salary + "'";
                        var status = "'" + row.status + "'";
                        var present_address = "'" + row.present_address + "'";
                        var permanent_address = "'" + row.permanent_address + "'";
                        var rwid = "'" + row.id + "'";
                        var image_path = "'" + row.image_path + "'";
                        var email = "'" + row.email + "'";
                        var role = "'" + row.role + "'";
                        var emp_id = "'" + row.emp_id + "'";

                        var html = '';
                        html += '<div class="row justify-content-center align-items-center">';
                        html +=
                            '<button type="button" class="btn btn-sm btn-primary hvr-grow m-1" style="width: 80px" onclick="edit_model('+role+','+email+',' +name + ',' + desig + ',' + fathers_name +
                            ',' + mothers_name +',' + home_distrit +',' + dob +',' + doj +',' + nid +',' + blood_group +',' + religion +',' + gender +',' + emp_type +
                            ',' + Mobile_personal +',' + Mobile_official +',' + salary +',' + status +',' + present_address +',' + permanent_address +',' + rwid +',' + image_path +','+emp_id+');">';
                        html += '<i class="ri-arrow-up-line"></i> | EDIT</button>';
                        html +=
                            '<button type="button" class="btn btn-sm btn-danger hvr-grow m-1" style="width: 80px" onclick="del(' +
                            rwid + ');">';
                        html += '<i class="ri-arrow-up-line"></i> | DEL</button>';
                        html += '</div>';
                        return html;
                    }
                },
            ]
        });

        function save() {

            var allInputs = $("#myform").serialize();
            var formData = new FormData(myform);
            formData.append('CropImage', cropImage);
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
                    url: "{{ route('store-emp') }}",
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
                            $('#dept_modal').modal('hide');
                            document.getElementById('myform').reset();
                            $('#EntryTable').DataTable().ajax.reload(function(settings, json) {
                                $.switcher();
                            });
                        }
                    }
                });
            }

        }

        function edit_model(role,email,name, desig, fathers_name, mothers_name, home_distrit, dob, doj, nid, blood_group, religion, gender,emp_type,Mobile_personal,Mobile_official,
        salary,status,present_address,permanent_address,rwid,image_path,emp_id) {

            var keysArray  = ['role','email','name', 'desig', 'fathers_name', 'mothers_name', 'home_distrit', 'dob', 'doj', 'nid', 'blood_group', 'religion', 'gender','emp_type','Mobile_personal','Mobile_official','salary','status','present_address','permanent_address','id','emp_id'];
            var valuesArray  = [role,email,name, desig, fathers_name, mothers_name, home_distrit, dob, doj, nid, blood_group, religion, gender,emp_type,Mobile_personal,Mobile_official,
        salary,status,present_address,permanent_address,rwid,emp_id];

            editValuePst(keysArray,valuesArray);

            $("#blah").attr("src",image_path);
            firstValue = $("#myform").serialize();

            // console.log(Hash::make('1'));
        }


        function readURL(input) {

            $('#imageModel').modal('show');
            var sizeBoundary = window.innerWidth > 512 ? 512 : 256;
            var sizeViewPort = 256;

            var reader = new FileReader();
            reader.onload = function(event) {
                image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                    var img = new Image();
                    img.src = reader.result;

                    var minXY = img.height < img.width ? img.height : img.width;

                    var aux = minXY <= sizeViewPort ? sizeViewPort * 2 : minXY;

                    var min = minXY <= sizeViewPort ? 0 : sizeViewPort / aux;
                    var max = minXY <= sizeViewPort ? 0 : aux / sizeViewPort;



                    var scale = minXY <= sizeViewPort ? sizeViewPort / minXY : 1;
                    var x = minXY <= sizeViewPort ? sizeViewPort - (img.width * scale / 2) : (sizeViewPort - ((
                        img.width * scale) / (sizeBoundary / sizeViewPort))) / 2;
                    var y = minXY <= sizeViewPort ? sizeViewPort - (img.height * scale / 2) : (sizeViewPort - ((
                        img.height * scale) / (sizeBoundary / sizeViewPort))) / 2;

                    var originX = minXY <= sizeViewPort ? 0 : img.width * scale / 2;
                    var originY = minXY <= sizeViewPort ? 0 : img.height * scale / 2;

                    $('.cr-image').css("opacity", "1");
                    $('.cr-image').css("transform", "translate3d(" + x + "px, " + y + "px, 0px) scale(" +
                        scale + ")");
                    $('.cr-image').css("transform-origin", "" + originX + "px " + originY + "px 0px");
                    $('.cr-slider').attr({
                        'min': min,
                        'max': max,
                        'aria-valuenow': scale
                    });
                });
            }
            reader.readAsDataURL(input.files[0]);
        }

        image_crop = $('#image_demo').croppie({
            enableExif: false,
            viewport: {
                width: 200,
                height: 200,
                type: 'square'
            },
            boundary: {
                width: 300,
                height: 350
            }
        });


        $('.crop_image').click(function(event) {
            image_crop.croppie('result', {
                type: 'blob',
                size: 'viewport',
                format: 'png'
            }).then(function(response) {
                console.log('Res : ' + response);
                var blobData = response;
                var url = window.URL || window.webkitURL;
                var src = url.createObjectURL(response);
                console.log('src : ' + src);
                $('#blah').attr("src", src);

                $('#imageModel').modal('hide');
                cropImage = response;
            });


        });

        function del(del_id) {

            $.ajax({
                beforeSend: function() {
                    $("#llogo").addClass("spinner");
                    $("#loading-overlay").show();
                },
                error: function(res) {
                    $("#llogo").removeClass("spinner");
                    $("#loading-overlay").hide();
                    var errorMessage = res.status + ': ' + res.statusText
                    message(errorMessage, '#FF0000', 'white', 'error', 'Error');
                },
                complete: function() {
                    $("#llogo").removeClass("spinner");
                    $("#loading-overlay").hide();
                },
                type: 'GET',
                url: "{{ route('destroy-emp') }}", // Route
                data: {'del_id': del_id},
                success: function(res) {
                    $("#llogo").removeClass("spinner");
                    $("#loading-overlay").hide();
                    if (res.types == 'e') {
                        message(res.messege, '#FF0000', 'white', 'error', 'error');
                    } else {
                        message(res.messege, '#29912b', 'white', 'error', 'Success');

                        $('#EntryTable').DataTable().ajax.reload(function(settings, json) {
                            $.switcher();
                        });
                    }
                }
            });
        }

        function aChange(rowID) {
            ListRowID = rowID;
        }

    </script>

@endpush
