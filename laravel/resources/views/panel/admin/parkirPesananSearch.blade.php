@include('panel.headerPanel')
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
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.mail.css">


<div class="content content-fixed">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row row-xs">
            <div class="col-lg-12">
                <div class="card mg-b-10">
                    <div class="card-header tx-center ">
                        <div>
                            <h6 class="mg-b-5">Pesanan Parkir</h6>
                            <p class="tx-13 tx-color-03 mg-b-0">Pesanan parkir
                                30 days</p>
                        </div>
                    </div><!-- card-header -->
                    <div class="card-body tx-center">
                        <div class="row justify-content-center">
                            <div class="col-12 tx-100 lh-1"><i class="fa fa-parking"></i></div>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mg-b-0">Cari Pesanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="search-form col-12">
                            <input id="searchPlat" type="search" class="form-control" placeholder="Cari Plat Nomor">
                            <button class="btn" type="button"><i data-feather="search"></i></button>
                        </div>
                    </div>
                    <div>
                        <div class="card-footer text-center tx-13">
                            <button onclick="searchData()" class="btn btn-primary" type="submit"><i
                                    class="fa fa-search"></i> Cari
                            </button>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>
            </div>
            <div class="col-6" id="detailInvoice" style="display: none">
                <div class="card ht-100p">
                    <div class="card-header">
                        <h6 class="mg-b-0">Detail Pesanan</h6>
                    </div>
                    <div id="detailInvoiceBody" class="card-body">
                        <div id="placeholderPesan" style="display: none" class="placeholder-paragraph aligned-centered">
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div>
                        <div class="card-footer text-center tx-13">
                            <button id="btnLihat" onclick="lihatInvoice()" class="btn btn-secondary tx-white" type="submit"><i
                                    class="fa fa-file-invoice"></i>
                                Lihat
                            </button>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->
@include('panel.scriptPanel')
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script>
    function lihatInvoice() {
        var id = $('#id').text();
        window.open('{{ route('parkirInvoicePage') }}/' + id, '_blank');
    }

    function searchData() {
        $('#placeholderPesan').show();
        var plat_nomor = $('#searchPlat').val();
        $.ajax({
            type: "get",
            url: "{{ route('parkirAjaxSearch') }}/" + plat_nomor,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data !== 'false') {
                    $('#placeholderPesan').hide();
                    $('#detailInvoice').show();
                    $('#detailInvoiceBody').html(data);
                    $('#btnLihat').attr('disabled', false);
                } else {
                    $('#detailInvoice').show();
                    $('#detailInvoiceBody').html('Data tidak ditemukan');
                    $('#btnLihat').attr('disabled', true);
                }
            }
        })
    };
    $(document).ready(function () {
        $('#dataPesanan').DataTable({
            language: {
                searchPlaceholder: 'Cari...',
                sSearch: '',
                lengthMenu: '_MENU_ pesanan/page',
            }
        });
    })
</script>

@include('panel.footerPanel')
