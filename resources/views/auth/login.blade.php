
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mannat Themes">
    <meta name="keyword" content="">

    <title>Hospital MIS | Login</title>

    <!-- Theme icon -->
    <link rel="shortcut icon" href="{{asset('/syntra/assets/images/favicon.ico')}}">

    <!-- Theme Css -->
    <link href="{{asset('/syntra/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/syntra/assets/css/slidebars.min.css')}}" rel="stylesheet">
    <link href="{{asset('/syntra/assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('/syntra/assets/css/menu.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/syntra/assets/css/style.css')}}" rel="stylesheet">
</head>

<body class="sticky-header">
<section class="bg-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-box">
                            <div class="card m-b-30">
                                <div class="card">
{{--                                    <div class="card-header">{{ __('Login') }}</div>--}}

                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <img src="{{asset('syntra/assets/images/logo_sm_2.png')}}" alt="" class="">
                                            <h5 class="mt-3"><b>PLEASE LOGIN</b></h5>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="{{asset('/syntra/assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('/syntra/assets/js/popper.min.js')}}"></script>
<script src="{{asset('/syntra/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/syntra/assets/js/jquery-migrate.js')}}"></script>
<script src="{{asset('/syntra/assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('/syntra/assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/syntra/assets/js/slidebars.min.js')}}"></script>


<!--app js-->
<script src="{{asset('/syntra/assets/js/jquery.app.js')}}"></script>
</body>
</html>
