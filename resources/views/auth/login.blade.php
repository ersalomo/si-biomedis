<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>
    @include('layout.styles-template.css-styles')
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="row justify-content-center mt-3">
            <div class="col-md-4 col-sm-8 card mt-5">
                <h3 class="text-center text-uppercase text-bold mt-5">Login your account</h3>
                @if (Session::has('error'))
                    <span class="alert alert-danger text-center"><strong>{{ Session::get('error') }}</strong> </span>
                @endif
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="form-group mt-2">
                        <label>username/email</label>
                        <input name="email" value="{{ old('email') }}" class="form-control" type="email"
                            placeholder="username" />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input name="password" type="password" class="form-control" placeholder="password" />
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-submit me-2">Login now</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
@include('layout.styles-template.js-styles')

</html>
