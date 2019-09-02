<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/logo-dishub.jpg">
    <title>Login - Dinas Perhubungan Padang Panjang</title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/dashforge//lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/dashforge//lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/dashforge//assets/css/dashforge.css">
    <link rel="stylesheet" href="{{ url('/') }}/dashforge//assets/css/dashforge.auth.css">
</head>
<body>
@include('panel.modalMenu')

@include('panel.navbarPanel')

<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p">
            <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
                <div class="pd-t-20 wd-100p">
                    <h4 class="tx-color-01 mg-b-5">Sign In</h4>
                    <p class="tx-color-03 tx-16 mg-b-40">Silahkan Login Sebelum Mengakses Panel Dinas Perhubungan.</p>
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0-f">Password</label>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                    <button type="submit" class="btn btn-outline-twitter btn-block">Sign In</button>
                    </form>
                    <div class="divider-text">or</div>
                    <a href="{{ route('registerPage') }}" class="btn btn-outline-facebook btn-block">Buat Akun</a>
                    <div class="tx-13 mg-t-20 tx-center"></div>
                </div>
            </div><!-- sign-wrapper -->
            <div class="media-body pd-y-30 pd-lg-x-50 pd-xl-x-60 align-items-center d-none d-lg-flex pos-relative">
                <div class="mx-lg-wd-500 mx-xl-wd-550">
                    <img src="{{ url('/') }}/logo-dishub.jpg" class="img-fluid" alt="">
                </div>
            </div><!-- media-body -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->
@include('panel.scriptPanel')
@include('panel.footerPanel')


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
