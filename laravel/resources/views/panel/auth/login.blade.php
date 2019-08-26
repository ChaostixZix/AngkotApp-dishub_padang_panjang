<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Dinas Perhubungan">
    <meta name="author" content="Bintang">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/dashforge//assets/img/favicon.png">

    <title>Sign In</title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/dashforge//lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/dashforge//lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/dashforge//assets/css/dashforge.css">
    <link rel="stylesheet" href="{{ url('/') }}/dashforge//assets/css/dashforge.auth.css">
</head>
<body>

@include('panel.navbarPanel')
<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
{{--            <div class="media-body align-items-center d-none d-lg-flex">--}}
{{--                <div class="mx-wd-600">--}}
{{--                    <img src="https://via.placeholder.com/1260x950" class="img-fluid" alt="">--}}
{{--                </div>--}}
{{--                <div class="pos-absolute b-0 l-0 tx-12 tx-center">--}}
{{--                    Workspace design vector is created by <a href="https://www.freepik.com/pikisuperstar" target="_blank">pikisuperstar (freepik.com)</a>--}}
{{--                </div>--}}
{{--            </div><!-- media-body -->--}}
            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p">
                    <h3 class="">Dinas<span>Perhubungan</span></h3>
                    <p class="tx-color-03 tx-16 mg-b-40">Selamat Datang {{ \Illuminate\Support\Facades\Session::get('username') }}. Silahkan Login Untuk Mengakses Panel.</p>
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" name="username" class="form-control" placeholder="yourname@yourmail.com">
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Password</label>
{{--                            <a href="" class="tx-13">Forgot password?</a>--}}
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <button class="btn btn-brand-02 btn-block">Sign In</button>
{{--                    <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="page-signup.html">Create an Account</a></div>--}}
                    </form>
                </div>
            </div><!-- sign-wrapper -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->

<footer class="footer">
    <div>
        <span>&copy; 2019 Bitnang v1.0.0. </span>
        <span>Created by <a href="">Bintang</a></span>
    </div>
    <div>
        <nav class="nav">
            <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
            <a href="{{ url('/') }}/dashforge//change-log.html" class="nav-link">Change Log</a>
            <a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
        </nav>
    </div>
</footer>

<script src="{{ url('/') }}/dashforge//lib/jquery/jquery.min.js"></script>
<script src="{{ url('/') }}/dashforge//lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/') }}/dashforge//lib/feather-icons/feather.min.js"></script>
<script src="{{ url('/') }}/dashforge//lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script src="{{ url('/') }}/dashforge//assets/js/dashforge.js"></script>

<!-- append theme customizer -->
<script src="{{ url('/') }}/dashforge//lib/js-cookie/js.cookie.js"></script>
<script src="{{ url('/') }}/dashforge//assets/js/dashforge.settings.js"></script>

</body>
</html>
