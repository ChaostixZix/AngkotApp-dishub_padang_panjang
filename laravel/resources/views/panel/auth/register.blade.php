
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/logo-dishub.jpg">

    <title>Register - Dinas Perhubungan Padang Panjang</title>

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
                    <h4 class="tx-color-01 mg-b-5">Create New Account</h4>
                    <p class="tx-color-03 tx-16 mg-b-40">It's free to signup and only takes a minute.</p>
                    <div id="alertAkunAda" class="alert alert-danger" role="alert" style="display: none">
                        Akun dengan username tersebut sudah ada!
                    </div>
                    <div class="form-group">
                        <label>Register Untuk</label>
                        <select id="level" class="custom-select" required>
                            <option value=""></option>
                            @foreach($level as $t)
                                <option value="{{ $t }}">{{ str_replace('_', ' ', strtoupper($t)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input id="username" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Password</label>
                        </div>
                        <input id="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Password</label>
                        </div>
                        <input id="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group tx-12">
                        By clicking <strong>Create an account</strong> below, you agree to our terms of service and privacy statement.
                    </div><!-- form-group -->
                    <button onclick="registerCheck()" id="btnBuatAcc" class="btn btn-outline-facebook btn-block">Buat Akun</button>
                    <div id="loadingLogo" class="text-center" style="display:none;">
                        <div class="spinner-border text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="divider-text">or</div>
                    <a href="{{ route('loginPage') }}" class="btn btn-outline-twitter btn-block">Sign In</a>
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

<script src="{{ url('/') }}/dashforge/assets/js/dashforge.js"></script>
<script src="{{ url('/') }}/dashforge/lib/parsleyjs/parsley.min.js"></script>


<!-- append theme customizer -->
<script src="{{ url('/') }}/dashforge//lib/js-cookie/js.cookie.js"></script>
<script src="{{ url('/') }}/dashforge//assets/js/dashforge.settings.js"></script>
<script>
    var btnBuatAcc = $('#btnBuatAcc');
    var loadingLogo = $('#loadingLogo');
    var alertAkunAda = $('#alertAkunAda');

    var level = $('#level');
    var username = $('#username');
    var password = $('#password');
    var nama_lengkap = $('#nama_lengkap');

    function registerCheck() {
        if(nama_lengkap.val() === '' || level.val() === '' || username.val() === '' || password.val() === '')
        {
            alert('Harap isi semua input')
        }else {
            register();

        }
    }
    function register() {
        btnBuatAcc.hide();
        alertAkunAda.hide();
        loadingLogo.show();

        $.ajax({
            type: 'post',
            url: '{{ route('registerAjax') }}',
            data: {nama_lengkap: nama_lengkap.val(), level: level.val(), username: username.val(), password: password.val(), _token: '{{ csrf_token() }}'},
            dataType: 'json',
            success: function (data) {
                var json = $.parseJSON(JSON.stringify(data));

                if(json['status'] !== 'false')
                {
                    window.location.replace("{{ route('loginPage') }}/");
                }else {
                    btnBuatAcc.show();
                    alertAkunAda.show();
                    loadingLogo.hide();
                }
            }
        })
    }
</script>
</body>
</html>
