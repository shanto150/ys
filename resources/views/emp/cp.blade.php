@extends('home.master')
@section('content')
<div class="container ">
    <div class="mx-auto">
        <div class="card card-primary card-outline w-50">
            <form id="myform">
                @csrf
                <div class="card-header ">
                    <h3 class="card-title"><i class="fa-solid fa-key text-danger" aria-hidden="true"></i> &nbsp;
                        Change Password</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-label-group in-border">
                                <select class="form-control select2" form="myform" name="emp_id" id="emp_id"
                                    style="width: 100%;">
                                    <option selected value="0">Choose...</option>
                                    @foreach ($emps as $emp)
                                    <option value="{{ $emp->machine_id }}">{{ $emp->name }}</option>
                                    @endforeach
                                </select>
                                <label for="assigned_to">Select Employee Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group in-border">
                                <input type="text" class="form-control" form="myform" name="pass" id="pass">
                                <label for="assigned_to">Enter Password</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right mt-10">
                    <button type="button" onclick="document.getElementById('myform').reset();"
                        class="btn btn-warning btn-sm me-5"><i class="fa fa-eraser" aria-hidden="true"></i>
                        Clear</button>
                    <button type="button" onclick="FromsCheck();" class="btn btn-sm btn-success"><i class="fa fa-check"
                            aria-hidden="true"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>

    $('#spinShowHide').hide();
    var firstValue = $("#myform").serialize();
    
    function FromsCheck() {
            var emp_id = $('#emp_id').val();
            if (emp_id == '0') {
                message('Please Select Employee Name', '#FF0000', 'white', 'error', 'Error');
                return false;
            }
            var pass = $('#pass').val();
            if (pass == '') {
                message('Please Enter Password', '#FF0000', 'white', 'error', 'Error');
                document.getElementById("pass").focus();
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
                url: "{{ route('change_pass') }}",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function(res) {
                    if (res.types == 'e') {
                        message(res.messege, '#FF0000', 'white', 'error', 'error');
                    } else {
                        message(res.messege, '#29912b', 'white', 'error', 'Success');
                        document.getElementById('myform').reset();
                    }
                }
            });
        }

    }

</script>

@endpush