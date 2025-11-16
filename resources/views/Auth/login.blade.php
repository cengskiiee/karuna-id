<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Login | Hadiwana Tirta Lestari</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('hdw-icon.png') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('Assets/Login/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('Assets/Login/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('Assets/Login/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom-->
    <link href="{{ asset('Assets/Login/css/custom.css') }}?v=1.0.0" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-warning text-center">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="{{ route('home') }}" class="auth-logo">
                                        <img src="{{ asset('Assets/Landing/images/hdw-icon2.png') }}" height="100"
                                            class="logo-dark mx-auto" alt="">
                                        <img src="{{ asset('Assets/Landing/images/hdw-icon2.png') }}" height="100"
                                            class="logo-light mx-auto" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center mb-4">Sign in to continue to Dashboard.</p>

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <b>Opps!</b> {{ session('error') }}
                                    </div>
                                @endif

                                <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter Email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <div class="input-group">
                                            <input type="password" autocomplete="" class="form-control"
                                                id="userpassword" name="password" placeholder="Enter password">
                                            <span class="input-group-text">
                                                <i id="togglePassword" class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-4">
                                        <div class="col-lg-12 text-end">
                                            <button style="width: 100%;"
                                                class="btn btn-primary waves-effect waves-light" type="submit">Log
                                                In</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center text-light">
                        © 2024 Hadiwana Tirta Lestari | Login<span class="d-none d-sm-inline-block">.</span>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->

    <script src="{{ asset('Assets/Login/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Assets/Login/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Assets/Login/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('Assets/Login/libs/node-waves/waves.min.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('Assets/Login/libs/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('Assets/Login/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                // Get the password field
                var passwordField = $('#userpassword');
                // Get the current type of the password field
                var passwordFieldType = passwordField.attr('type');

                // Toggle the type attribute
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>

</body>

</html>
