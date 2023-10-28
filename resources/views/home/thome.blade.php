<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Home</title>

    <link rel="icon" href="{{ url('/res/images/appimages/mainlogo.png') }}">
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('/res/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"href="{{ asset('/res/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/res/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/res/plugins/daterangepicker/daterangepicker.css') }}">

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('/res/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/res/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/res/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/res/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/res/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" />

    <!-- Animation $ Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('/res/css/switcher.css') }}">
    <link rel="stylesheet" href="{{ asset('/res/css/anim.css') }}">
    <link rel="stylesheet" href="{{ asset('/res/css/hover-min.css') }}">

    {{-- Direct Print --}}
    <link rel="stylesheet"href="https://printjs-4de6.kxcdn.com/print.min.css" />

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
    </style>
    @stack('style')

</head>

<body>

    <nav class="navbar navbar-light bg-danger">
        <a class="btn btn-outline-dark btn-sm text-uppercase">{{ Auth::user()->name }}</a>
        <form class="form-inline">
            <img src="{{ URL::asset('/res/images/appimages/lod1.gif') }}" alt="profile Pic" height="30" width="30" id="spinShowHide" />
            <a class="btn btn-outline-dark btn-sm" href="{{ route('lout') }}" ><i class="fa-solid fa-person-running"></i> বন্ধ করুন</a>
        </form>
      </nav>

      <div class="container-fluid">
        <div class="container m-2 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
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

                        <div class="col">
                            <a class="card mc border border-1" href="#">
                                <img src="{{ url('/res/images/appimages/user.svg') }}" height="80" width="80"
                                    alt="" style="margin-top: 30px">
                                <div class="card-body">
                                    <h5 class="text-center">Profile</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a class="card mc border border-1" href="{{ route('goTechfeedback') }}">
                                <img src="{{ url('/res/images/appimages/sell.svg') }}" height="80" width="80"
                                    alt="" style="margin-top: 30px">
                                <div class="card-body">
                                    <h5 class="text-center">কাজের লিস্ট</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a class="card mc border border-1" href="#">
                                <img src="{{ url('/res/images/appimages/rate.svg') }}" height="80" width="80"
                                    alt="" style="margin-top: 30px">
                                <div class="card-body">
                                    <h5 class="text-center">সকল কাজ </h5>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a class="card mc border border-1" href="{{ route('lout') }}">
                                <img src="{{ url('/res/images/appimages/power.png') }}" height="80" width="80"
                                    alt="" style="margin-top: 30px">
                                <div class="card-body">
                                    <h5 class="text-center">বন্ধ করুন</h5>
                                </div>
                            </a>
                        </div>

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

        $(window).on("load", loadDark());
        var url = window.location;
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active bg-success');

        $('ul.nav-treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a');
    </script>
    {{-- mes,bgcolor,textcolor,icn,head --}}
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

    @stack('script')
</body>

</html>
