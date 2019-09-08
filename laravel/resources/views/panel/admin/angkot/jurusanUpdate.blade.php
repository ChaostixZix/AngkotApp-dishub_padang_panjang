@include('panel.headerPanel')

@include('panel.navbarPanel')
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.profile.css">
<div class="content content-fixed content-profile">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        @foreach($dataJurusan as $d)
            <div class="media d-block d-lg-flex">
                <div class="profile-sidebar pd-lg-r-25">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-help">
                                <div class="card-body tx-13">
                                    <div class="tx-60 lh-0 mg-b-25"><i class="tx-teal fa fa-route"></i></div>
                                    <h5><a href="" class="link-01">{{ strtoupper($d->awal_jurusan) }} <font
                                                class="tx-primary">-></font> {{ strtoupper($d->tujuan_jurusan) }}</a>
                                    </h5>
                                    {{--                                    <p class="tx-color-03 mg-b-0">{{ $d->jurusan }}</p>--}}
                                </div><!-- card-body -->
                                {{--                            <div class="card-footer tx-13">--}}
                                {{--                                <span>18 Rute</span>--}}
                                {{--                                <a href="" class="tx-18 lh-0"><i class="icon ion-md-arrow-forward"></i></a>--}}
                                {{--                            </div><!-- card-footer -->--}}
                            </div><!-- card -->
                        </div><!-- col -->

                    </div><!-- row -->

                </div><!-- profile-sidebar -->
                <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">

                    <div class="card mg-b-20 mg-lg-b-25">
                        <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                            <h6 class="tx-uppercase tx-semibold mg-b-0">Update Jurusan</h6>
                        </div><!-- card-header -->
                        <div class="card-body pd-20 pd-lg-25">
                            <div id="loadingLogo" class="text-center" style="display:none;">
                                <div class="spinner-border text-info" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div id="formJurusan">
                                <fieldset class="form-fieldset mg-b-20">
                                    <legend class="tx-center">Informasi Angkot</legend>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Awal Jurusan</label>
                                        <input value="{{ $d->awal_jurusan }}" id="awal_jurusan" type="text"
                                               class="form-control"
                                               placeholder="Awal Jurusan">
                                    </div><!-- col -->
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Tujuan Jurusan</label>
                                        <input value="{{ $d->tujuan_jurusan }}" id="tujuan_jurusan" type="text"
                                               class="form-control"
                                               placeholder="Tujuan Jurusan">
                                    </div><!-- col -->
                                    <div id="inputListRute" class="mg-b-5">
                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03">Rute
                                                1</label>
                                            <input value="{{ json_decode($d->rute)[0]}}" id="rute[]" type="text"
                                                   class="form-control"
                                                   placeholder="Rute">
                                        </div><!-- col -->
                                        @if($d->rute !== null)
                                            @foreach(json_decode($d->rute) as $key => $r)
                                                @if($key !== 0)
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input value="{{ $r }}" id="rute[]" type="text"
                                                                   class="form-control">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-danger remove_field"
                                                                        type="button"
                                                                        id="button-addon2">Remove
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <button id="btnAddRute" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                                    </button>
                                </fieldset>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent pd-y-10 pd-sm-y-15 pd-x-10 pd-sm-x-20">
                            <nav class="nav nav-with-icon tx-13">
                                <button onclick="submit()" class="btn btn-outline-secondary">
                                    <i class="fa fa-folder mg-r-5"></i>
                                    Save
                                </button>
                            </nav>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div><!-- media-body -->
            </div><!-- media -->
        @endforeach
    </div><!-- container -->
</div>

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
                    '                                            <input value="" id="rute[]" type="text"\n' +
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

    function test() {
        $('input[id="rute"]').each(function () {
            console.log($(this).val());
        })
    }

    function submit() {
        var formData = new FormData;
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('id', '{{ $dataJurusan[0]->id }}');
        $('#formJurusan :input').each(function () {
            // if ($(this).attr('id') !== 'rute') {
            formData.append($(this).attr('id'), $(this).val());
            // }
        });

        $.ajax({
            url: '{{ route('submitJurusan') }}',
            data: formData,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    if (data === 'true') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil mengupdate jurusan',
                            type: 'success'
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', 'Gagal mengupdate jurusan', 'error');
                    }
                }
            }
        })
    }
</script>
@include('panel.footerPanel')
