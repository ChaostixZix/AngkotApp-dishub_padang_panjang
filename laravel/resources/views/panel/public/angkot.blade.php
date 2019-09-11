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
    <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel2">Informasi Supir</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detailProfil" class="mg-b-0">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="jurusanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel2">Informasi Jurusan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detailJurusan" class="mg-b-0">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h4 class="mg-b-5">Angkot</h4>
                <p class="mg-b-0 tx-color-03">Lihat profil angkot dan edit profil angkot.</p>
            </div>
        </div>
    </div>
    <hr class="mg-t-60 mg-b-30">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <!-- row -->
        <div class="row">
            @foreach($listAngkot as $l)
                <div id="angkot{{ $l->id }}" class="col-sm-6 col-lg-3 mg-b-10">
                    <div class="card card-help">
                        <div class="card-header tx-semibold">
                            {{ $l->nama_angkot }}
                        </div>
                        <div class="card-body tx-13">
                            <div class="tx-60 lh-0 mg-b-25"><i class="fa fa-shuttle-van"></i></div>
{{--                            <h5><a href="" class="link-01">{{ $l->nama_angkot }}</a></h5>--}}
                            @foreach($dataJurusan as $c)
                                @if($c->id == $l->id_jurusan)
                                    <p class="tx-color-03 mg-b-0">{{ $c->awal_jurusan }}
                                        -> {{ $c->tujuan_jurusan }}</p>
                                @endif
                            @endforeach
                        </div><!-- card-body -->
                        <div class="card-footer tx-13">
                            @if($l->supir !== null)
                                <a onclick="profilsupir('{{$l->id}}')" class="btn btn-secondary"><i
                                        class="tx-white fa fa-user"></i></a>
                            @endif
                                <a onclick="getJurusan('{{$l->id}}')" class="btn btn-success"><i
                                        class="tx-white fa fa-route"></i></a>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div><!-- col -->
            @endforeach
        </div><!-- row -->
    </div>
</div>


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@include('panel.scriptPanel')
<script>
    function tambahAngkot() {
        $('#newAngkot').modal('show');
    }

    function profilsupir(id) {
        $.ajax({
            url: '{{ route('getSupirDataAngkot') }}/' + id,
            type: 'get',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data !== 'false') {
                    $('#detailProfil').html(data);
                    $('#profilModal').modal('show');
                } else {
                    Swal.fire('Gagal', 'Gagal mendapatkan data', 'error');
                }

            }
        })
    }

    function getJurusan(id) {
        $.ajax({
            url: '{{ route('getJurusanDataAngkot') }}/' + id,
            type: 'get',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data !== 'false') {
                    $('#detailJurusan').html(data);
                    $('#jurusanModal').modal('show');
                } else {
                    Swal.fire('Gagal', 'Gagal mendapatkan data', 'error');
                }

            }
        })
    }

</script>
<script src="{{ url('/') }}/dashforge/lib/jqueryui/jquery-ui.min.js"></script>

<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/dashforge/lib/select2/js/select2.min.js"></script>


@include('panel.footerPanel')
