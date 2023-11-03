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

        {{-- counter --}}
        <link rel="stylesheet" href="{{ asset('/res/css/counter.css') }}">

        {{-- icon --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            option {
                zoom: 1.2
            }

            .select2-selection--single {
                height: 36px !important;
                border-color: #ced4da !important;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 34px;
                position: absolute;
                top: 1px;
                right: 1px;
                width: 20px;
            }

            .select2 {
                width: 100% !important;
                padding: 0;
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
        </style>
        @stack('style')

    </head>

    <body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm"
        id="layoutBody">

        <div class="wrapper"> @include('layouts.top-navbar') @include('layouts.sidebar') <div class="content-wrapper">
                <div class="content-header"></div> @yield('content')
            </div>
            <aside class="control-sidebar control-sidebar-dark">

            </aside>

            @include('layouts.footer')

        </div>
        @routes
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
        <script src="https://cdn.datatables.net/plug-ins/1.12.1/api/sum().js"></script>

        <!-- Direct Print -->
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

        <!-- Crop Image -->
        <script src="{{ asset('/res/js/croppie.js') }}"></script>
        <!-- Autocomplete -->
        <script src="{{ asset('/res/js/jquery.autocomplete.js') }}"></script>

        <!-- Mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>

        <!-- table-to-excel -->
        <script src="{{ asset('/res/js/jquery.table2excel.js') }}"></script>

        <!-- Calander -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
            $(document).on('select2:open', (e) => {
                const selectId = e.target.id;
                $(".select2-search__field[aria-controls='select2-" + selectId + "-results']").each(function(key,
                    value, ) {
                    value.focus();
                });
            });
            $(window).on("load", loadDark());
            var url = window.location;
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active bg-success');

            $('ul.nav-treeview a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a');

            function toggleDark() {
                var element = document.getElementById("layoutBody")
                element.classList.toggle("dark-mode")
                let dark = JSON.parse(localStorage.getItem("jamesonDarkMode"))
                if (dark) {
                    localStorage.setItem("jamesonDarkMode", JSON.stringify(false))
                } else {
                    localStorage.setItem("jamesonDarkMode", JSON.stringify(true))
                }
                //optional to change fontawesome icon on button
                var buttonElement = document.getElementById("darkIcon")
                buttonElement.classList.toggle("fa-moon")
                buttonElement.classList.toggle("fas")
                buttonElement.classList.toggle("far")
                buttonElement.classList.toggle("fa-sun")
            }

            function loadDark() {
                //default is light mode
                let dark = JSON.parse(localStorage.getItem("jamesonDarkMode"))
                if (dark === null) {
                    localStorage.setItem("jamesonDarkMode", JSON.stringify(false))
                } else if (dark === true) {
                    document.getElementById("layoutBody").classList.add("dark-mode")
                }
            }
            // $('#reservationdate').datetimepicker({
            //         format: 'L'
            //     });
        </script>

        <!-- mes,bgcolor,textcolor,icn,head -->
        <script>
            @if (!empty($errors->all()))
                @foreach ($errors->all() as $eerror)
                    message("{{ $eerror }}", '#FF0000', 'white', 'error', 'Error');
                @endforeach
            @endif

            @if (Session::has('message'))
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
