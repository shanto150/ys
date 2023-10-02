<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    {{-- Browser Icon --}}
    <link rel="icon" href="{{ url('/res/images/appimages/mainlogo.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/res/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/res/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/res/css/adminlte.min.css') }}">

    <!-- toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <style>
        @font-face {
            font-family: 'RobofanFree';
            src: url("{{ asset('/fonts/RobofanFree.otf') }}");
        }

        .logincss {
            display: inline-block;
            margin: 0;
            line-height: 1em;
            font-family: 'RobofanFree';
            font-weight: bold;
            font-size: 35px;
            background: linear-gradient(to right, #23A8F2 40%, #156996 50%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

</head>


<body class="hold-transition login-page" style="background: linear-gradient(135deg, #23A8F2 0%, #156996 100%);">

{{-- <body class="hold-transition login-page"> --}}
    <div class="login-box shadow-lg">
        <!-- /.login-logo -->
        <div class="text-center m-2">
            <img src="{{ URL::asset('/res/images/appimages/mainlogo.png') }}" alt="profile Pic" height="120" width="120">
        </div>
        <div class="card card-outline card-primary">

            <div class="card-header text-center">
                <a href="" class="h1 logincss"><b>Registration</b></a>
            </div>
            <div class="card-body">

                <form action="{{ route('register') }}" method="post" onsubmit="return FromsCheck()" required>
                  @csrf
                  <div class="input-group mb-3">
                      <input id="name" type="text" placeholder="Full Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                      <input id="email" type="email" placeholder="Current Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                      <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                      <input id="password-confirm" placeholder="Retype Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                          <a href="{{ route('login') }}" class="btn btn-outline-danger">Back</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-8">
                      <button type="submit" class="btn btn-outline-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>

              </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('/res/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/res/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/res/dist/js/adminlte.min.js') }}"></script>

    <!-- Page specific script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>

    <script>

    function FromsCheck() {

            var vEmail= document.getElementById('email').value;
            if (vEmail=='') {
                message('Email Field is Empty!','#FF0000','white','error','Error');
                document.getElementById("email").focus();
                return false;
            }

            var vPass= document.getElementById('password').value;
            if (vPass=='') {
                message('Password Field is Empty!','#FF0000','white','error','Error');
                document.getElementById("password").focus();
                return false;
            }

            return true;

        };

    </script>

<script>

    @if (!empty($errors->all()))
        @foreach ($errors->all() as $eerror)
        message("{{ $eerror }}",'#FF0000','white','error','Error');
        @endforeach
    @endif

    @if (session('status'))
        message("{{ session('status') }}",'#FF0000','white','error','Error');
    @endif

</script>

</body>

</html>
