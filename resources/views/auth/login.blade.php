<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('Login_v1/images/icons/favicon.ico') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v1/css/main.css') }}">
</head>
<style>
    #alert {
        position: absolute;
        color: rgb(145, 0, 0);
        height: 20px;
        margin-bottom: 5%;
    }
</style>

<body>

    <div class="limiter">

        <div class="container-login100">

            <div class="wrap-login100">
                {{--  <div class="" id="alert">
                    @if (Session::has('error'))
                        <span class="alert alert-danger">
                            {{ Session::get('error') }}
                        </span>
                    @endif
                </div>  --}}
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('Login_v1/images/img-01.png') }}" alt="IMG">
                </div>

                <form action="{{ route('auth.login') }}" method="post" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        Admin Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('Login_v1/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('Login_v1/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('Login_v1/js/main.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

</body>

</html>
