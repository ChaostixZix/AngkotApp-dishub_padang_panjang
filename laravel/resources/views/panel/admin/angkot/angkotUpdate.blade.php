@include('panel.headerPanel')

@include('panel.navbarPanel')
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.css">
<link rel="stylesheet" href="{{ url('/') }}/dashforge/assets/css/dashforge.profile.css">
<div class="content content-fixed content-profile">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        @foreach($dataAngkot as $d)
            <div class="media d-block d-lg-flex">
                <div class="profile-sidebar pd-lg-r-25">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-help">
                                <div class="card-body tx-13">
                                    <div class="tx-60 lh-0 mg-b-25"><i class="fa fa-shuttle-van"></i></div>
                                    <h5><a href="" class="link-01">{{ $d->nama_angkot }}</a></h5>
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
                            <h6 class="tx-uppercase tx-semibold mg-b-0">Update Angkot</h6>
                        </div><!-- card-header -->
                        <div class="card-body pd-20 pd-lg-25">
                            <div id="loadingLogo" class="text-center" style="display:none;">
                                <div class="spinner-border text-info" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div id="formAngkot">
                                <fieldset class="form-fieldset mg-b-20">
                                    <legend class="tx-center">Informasi Angkot</legend>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                            Angkot</label>
                                        <input value="{{ $d->nama_angkot }}" id="nama_angkot" type="text"
                                               class="form-control"
                                               placeholder="Nama Angkot">
                                    </div><!-- col -->
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jurusan
                                            Angkot</label>
                                        <select id="id_jurusan" class="custom-select">
                                            <option value=""></option>
                                        @foreach($dataJurusan as $c)
                                                <option @if($d->id_jurusan == $c->id) selected @endif value="{{ $c->id }}">{{ $c->awal_jurusan }} -> {{ $c->tujuan_jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- col -->
                                </fieldset>
                                <fieldset class="form-fieldset mg-b-20">
                                    <legend class="tx-center">Informasi Dasar</legend>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nomor
                                            Registrasi</label>
                                        <input value="{{ $d->nomor_registrasi }}" id="nomor_registrasi" type="text"
                                               class="form-control"
                                               placeholder="Nomor Registrasi">
                                    </div><!-- col -->
                                    <div class="form-group">
                                        <label
                                            class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Nama
                                            Pemilik</label>
                                        <input value="{{ $d->nama_pemilik }}" id="nama_pemilik" type="text"
                                               class="form-control"
                                               placeholder="Nama Pemilik">
                                    </div><!-- col -->
                                    <div class="form-group">
                                        <label
                                            class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Merk</label>
                                        <input value="{{ $d->merk }}" id="merk" type="text"
                                               class="form-control"
                                               placeholder="Merk">
                                    </div>
                                    <div class="form-group">
                                        <label
                                            class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jenis</label>
                                        <input value="{{ $d->jenis }}" id="jenis" type="text"
                                               class="form-control"
                                               placeholder="Jenis">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Tahun
                                            Pembuatan</label>
                                        <input value="{{ $d->tahun_pembuatan }}" id="tahun_pembuatan" type="text"
                                               class="form-control"
                                               placeholder="Tahun Pembuatan">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Isi
                                            Silinder</label>
                                        <input value="{{ $d->isi_silinder }}" id="isi_silinder"
                                               type="text"
                                               class="form-control"
                                               placeholder="Isi Silinder">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Warna
                                            KB</label>
                                        <input value="{{ $d->warna_kb }}" id="warna_kb"
                                               type="text"
                                               class="form-control"
                                               placeholder="Warna KB">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">NO
                                            Rangka</label>
                                        <input value="{{ $d->no_rangka }}" id="no_rangka"
                                               type="text"
                                               class="form-control"
                                               placeholder="No Rangka">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">NO
                                            Mesin</label>
                                        <input value="{{ $d->no_mesin }}" id="no_mesin"
                                               type="text"
                                               class="form-control"
                                               placeholder="NO Mesin">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">NO
                                            BPKB</label>
                                        <input value="{{ $d->no_bpkb }}" id="no_bpkb"
                                               type="text"
                                               class="form-control"
                                               placeholder="NO BPKB">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Bahan
                                            Bakar</label>
                                        <input value="{{ $d->bahan_bakar }}" id="bahan_bakar"
                                               type="text"
                                               class="form-control"
                                               placeholder="Bahan Bakar">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Warna
                                            TNKB</label>
                                        <input value="{{ $d->warna_tnkb }}" id="warna_tnkb"
                                               type="text"
                                               class="form-control"
                                               placeholder="Warna TNKB">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">NO
                                            POL
                                            LAMA</label>
                                        <input value="{{ $d->no_pol_lama }}" id="no_pol_lama"
                                               type="text"
                                               class="form-control"
                                               placeholder="NO Pol Lama">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Berat
                                            KB</label>
                                        <input value="{{ $d->berat_kb }}" id="berat_kb"
                                               type="text"
                                               class="form-control"
                                               placeholder="Berat KB">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jumlah
                                            Sumbu</label>
                                        <input value="{{ $d->jumlah_sumbu }}" id="jumlah_sumbu"
                                               type="text"
                                               class="form-control"
                                               placeholder="Jumlah Sumbu">
                                    </div>
                                    <div class="form-group">
                                        <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Jumlah
                                            Penumpang</label>
                                        <input value="{{ $d->jumlah_penumpang }}" id="jumlah_penumpang"
                                               type="text"
                                               class="form-control"
                                               placeholder="Jumlah Penumpang">
                                    </div>

                                </fieldset>
                                <fieldset class="form-fieldset mg-b-20">
                                    <legend class="tx-center">Rute</legend>
                                    <div class="mg-b-5">
                                        <div class="form-group">
                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03">Pengemudi</label>
                                            <select class="custom-select" id="supir">
                                                <option value=""></option>
                                                @foreach($supirList as $s)
                                                    <option value="{{ $s->username }}">{{ $s->nama_lengkap }}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- col -->
                                    </div>
                                </fieldset>
{{--                                <fieldset class="form-fieldset mg-b-20">--}}
{{--                                    <legend class="tx-center">Rute</legend>--}}
{{--                                    <div id="inputListRute" class="mg-b-5">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03">Rute--}}
{{--                                                1</label>--}}
{{--                                            <input value="{{ json_decode($d->rute)[0]}}" id="rute[]" type="text"--}}
{{--                                                   class="form-control"--}}
{{--                                                   placeholder="Rute 1">--}}
{{--                                        </div><!-- col -->--}}
{{--                                        @if($d->rute !== null)--}}
{{--                                            @foreach(json_decode($d->rute) as $key => $r)--}}
{{--                                                @if($key !== 0)--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <div class="input-group">--}}
{{--                                                            <input value="{{ $r }}" id="rute[]" type="text"--}}
{{--                                                                   class="form-control">--}}
{{--                                                            <div class="input-group-append">--}}
{{--                                                                <button class="btn btn-danger remove_field"--}}
{{--                                                                        type="button"--}}
{{--                                                                        id="button-addon2">Remove--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <button id="btnAddRute" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah--}}
{{--                                    </button>--}}
{{--                                </fieldset>--}}
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

        @foreach($dataAngkot as $d)
            @if ($d->supir !== null)
        $('#supir').val('{{ $d->supir }}');
            @endif
        @endforeach

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
        formData.append('id', {{ $dataAngkot[0]->id }})
        formData.append('_token', '{{ csrf_token() }}');
        $('#formAngkot :input').each(function () {
            // if ($(this).attr('id') !== 'rute') {
            formData.append($(this).attr('id'), $(this).val());
            // }
        });

        $.ajax({
            url: '{{ route('submitAngkot') }}',
            data: formData,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === 'true') {
                    if (data === 'true') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil mengupdate angkot',
                            type: 'success'
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', 'Gagal mengupdate angkot', 'error');
                    }
                }
            }
        })
    }

</script>
@include('panel.footerPanel')
