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
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.calendar.css">
@include('panel.navbarPanel')

<div class="content content-fixed">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h4 class="mg-b-5">Angkot</h4>
                <p class="mg-b-0 tx-color-03">Lihat profil angkot dan edit profil angkot.</p>
            </div>
            <div class="mg-t-20 mg-sm-t-0">
                <button class="btn btn-primary" type="button">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
        </div>
    </div>
    <hr class="mg-t-60 mg-b-30">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <!-- row -->
        <div class="row">
            @foreach($listAngkot as $l)
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-help">
                        <div class="card-body tx-13">
                            <div class="tx-60 lh-0 mg-b-25"><i class="fa fa-shuttle-van"></i></div>
                            <h5><a href="" class="link-01">{{ $l->nama_angkot }}</a></h5>
                            <p class="tx-color-03 mg-b-0">{{ $l->jurusan }}</p>
                        </div><!-- card-body -->
                        <div class="card-footer tx-13">
                            {{--                        <span>{{ count(json_decode($l->rute)) }} Rute</span>--}}
                            <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('angkotUpdatePageAdmin') }}/{{ $l->id }}"
                               class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div><!-- col -->
            @endforeach
        </div><!-- row -->
    </div>
</div>


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@include('panel.scriptPanel')
<script src="{{ url('/') }}/dashforge/lib/jqueryui/jquery-ui.min.js"></script>

<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>


@include('panel.footerPanel')
