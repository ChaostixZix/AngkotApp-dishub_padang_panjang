@include('panel.headerPanel')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css"
      rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/select2/css/select2.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/quill/quill.core.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/quill/quill.snow.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/select2/css/select2.min.css" rel="stylesheet">
<link href="{{ url('/') }}/dashforge/lib/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet">
<!-- DashForge CSS -->
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.landing.css">
@include('panel.navbarPanel')

<div class="home-slider">
    <div class="home-lead">
        <div class="df-logo-initial mg-b-15"><p>DH</p></div>
        <p class="home-text">DINAS PERHUBUNGAN PADANG PANJANG</p>

        <h6 class="home-headline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel viverra mauris, id sagittis sapien. Vestibulum non risus leo. Nam quis volutpat elit.</h6>

        <div class="d-flex wd-lg-350">
            <a href="{{route('registerPage')}}" class="btn btn-brand-01 btn-uppercase flex-fill">Sign UP</a>
            <a href="{{route('loginPage')}}" class="btn btn-white btn-uppercase flex-fill mg-l-10">Sign IN</a>
        </div>

        <div class="d-flex tx-20 mg-t-40">
            <div class="tx-purple"><i class="fa fa-shuttle-van"></i></div>
            <div class="tx-orange pd-l-10"><i class="fa  fa-mail-bulk"></i></div>
            <div class="tx-primary pd-l-10"><i class="fa  fa-car-crash"></i></div>
            <div class="tx-pink pd-l-10"><i class="fa  fa-parking"></i></div>
            <div class="tx-warning pd-l-10"><i class="fab fa-js"></i></div>


            <div class="bd-l mg-l-10 mg-sm-l-20 pd-l-10 pd-sm-l-20"></div>
            <div class="tx-color-03" data-toggle="tooltip" data-title="Ongoing development" data-original-title="" title=""><i class="fab fa-bootstrap"></i></div>


        </div>

        <div class="tx-12 tx-color-03 mg-t-40">



            <div>
                <span>© DINAS PERHUBUNGAN PADANG PANJANG </span>

            </div>
        </div>
    </div>
    <div class="home-slider-img">
        <div><img src="{{ url('/') }}/logo-dishub.jpg" alt=""></div>
        <div></div>
        <div></div>
    </div>
    <div class="home-slider-bg-one"></div>
</div><!-- home-slider -->


@include('panel.scriptPanel')
@include('panel.footerPanel')
