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
    <div class="content content-fixed" id="contentPesanan">
        <div class="content-header">
            <h6>Pesanan</h6>
        </div><!-- contact-content-header -->

        <div class="content-body ps">

            <div class="col-lg-12">
                <div class="card mg-b-10">
                    <div class="card-header tx-center ">
                        <div>
                            <h6 class="mg-b-5">Pesanan Derek</h6>
                            <p class="tx-13 tx-color-03 mg-b-0">Pesanan derek
                                30 days</p>
                        </div>
                    </div><!-- card-header -->
                    <div class="card-body tx-center">
                        <div class="row justify-content-center">
                            <div class="col-12 tx-100 lh-1"><i class="fa fa-car-crash"></i></div>
{{--                            <div class="col-12 dropdown">--}}
{{--                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Kategori--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu tx-center" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <a class="dropdown-item" href="#"><font class=" tx-bolder tx-success">New</font></a>--}}
{{--                                    <a class="dropdown-item" href="#"><font class="tx-bolder tx-purple">Terima Admin</font></a>--}}
{{--                                    <a class="dropdown-item" href="#"><font class="tx-bolder tx-primary">Proses</font></a>--}}
{{--                                    <a class="dropdown-item" href="#"><font class="tx-bolder tx-gray">Done</font></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->

            </div>
            <div class="col-12">
                <div id="pesananNew" class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0">List Pesanan</h6>
                        {{--                        <div class="d-flex tx-18">--}}
                        {{--                            <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>--}}
                        {{--                            <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>--}}
                        {{--                        </div>--}}
                    </div>
                    <ul class="list-group list-group-flush tx-13">
                        @foreach($pesanan as $i => $val)
                            <div id="listPesanan{{ $i }}" style="display: none;">
                                @foreach($val as $l)
                                    <a href="#" onclick="seePesanan('{{ $l->id }}')"
                                       class="list-group-item d-flex pd-sm-x-20">
                                        @if($l->status == 0)
                                            <div class="avatar d-none d-sm-block"><span
                                                    class="avatar-initial rounded-circle bg-success"><i
                                                        class="fa fa-envelope"></i></span></div>
                                        @elseif($l->status == 1)
                                            <div class="avatar d-none d-sm-block"><span
                                                    class="avatar-initial rounded-circle bg-purple"><i
                                                        class="fa fa-envelope-open"></i></span></div>
                                        @elseif($l->status == 2)
                                            <div class="avatar d-none d-sm-block"><span
                                                    class="avatar-initial rounded-circle bg-primary"><i
                                                        class="fa fa-paper-plane"></i></span></div>
                                        @elseif($l->status == 3)
                                            <div class="avatar d-none d-sm-block"><span
                                                    class="avatar-initial rounded-circle bg-gray"><i
                                                        class="fa fa-check-circle"></i></span></div>
                                        @endif
                                        <div class="pd-sm-l-10">
                                            <p class="tx-medium mg-b-0">Pesanan #{{ $l->id }}</p>
                                            <small
                                                class="tx-12 tx-color-03 mg-b-0">{{ \Carbon\Carbon::parse($l->date)->subDay()->subMonth()->format('l d F, Y') }} {{ $l->time }}</small>
                                        </div>
                                        <div class="mg-l-auto text-right">
                                            <p class="tx-medium mg-b-0">{{ "Rp " . number_format($l->harga,2,',','.') }}</p>
                                            @if($l->status == 0)
                                                <small class="tx-12 tx-bolder tx-success mg-b-0">New</small>
                                            @elseif($l->status == 1)
                                                <small class="tx-12 tx-bolder tx-purple mg-b-0">Terima Admin</small>
                                            @elseif($l->status == 2)
                                                <small class="tx-12 tx-bolder tx-primary mg-b-0">Proses</small>
                                            @elseif($l->status == 3)
                                                <small class="tx-12 tx-bolder tx-gray mg-b-0">Done</small>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </ul>
                    <div class="card-footer text-center tx-13">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mg-b-5">
                                {{--                            <li class="page-item disabled"><a class="page-link page-link-icon" href="#"><i data-feather="chevron-left"></i></a></li>--}}
                                @foreach($pesanan as $i => $val)
                                    <li id="buttonIndexPesanan{{ $i }}" class="page-item"><a class="page-link" href="#"
                                                                                             onclick="showPesanan('{{ $i }}')">{{ $i + 1}}</a>
                                    </li>
                                @endforeach
                                {{--                            <li class="page-item"><a class="page-link page-link-icon" href="#"><i data-feather="chevron-right"></i></a></li>--}}
                            </ul>
                        </nav>
                    </div><!-- card-footer -->
                </div><!-- card -->
            </div>


        </div><!-- contact-content-body -->
    </div><!-- contact-content-body -->

</div><!-- contact-content -->


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@include('panel.scriptPanel')
<script>
    var indexPesanan = 0;

    $(document).ready(function () {

        @foreach($pesanan as $i => $val)
        $('#listPesanan{{ $i }}').hide();
        indexPesanan++;
        @endforeach

        showPesanan('0');
    });

    function showPesanan(i) {
        for (var a = 0; a < indexPesanan; a++) {
            var pesananNonAktif = $('#listPesanan' + a);
            pesananNonAktif.hide();

            $('#buttonIndexPesanan' + a).removeClass('active');
        }
        var pesananAktif = $('#listPesanan' + i);
        pesananAktif.show();

        $('#buttonIndexPesanan' + i).addClass('active');
    }

    function seePesanan(id) {
        window.location.replace("{{ route('derekInvoicePage') }}/" + id)
    }
</script>

<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>


@include('panel.footerPanel')
