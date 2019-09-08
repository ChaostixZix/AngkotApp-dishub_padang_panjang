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
    <div class="modal fade" id="newJurusan" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
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
                            <h4 class="tx-18 tx-sm-20 mg-b-2">Jurusan Baru</h4>
                            <p class="tx-13 tx-color-03 mg-b-0">Masukkan Nama dan Jurusan jurusan.</p>
                        </div>
                    </div><!-- media -->
                </div><!-- modal-header -->
                <div id="modalFormJurusan" class="modal-body pd-sm-t-30 pd-sm-b-40 pd-sm-x-30">

                    <div class="form-group">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Awal Jurusan</label>
                        <input type="text" id="awal_jurusan" class="form-control" placeholder="Awal Jurusan">
                    </div>
                    <div class="form-group">
                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Tujuan
                            Jurusan</label>
                        <input type="text" id="tujuan_jurusan" class="form-control" placeholder="Tujuan Jurusan">
                    </div>

                    <div id="inputListRute" class="mg-b-5">
                        <div class="form-group">
                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03">Rute</label>
                            <input id="rute[]" type="text" class="form-control" placeholder="Rute 1">
                        </div><!-- col -->
                    </div>
                    <button id="btnAddRute" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                    </button>

                </div><!-- modal-body -->
                <div class="modal-footer pd-x-20 pd-y-15">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                    <button onclick="tambah()" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h4 class="mg-b-5">Jurusan</h4>
                <p class="mg-b-0 tx-color-03">Edit rute dan detail jurusan.</p>
            </div>
            <div class="mg-t-20 mg-sm-t-0">
                <button onclick="tambahJurusan()" class="btn btn-primary" type="button">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
        </div>
    </div>
    <hr class="mg-t-60 mg-b-30">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <!-- row -->
        <div class="row">
            @foreach($listJurusan as $l)
                <div id="jurusan{{ $l->id }}" class="col-sm-6 col-lg-3">
                    <div class="card card-help">
                        <div class="card-body tx-13">
                            <div class="tx-teal tx-60 lh-0 mg-b-25"><i class="fa fa-route"></i></div>
                            <h5>{{ strtoupper($l->awal_jurusan) }} <font
                                    class="tx-primary">-></font> {{ strtoupper($l->tujuan_jurusan) }}</h5>
                            <p class="tx-color-03 mg-b-0">
                                @foreach(json_decode($l->rute) as $r)
                                    {{ $r }}
                                @endforeach
                            </p>
                        </div><!-- card-body -->
                        <div class="card-footer tx-13">
                            {{--                        <span>{{ count(json_decode($l->rute)) }} Rute</span>--}}
                            <a onclick="deleteJurusan({{ $l->id }})" class="btn btn-danger"><i
                                    class="tx-white fa fa-trash"></i></a>
                            <a href="{{ route('jurusanUpdatePageAdmin') }}/{{ $l->id }}"
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
    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $("#inputListRute"); //Fields wrapper
        var add_button = $("#btnAddRute"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-group">\n' +
                    '                                        <div class="input-group">\n' +
                    '                                            <input value="" id="rute[]"type="text"\n' +
                    '                                                   class="form-control"\n' +
                    '                                            <div class="input-group-append">\n' +
                    '                                                <button class="btn btn-danger remove_field" type="button" id="button-addon2">Remove</button>\n' +
                    '                                            </div>\n' +
                    '                                        </div>' +
                    '             </div>'); //add input box
            }
        });
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })

    });

    function tambahJurusan() {
        $('#newJurusan').modal('show');
    }

    function tambah() {
        var formData = new FormData;
        formData.append('_token', '{{ csrf_token() }}');
        $('#modalFormJurusan :input').each(function () {
            // if ($(this).attr('id') !== 'rute') {
            formData.append($(this).attr('id'), $(this).val());
            // }
        });

        $.ajax({
            url: '{{ route('createJurusan') }}',
            data: formData,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    if (data === 'true') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil membuat jurusan baru',
                            type: 'success'
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', 'Gagal membuat jurusan baru', 'error');
                    }
                }
            }
        })
    }

    function deleteJurusan(id) {
        $.ajax({
            url: '{{ route('deleteJurusan') }}/' + id,
            type: 'get',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    if (data === 'true') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil menghapus jurusan',
                            type: 'success'
                        }).then(function () {
                            $('#jurusan' + id).hide();
                        });
                    } else {
                        Swal.fire('Gagal', 'Gagal menghapus jurusan', 'error');
                    }
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
