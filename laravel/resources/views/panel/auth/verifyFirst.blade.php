@include('panel.headerPanel')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@include('panel.navbarPanel')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css"
      rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/select2/css/select2.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/quill/quill.core.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/quill/quill.snow.css" rel="stylesheet">

<!-- DashForge CSS -->
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.calendar.css">


<div class="contact-wrapper">
    <!-- contact-navleft -->

    <!-- contact-sidebar -->
    <div class="content content-fixed content-auth-alt">
        <div class="container ht-100p">
            <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
                <div class="wd-150 wd-sm-250 mg-b-30"><img src="http://localhost/dishub-laravel/public/logo-dishub.jpg" class="img-fluid" alt=""></div>
                <h4 class="tx-20 tx-sm-24">Akun masih dalam tahap verifikasi</h4>
                <p class="tx-color-03 mg-b-40">Akun akan segera bisa dipakai setelah diverifikasi oleh admin</p>


            </div>
        </div><!-- container -->
    </div>
</div><!-- contact-content -->


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@include('panel.scriptPanel')
@include('panel.footerPanel')
