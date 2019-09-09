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
    <div class="modal fade" id="newAngkot" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
            <div class="modal-content">
                <div class="modal-header pd-y-20 pd-x-20 pd-sm-x-30">
                    <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal"
                       aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                    <div class="media align-items-center">
                        <span class="tx-60 tx-color-03 d-none d-sm-block">
                            <i class="fa fa-shuttle-van"></i>
                        </span>
                        <div class="media-body mg-sm-l-20">
                            <h4 class="tx-18 tx-sm-20 mg-b-2">Angkot Baru</h4>
                            <p class="tx-13 tx-color-03 mg-b-0">Ma
                                sukkan Nama Angkot.</p>
                        </div>
                    </div><!-- media -->
                </div><!-- modal-header -->
                <div class="modal-body pd-sm-t-30 pd-sm-b-40 pd-sm-x-30">


                    <div class="form-group">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama Angkot</label>
                        <input type="text" id="nama_angkot" class="form-control" placeholder="Nama Angkot">
                    </div>

                </div><!-- modal-body -->
                <div class="modal-footer pd-x-20 pd-y-15">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                    <button onclick="createAngkot()" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h4 class="mg-b-5">Angkot</h4>
                <p class="mg-b-0 tx-color-03">Lihat profil angkot dan edit profil angkot.</p>
            </div>
            <div class="mg-t-20 mg-sm-t-0">
                <button onclick="tambahAngkot()" class="btn btn-primary" type="button">
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
                <div id="angkot{{ $l->id }}" class="col-sm-6 col-lg-3">
                    <div class="card card-help">
                        <div class="card-body tx-13">
                            <div class="tx-60 lh-0 mg-b-25"><i class="fa fa-shuttle-van"></i></div>
                            <h5><a href="" class="link-01">{{ $l->nama_angkot }}</a></h5>
                            {{--                            <p class="tx-color-03 mg-b-0">{{ $l->jurusan }}</p>--}}
                        </div><!-- card-body -->
                        <div class="card-footer tx-13">
                            {{--                        <span>{{ count(json_decode($l->rute)) }} Rute</span>--}}
                            <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a onclick="deleteAngkot({{ $l->id }})" class="btn btn-danger"><i
                                    class="tx-white fa fa-trash"></i></a>
                            @if($l->supir !== null)
                                <a onclick="profilsupir('{{$l->id}}')" class="btn btn-secondary"><i
                                        class="tx-white fa fa-user"></i></a>
                            @endif
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
<script>
    function tambahAngkot() {
        $('#newAngkot').modal('show');
    }

    function createAngkot() {
        formData = new FormData;
        $('#newAngkot :input').each(function () {
            // if ($(this).attr('id') !== 'rute') {
            formData.append($(this).attr('id'), $(this).val());
            // }
        });
        formData.append('_token', '{{ csrf_token()  }}')
        var nama = $('#nama_angkot').val();
        $.ajax({
            url: '{{ route('createAngkot') }}',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    if (data === 'true') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil menambah angkot',
                            type: 'success'
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', 'Gagal menambah angkot', 'error');
                    }
                }
            }
        })
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
                    Swal.fire('Gagal', 'Gagal menghapus angkot', 'error');
                }

            }
        })
    }

    function deleteAngkot(id) {
        $.ajax({
            url: '{{ route('deleteAngkot') }}/' + id,
            type: 'get',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Berhasil menghapus angkot',
                        type: 'success'
                    }).then(function () {
                        $('#angkot' + id).hide();
                    });
                } else {
                    Swal.fire('Gagal', 'Gagal menghapus angkot', 'error');
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
