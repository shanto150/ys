<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{ url('/res/images/appimages/mainlogo.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('/res/css/login.css') }}">
    <!-- toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <style>
        @font-face {
            font-family: 'RobofanFree';
            src: url("{{ asset('/fonts/RobofanFree.otf') }}");
        }
    </style>

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-10">

                    <div class="wrap d-md-flex">

                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last" >
                            <div class="text w-100 ">
                                <img src="{{ url('/res/images/appimages/mainlogo.png') }}" height="200" width="200"
                                    class="rounded-circle mx-auto d-block" alt="..." style="border: solid white; border-width: 5px">
                                <h2>Welcome HRW</h2>
                                <a href="{{ route('register') }}" class="btn btn-outline-warning">SignUp</a>
                            </div>
                        </div>

                        <div class="login-wrap p-4 p-lg-5 order-md-last">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4 logincss">Sign In</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            @php
                                if (isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass'])) {
                                    $login_email = $_COOKIE['login_email'];
                                    $login_pass = $_COOKIE['login_pass'];
                                    $is_remember = "checked='checked'";
                                } else {
                                    $login_email = '';
                                    $login_pass = '';
                                    $is_remember = '';
                                }
                            @endphp
                            <form method="POST" action="{{ route('login') }}" onsubmit="return FromsCheck()" required>
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ request()->input('email', old('email', $login_email)) }}"
                                        autocomplete="email" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ $login_pass }}" autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Sign
                                        In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" name="remember" class="form-control m-3"
                                                {{ $is_remember }} id="_checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="{{ route('password.request') }}">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('/res/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/res/js/popper.js') }}"></script>
    <script src="{{ asset('/res/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/res/js/main.js') }}"></script>
    <script src="{{ asset('/res/js/myfunctions.js') }}"></script>

    <!-- Page specific script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>

    <script>
        // mes,bgcolor,textcolor,icn,head
        function FromsCheck() {
            var vEmail = document.getElementById('email').value;
            if (vEmail == '') {
                message('Email Field is Empty!','#FF0000','white','error','Error');
                document.getElementById("email").focus();
                return false;
            }

            var vPass = document.getElementById('password').value;
            if (vPass == '') {
                message('Password Field is Empty!','#FF0000','white','error','Error');
                document.getElementById("password").focus();
                return false;
            }

            return true;
        }

    </script>

    <script>
        @if (!empty($errors->all()))
            @foreach ($errors->all() as $eerror)
            message("{{ $eerror }}",'#FF0000','white','error','Error');
            @endforeach
        @endif
    </script>

</body>

</html>
